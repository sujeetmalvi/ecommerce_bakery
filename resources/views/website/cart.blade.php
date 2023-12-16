@include('website.header')
<div class="container-fluid page-header py-5">
   <h1 class="text-center text-white display-6">View Cart</h1>
   <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">View Cart</a></li>
   </ol>
</div>
<div class="container-fluid py-5">
   <div class="container py-5">
      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">Products</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Handle</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $grand_total = 0.00;
               $session_cart_item = Session::get('cart_item');

               if($session_cart_item){
                  if(count($session_cart_item) > 0) {
                     foreach ($session_cart_item as $key => $value) {
                        $total = $session_cart_item[$key]['product_price'] * $session_cart_item[$key]['product_quantity'];
                        $grand_total += $total;
               ?>
                  <tr>
                     <th scope="row">
                        <div class="d-flex align-items-center">
                           <img src="{{$session_cart_item[$key]['product_image']}}" class="img-fluid me-5 rounded shadow" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                        </div>
                     </th>
                     <td>
                        <p class="mb-0 mt-4">{{$session_cart_item[$key]['product_name']}}</p>
                     </td>
                     <td>
                        <p class="mb-0 mt-4">Rs. {{$session_cart_item[$key]['product_price']}}</p>
                     </td>
                     <td>
                        <div class="input-group quantity mt-4" style="width: 100px;">
                           <div class="input-group-btn">
                              <button class="btn btn-sm btn-minus decrease_qty rounded-circle bg-light border" data-id="{{$session_cart_item[$key]['product_id']}}">
                              <i class="fa fa-minus"></i>
                              </button>
                           </div>
                           <input type="text" class="form-control form-control-sm text-center border-0" value="{{$session_cart_item[$key]['product_quantity']}}">
                           <div class="input-group-btn">
                              <button class="btn btn-sm btn-plus increase_qty rounded-circle bg-light border" data-id="{{$session_cart_item[$key]['product_id']}}">
                              <i class="fa fa-plus"></i>
                              </button>
                           </div>
                        </div>
                     </td>
                     <td>
                        <p class="mb-0 mt-4">Rs. {{$total}} </p>
                     </td>
                     <td>
                        <button class="btn btn-md rounded-circle bg-light border mt-4 cart-remove-item" data-id="{{$session_cart_item[$key]['product_id']}}">
                        <i class="fa fa-times text-danger"></i>
                        </button>
                     </td>
                  </tr>
               <?php }}} ?>
               <!-- <tr>
                  <th scope="row">
                     <div class="d-flex align-items-center">
                        <img src="assets/images/products/02.webp" class="img-fluid me-5 rounded shadow" style="width: 80px; height: 80px;" alt="" alt="">
                     </div>
                  </th>
                  <td>
                     <p class="mb-0 mt-4">Strawberry Pineapple</p>
                  </td>
                  <td>
                     <p class="mb-0 mt-4">Rs. 299</p>
                  </td>
                  <td>
                     <div class="input-group quantity mt-4" style="width: 100px;">
                        <div class="input-group-btn">
                           <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                           <i class="fa fa-minus"></i>
                           </button>
                        </div>
                        <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                        <div class="input-group-btn">
                           <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                           <i class="fa fa-plus"></i>
                           </button>
                        </div>
                     </div>
                  </td>
                  <td>
                     <p class="mb-0 mt-4">Rs. 299</p>
                  </td>
                  <td>
                     <button class="btn btn-md rounded-circle bg-light border mt-4" >
                     <i class="fa fa-times text-danger"></i>
                     </button>
                  </td>
               </tr>
               <tr>
                  <th scope="row">
                     <div class="d-flex align-items-center">
                        <img src="assets/images/products/03.webp" class="img-fluid me-5 rounded shadow" style="width: 80px; height: 80px;" alt="" alt="">
                     </div>
                  </th>
                  <td>
                     <p class="mb-0 mt-4">Heart Shaped Valentine Cake</p>
                  </td>
                  <td>
                     <p class="mb-0 mt-4">Rs. 299</p>
                  </td>
                  <td>
                     <div class="input-group quantity mt-4" style="width: 100px;">
                        <div class="input-group-btn">
                           <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                           <i class="fa fa-minus"></i>
                           </button>
                        </div>
                        <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                        <div class="input-group-btn">
                           <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                           <i class="fa fa-plus"></i>
                           </button>
                        </div>
                     </div>
                  </td>
                  <td>
                     <p class="mb-0 mt-4">Rs. 299</p>
                  </td>
                  <td>
                     <button class="btn btn-md rounded-circle bg-light border mt-4" >
                     <i class="fa fa-times text-danger"></i>
                     </button>
                  </td>
               </tr> -->
            </tbody>
         </table>
      </div>
      <div class="mt-5">
         <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
         <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
      </div>
      <div class="row g-4 justify-content-end">
         <div class="col-8"></div>
         <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
            <div class="bg-light rounded">
               <div class="p-4">
                  <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                  <div class="d-flex justify-content-between mb-4">
                     <h5 class="mb-0 me-4">Subtotal:</h5>
                     <p class="mb-0">Rs. {{$grand_total}}</p>
                  </div>
                  <!-- <div class="d-flex justify-content-between">
                     <h5 class="mb-0 me-4">Shipping</h5>
                     <div class="">
                        <p class="mb-0">Flat rate: Rs. 3.00</p>
                     </div>
                  </div>
                  <p class="mb-0 text-end">Shipping to Mumbai.</p> -->
               </div>
               <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                  <h5 class="mb-0 ps-4 me-4">Total</h5>
                  <!-- <p class="mb-0 pe-4">$99.00</p> -->
                  <p class="mb-0 pe-4">Rs. {{$grand_total}}</p>
               </div>
               <a href="{{URL::to('/checkout')}}">
                  <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
@include('website.footer')