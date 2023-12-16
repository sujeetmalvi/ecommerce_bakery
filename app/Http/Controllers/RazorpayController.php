<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use DB;
use Mail;
use DateTime;
use DateTimeZone;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
use PDF;
use App;

class RazorpayController extends Controller
{
    public function store(Request $request) {
        $input = $request->all();
        $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $response['amount']/100,
                    'json_response' => json_encode((array)$response)
                ]);
                $payment_id = DB::getPdo()->lastInsertId();

                $order_id = Session::get('order_id');
                Order::where('order_id', $order_id)->update(['payment_id' => $payment_id, 'order_status' => 'Completed']);

                $orderData = Order::where('order_id', $order_id)->first();
                $orderDetailData = OrderDetail::where('order_id', $order_id)->get();
                $customerData = Customer::where('customer_id', $orderData->customer_id)->first();

                $dt = new DateTime($orderData->created_at);
                // $dt->setTimezone(new DateTimeZone($user_data->timezone));
                $transaction_date = $dt->format('d-m-Y H:i:s');

                $pdf = App::make('dompdf.wrapper'); 
                $pdf_data = '<h2>Standard Bakers Order Details</h2>
                  <table style="width="100%" height="100%">
                  <tr>
                  <th style="text-align: left; padding-left: 15px;">Razorpay Pyament ID</th>
                  <td style="padding-left: 15px;"> '.$response['id'].'</td>
                  </tr>
                  <tr>
                  <th style="text-align: left; padding-left: 15px;">Transaction Time</th>
                  <td style="padding-left: 15px;"> '.$transaction_date.'</td>
                  </tr>
                  <tr>
                  <th style="text-align: left; padding-left: 15px;">Customer Name</th>
                  <td style="padding-left: 15px;"> '.$customerData->first_name.' '.$customerData->last_name.'</td>
                  </tr>
                  <tr>
                  <th style="text-align: left; padding-left: 15px;"> Total Amount</th>
                  <td style="padding-left: 15px;">Rs. '.$orderData->total_amount.'</td>
                  </tr>
                  <tr>
                  <th style="text-align: left; padding-left: 15px;">Order Status</th>
                  <td style="padding-left: 15px;"> '.$orderData->order_status.'</td>
                  </tr>
                  <tr>
                  <th style="text-align: left; padding-left: 15px;">Address</th>
                  <td style="padding-left: 15px;"> '.$customerData->address.'</td>
                  </tr>
                  <tr>
                  <th style="text-align: left; padding-left: 15px;">City</th>
                  <td style="padding-left: 15px;"> '.$customerData->city.'</td>
                  </tr>
                  <tr>
                  <th style="text-align: left; padding-left: 15px;">Country</th>
                  <td style="padding-left: 15px;"> '.$customerData->country.'</td>
                  </tr>
                  <tr>
                  <th style="text-align: left; padding-left: 15px;">Zip Code</th>
                  <td style="padding-left: 15px;"> '.$customerData->zip_code.'</td>
                  </tr>
                  </table>
                  <div style="margin-top: 30px; margin-bottom: 20px;">
                  <h3>Product details</h3>
                  </div>
                  <table style="width: 100%">
                  <tr>
                  <th style="text-align: left;">Product Name</th>
                  <th style="text-align: left;">Price</th>
                  <th style="text-align: left;">Quantity</th>
                  <th style="text-align: left;">Total</th>
                  </tr>';

                foreach($orderDetailData as  $detail) {
                    $productData = Product::where('product_id', $detail->product_id)->first();
                    $pdf_data .= '<tr>
                        <td>'.$productData->product_name.'</td>
                        <td>'.$detail->price.'</td>
                        <td>'.$detail->quantity.'</td>
                        <td>'.$detail->total_price.'</td>
                        </tr>';
                }

                $pdf_data .= '</table>';

                $pdf->loadHTML($pdf_data);

                $file_c = uniqid() . '.pdf';
                file_put_contents("public/pdf/".$file_c, $pdf->output());
                $base_url = env('APP_URL').'/public/pdf/';
                $file_name = $base_url.$file_c;

                Order::where('order_id', $order_id)->update(['pdf' => $file_name]);

                $email = $customerData->email;
                Mail::send([], [], function ($message) use ($email, $customerData, $pdf) {
                    $message
                    ->to($email)
                    ->subject('Standard Bakers Order Details')
                    ->attachData($pdf->output(),"report.pdf")
                    ->setBody('<p>Hello '.$customerData->first_name.',</p><p></p><p>Thanks for order the products from Standard Bakers. Please check the order details in the attached PDF.<p><p></p><p>Regards,</p><p>Standard Bakers</p>', 'text/html');
                });
            } catch(Exceptio $e) {
                return $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        Session::put('cart_item', []);
        Session::forget('grand_total_paise');
        Session::forget('grand_total');
        Session::forget('order_id');
        Session::put('success','Payment Successful');
        return redirect()->to('/');
    }
}