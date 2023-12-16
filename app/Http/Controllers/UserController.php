<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function index()
    {
        $products = Product::from('products as p')
            ->select('p.*', DB::raw('group_concat(mw.weight) as weights'), DB::raw('group_concat(mw.unit) as units'))
            ->where('p.is_deleted', 0)
            ->join('product_weights as pw', 'p.product_id', '=', 'pw.product_id')
            ->join('master_weights as mw', 'mw.weight_id', '=', 'pw.weight_id')
            ->groupBy('product_id')
            ->get();
        
        return view('website.index')->with(array('product_list' => $products));
    }

    public function productDetails(Request $request) {
        $product_id = $request->product_id;
        
        // $products = Product::from('products as p')
        //     ->select('p.*', DB::raw('group_concat(mw.weight) as weights'), DB::raw('group_concat(mw.unit) as units'))
        //     ->where('p.is_deleted', 0)
        //     ->leftjoin('product_weights as pw', 'p.product_id', '=', 'pw.product_id')
        //     ->leftjoin('master_weights as mw', 'mw.weight_id', '=', 'pw.weight_id')
        //     ->where('p.product_id', $product_id)
        //     ->groupBy('p.product_id')
        //     ->first();

        $products = Product::where('product_id', $product_id)->first();
        
        $weights = DB::table('product_weights as pw')
            ->leftjoin('master_weights as mw', 'mw.weight_id', '=', 'pw.weight_id')
            ->where('pw.product_id', $product_id)
            ->get();

        $properties = DB::table('product_properties as pp')
            ->leftjoin('master_properties as mp', 'mp.property_id', '=', 'pp.property_id')
            ->where('pp.product_id', $product_id)
            ->get();

        $product_list = Product::from('products as p')
            ->select('p.*', DB::raw('group_concat(mw.weight) as weights'), DB::raw('group_concat(mw.unit) as units'))
            ->where('p.is_deleted', 0)
            ->join('product_weights as pw', 'p.product_id', '=', 'pw.product_id')
            ->join('master_weights as mw', 'mw.weight_id', '=', 'pw.weight_id')
            ->groupBy('product_id')
            ->get();

        return view('website/product-details')->with(array('product' => $products, 'weights' => $weights, 'properties' => $properties, 'product_list' => $product_list));
    }

    public function itemAddToCart(Request $request) {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $weight = $request->weight;
        $weights = explode(' ', $weight);

        $products = Product::from('products as p')
            ->select('p.*', DB::raw('group_concat(mw.weight) as weights'), DB::raw('group_concat(mw.unit) as units'))
            ->where('p.is_deleted', 0)
            ->join('product_weights as pw', 'p.product_id', '=', 'pw.product_id')
            ->join('master_weights as mw', 'mw.weight_id', '=', 'pw.weight_id')
            ->where('p.product_id', $product_id)
            ->groupBy('product_id')
            ->first();

        $cart_item = array(
            'product_image' => $products->product_image,
            'product_id' => $product_id,
            'product_name' => $products->product_name,
            'product_price' => $products->product_price,
            'product_quantity' => $quantity,
            'product_weight' => $weights[0],
            'product_unit' => $weights[1],
            'cake_message' => $request->cake_message,
            'product_property' => $request->property,
            'weight_id' => $request->weight_id,
            'property_id' => $request->property_id
        );

        $session_cart_item = Session::get('cart_item');
        
        if(isset($session_cart_item) && count($session_cart_item) > 0) {
            if(in_array($product_id, array_keys($session_cart_item))) {
                foreach ($session_cart_item as $key => $value) {
                    if($key == $product_id) {
                        $session_cart_item[$key]['product_quantity'] += $quantity;
                        Session::put('cart_item', $session_cart_item);
                    }
                }
            }
            else {
                $session_cart_item[$product_id] = $cart_item;
                Session::put('cart_item', $session_cart_item);
            }
        }
        else {
            $session_cart_item[$product_id] = $cart_item;
            Session::put('cart_item', $session_cart_item);
        }
        // print_r($session_cart_item);
        return json_encode(array('message' => 'Item added to cart.'));
    }

    public function itemRemoveFromCart(Request $request) {
        $product_id = $request->product_id;

        $session_cart_item = Session::get('cart_item');
        unset($session_cart_item[$product_id]);
        Session::put('cart_item', $session_cart_item);

        return json_encode(array('message' => 'Removed item from cart.'));
    }

    public function addUser(Request $request) {
        $input = $request->all();

        $get_user = Customer::where('email', $input['email'])->first();

        if(!$get_user) {
            $user = Customer::create([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'mobile' => $input['mobile'],
                'address' => $input['address'],
                'city' => $input['city'],
                'country' => $input['country'],
                'zip_code' => $input['zip_code'],
                'company_name' => $input['company_name'],
                'note' => $input['note']
            ]);
            $last_id = DB::getPdo()->lastInsertId();
            // print_r($user);
        }
        else {
            $last_id = $get_user->customer_id;
        }

        $session_cart_item = Session::get('cart_item');

        if(count($session_cart_item) > 0) {
            $grand_total = 0.00;
            foreach ($session_cart_item as $key => $value) {
                $total = $session_cart_item[$key]['product_price'] * $session_cart_item[$key]['product_quantity'];
                $grand_total += $total;
            }

            $createOrder = Order::create([
                'customer_id' => $last_id,
                'no_of_products' => count($session_cart_item),
                'total_amount' => $grand_total,
                'order_status' => 'pending'
            ]);
            $order_id = DB::getPdo()->lastInsertId();
            Session::put('order_id', $order_id);

            foreach ($session_cart_item as $key => $value) {
                $total = $session_cart_item[$key]['product_price'] * $session_cart_item[$key]['product_quantity'];
                $orderDetail = OrderDetail::create([
                    'order_id' => $order_id,
                    'product_id' => $session_cart_item[$key]['product_id'],
                    'weight_id' => $session_cart_item[$key]['weight_id'],
                    'property_id' => $session_cart_item[$key]['property_id'],
                    'price' => $session_cart_item[$key]['product_price'],
                    'quantity' => $session_cart_item[$key]['product_quantity'],
                    'total_price' => $total,
                    'cake_message' => $session_cart_item[$key]['cake_message']
                ]);
            }
        }
        return json_encode($input);
    }

    public function increaseDecreaseQty(Request $request) {
        $product_id = $request->product_id;
        $type = $request->type;

        $session_cart_item = Session::get('cart_item');
        
        if(isset($session_cart_item) && count($session_cart_item) > 0) {
            if(in_array($product_id, array_keys($session_cart_item))) {
                foreach ($session_cart_item as $key => $value) {
                    if($key == $product_id) {
                        if($type == 'increase_qty') {
                            $session_cart_item[$key]['product_quantity'] ++;
                        }
                        if($type == 'decrease_qty') {
                            $session_cart_item[$key]['product_quantity'] --;
                        }
                        Session::put('cart_item', $session_cart_item);
                    }
                }
            }
        }

        return json_encode(array('message' => 'Item added to cart.'));
    }
}