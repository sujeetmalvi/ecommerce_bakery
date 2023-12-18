@include('website.header')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
   <h1 class="text-center text-white display-6">Checkout</h1>
   <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Cart</a></li>
      <li class="breadcrumb-item active text-white">Checkout</li>
   </ol>
</div>
<!-- Single Page Header End -->
<!-- Checkout Page Start -->
<div class="container-fluid py-5">
   <div class="container py-5">
      <h1 class="mb-4">Billing details</h1>
      <form id="checkout_form">
         <div class="row g-5">
            <div class="col-md-12 col-lg-6 col-xl-7">
               <div class="row">
                  <div class="col-md-12 col-lg-6">
                     <div class="form-item w-100">
                        <label class="form-label my-3">First Name<sup>*</sup></label>
                        <input type="text" name="first_name" id="first_name" required class="form-control">
                     </div>
                  </div>
                  <div class="col-md-12 col-lg-6">
                     <div class="form-item w-100">
                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                        <input type="text" name="last_name" id="last_name" required class="form-control">
                     </div>
                  </div>
               </div>
               <div class="form-item">
                  <label class="form-label my-3">Company Name</label>
                  <input type="text" name="company_name" id="company_name" class="form-control">
               </div>
               <div class="form-item">
                  <label class="form-label my-3">Address <sup>*</sup></label>
                  <input type="text" class="form-control" name="address" id="address" required placeholder="House Number Street Name">
               </div>
               <div class="form-item">
                  <label class="form-label my-3">Town/City<sup>*</sup></label>
                  <input type="text" class="form-control" name="city" id="city" required>
               </div>
               <div class="form-item">
                  <label class="form-label my-3">Country<sup>*</sup></label>
                  <input type="text" class="form-control" name="country" id="country" required>
               </div>
               <div class="form-item">
                  <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                  <input type="text" class="form-control" name="zip_code" id="zip_code" required>
               </div>
               <div class="form-item">
                  <label class="form-label my-3">Mobile<sup>*</sup></label>
                  <input type="tel" class="form-control" name="mobile" id="mobile" required>
               </div>
               <div class="form-item">
                  <label class="form-label my-3">Email Address<sup>*</sup></label>
                  <input type="email" class="form-control" name="email" id="email" required>
               </div>
               <!-- <div class="form-check my-3">
                  <input type="checkbox" class="form-check-input" id="Account-1" name="accounts" value="accounts">
                  <label class="form-check-label" for="Account-1">Create an account?</label>
               </div>
               <hr>
               <div class="form-check my-3">
                  <input class="form-check-input" type="checkbox" id="Address-1" name="Address" value="Address">
                  <label class="form-check-label" for="Address-1">Ship to a different address?</label>
               </div> -->
               <div class="form-item">
                  <label class="form-label my-3">Order Notes</label>
                  <textarea name="note" id="note" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Order Notes (Optional)"></textarea>
               </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-5">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Products</th>
                           <th scope="col">Name</th>
                           <th scope="col">Price</th>
                           <th scope="col">Quantity</th>
                           <th scope="col">Total</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $grand_total = 0.00;
                        $session_cart_item = Session::get('cart_item');
                        if(count($session_cart_item) > 0) {
                           foreach ($session_cart_item as $key => $value) {
                              $total = $session_cart_item[$key]['product_price'] * $session_cart_item[$key]['product_quantity'];
                              $grand_total += $total;
                        ?>
                           <tr>
                              <th scope="row">
                                 <div class="d-flex align-items-center mt-2">
                                    <img src="{{$session_cart_item[$key]['product_image']}}" class="img-fluid rounded shadow" style="width: 80px; height: 80px;" alt="">
                                 </div>
                              </th>
                              <td class="py-5">{{$session_cart_item[$key]['product_name']}}</td>
                              <td class="py-5">Rs. {{$session_cart_item[$key]['product_price']}}/-</td>
                              <td class="py-5">{{$session_cart_item[$key]['product_quantity']}}</td>
                              <td class="py-5">Rs. {{$total}}/-</td>
                           </tr>
                        <?php }} ?>
                        <tr>
                           <th scope="row">
                           </th>
                           <td class="py-5"></td>
                           <td class="py-5"></td>
                           <td class="py-5">
                              <p class="mb-0 text-dark py-3">Subtotal</p>
                           </td>
                           <td class="py-5">
                              <div class="py-3 border-bottom border-top">
                                 <p class="mb-0 text-dark">Rs. {{$grand_total}}/-</p>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">
                           </th>
                           <td class="py-5">
                              <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                           </td>
                           <td class="py-5"></td>
                           <td class="py-5"></td>
                           <td class="py-5">
                              <div class="py-3 border-bottom border-top">
                                 <p class="mb-0 text-dark">Rs. {{$grand_total}}/-</p>
                                 <input type="hidden" name="grand_total" value="{{$grand_total}}">
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <?php
               $disabled = '';
               if(is_array($session_cart_item)) {
                  if(count($session_cart_item) == 0) {
                     $disabled = "disabled";
                  }
               }
               ?>
               <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                  <button type="submit" class="btn checkout_btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>
               </div>
            </div>
         </div>
      </form>
      <?php 
      $grand_total_paise = $grand_total * 100; 
      Session::put('grand_total_paise', $grand_total_paise);
      Session::put('grand_total', $grand_total);
      ?>
      <!-- <form action="{{ URL::to('/razorpay-payment') }}" method="POST" >
         @csrf 
         <script src="https://checkout.razorpay.com/v1/checkout.js"
                 data-key="{{ env('RAZORPAY_KEY') }}"
                 data-amount="{{$grand_total_paise}}"
                 data-buttontext="Pay {{$grand_total}} INR"
                 data-name="Standard Bakers"
                 data-description="Razorpay payment"
                 data-image="assets/images/StandardBakersLogo.png"
                 data-prefill.name="ABC"
                 data-prefill.email="abc@gmail.com"
                 data-theme.color="#ec4176">
         </script>
     </form> -->
   </div>
</div>
<!-- Checkout Page End -->
@include('website.footer')