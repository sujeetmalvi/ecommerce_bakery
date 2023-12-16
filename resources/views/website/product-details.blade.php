@include('website.header')
<style type="text/css">
.checkbox.style-c {
  display: inline-block;
  position: relative;
  padding-left: 30px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.checkbox.style-c input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.checkbox.style-c input:checked ~ .checkbox__checkmark {
  background-color: var(--primary);
}
.checkbox.style-c input:checked ~ .checkbox__checkmark:after {
  opacity: 1;
}
.checkbox.style-c:hover input ~ .checkbox__checkmark {
  background-color: #eee;
}
.checkbox.style-c:hover input:checked ~ .checkbox__checkmark {
  background-color: var(--primary);
}
.checkbox.style-c .checkbox__checkmark {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  transition: background-color 0.25s ease;
  border-radius: 4px;
}
.checkbox.style-c .checkbox__checkmark:after {
  content: "";
  position: absolute;
  left: 8px;
  top: 4px;
  width: 5px;
  height: 10px;
  border: solid #ffffff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  opacity: 0;
  transition: opacity 0.25s ease;
}
.checkbox.style-c .checkbox__body {
  color: #333;
  line-height: 1.4;
  font-size: 16px;
}
</style>
<div class="container-fluid page-header py-5">
   <h1 class="text-center text-white display-6">{{$product->product_name}}</h1>
   <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active text-white">{{$product->product_name}}</li>
   </ol>
</div>
<div class="container-fluid py-5">
   <div class="container py-5">
      <div class="row g-4 mb-5">
         <div class="col-lg-12 col-xl-12">
            <div class="row g-4">
               <div class="col-lg-5">
                  <div class="border rounded">
                     <a href="#">
                     <img src="{{$product->product_image}}" class="img-fluid rounded" alt="Image">
                     </a>
                  </div>
               </div>
               <div class="col-lg-7">
                  <h4 class="fw-bold mb-3">{{$product->product_name}}</h4>
                  <p class="mb-4">{{$product->product_description}}</p>
                  <h5 class="fw-bold mb-3">Rs. <span class="display-6 fw-bold">{{$product->product_price}}/-</span> </h5>
                  <div class="input-group quantity mb-5" style="width: 100px;">
                     <div class="input-group-btn">
                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                        <i class="fa fa-minus"></i>
                        </button>
                     </div>
                     <input type="text" name="quantity" class="form-control form-control-sm text-center border-0" value="1">
                     <div class="input-group-btn">
                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                        <i class="fa fa-plus"></i>
                        </button>
                     </div>
                  </div>
                  <div class="details-form">
                     <form method="post" action="">
                        <div>
                           <p class="fw-bold mb-0 mt-4">Weight:</p>
                        </div>
                        <div>
                           <div class="wt-btn">
                              <?php
                              // $weights = explode(',', $product->weights);
                              // $units = explode(',', $product->units);
                              
                              for($i=0; $i<count($weights); $i++) {
                                 $checked = '';
                                 if($i == 0) {
                                    $checked = 'checked';
                                 }
                              ?>
                                 <label class="mb-4">
                                    <input type="radio" name="weight" data-id="{{$weights[$i]->weight_id}}" value="{{$weights[$i]->weight}} {{$weights[$i]->unit}}" {{$checked}}/>
                                    <div class="box">
                                       <span>{{$weights[$i]->weight}} {{$weights[$i]->unit}}</span>
                                    </div>
                                 </label>
                                 <!-- <label class="mb-4">
                                    <input type="radio" name="radio"/>
                                    <div class="box">
                                       <span>1 kg</span>
                                    </div>
                                 </label>
                                 <label class="mb-4">
                                    <input type="radio" name="radio"/>
                                    <div class="box">
                                       <span>1.5 kg</span>
                                    </div>
                                 </label>
                                 <label class="mb-4">
                                    <input type="radio" name="radio"/>
                                    <div class="box">
                                       <span>2 kg</span>
                                    </div>
                                 </label> -->
                              <?php } ?>
                           </div>
                        </div>
                        <div>
                           @if(!empty($properties))
                           <?php $a = 0; ?>
                           @foreach($properties as $property)
                           <?php
                           $checked = '';
                           if($a == 0) {
                              $checked = 'checked';
                           }
                           $a++;
                           ?>
                              <div class="checkboxes__row">
                                 <div class="checkboxes__item">
                                    <label class="checkbox style-c">
                                       <input type="checkbox" name="property" data-id="{{$property->property_id}}" value="{{$property->property}}" {{$checked}} />
                                       <div class="checkbox__checkmark"></div>
                                       <div class="checkbox__body">{{$property->property}}</div>
                                    </label>
                                 </div>
                              </div>
                           @endforeach
                           @endif
                           <!-- <div class="checkboxes__row">
                              <div class="checkboxes__item">
                                 <label class="checkbox style-c">
                                    <input type="checkbox" name="property" />
                                    <div class="checkbox__checkmark"></div>
                                    <div class="checkbox__body">Heart Shape</div>
                                 </label>
                              </div>
                           </div> -->
                        </div>
                        <div class="mt-4">
                           <p class="fw-bold mb-0">Message On Cake:</p>
                        </div>
                        <div>
                           <input type="text" id="cake_message" name="cake_message" placeholder="write message" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;border: 1.5px solid #9a9a9a;width: 100%;height: 35px;border-radius: 4px;font-weight: 400 !important;padding: 10px;" />
                        </div>
                     </form>
                  </div>
                  <div class="row">
                     <div class="col-lg-3 col-md-3 col-6">
                        <div class="mt-4">
                           <a class="item_buy_now" data-id="{{$product->product_id}}">
                              <button class="buy-now">
                                 Buy Now
                              </button>
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-6">
                        <div class="mt-4">
                           <a class="item_add_to_cart" data-id="{{$product->product_id}}">
                              <button type="button" class="add-to-cart">
                                 Add to Cart
                              </button>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <nav>
                     <div class="nav nav-tabs mb-3">
                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                           id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description"
                           aria-controls="nav-description" aria-selected="true">Description</button>
                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                           id="nav-information-tab" data-bs-toggle="tab" data-bs-target="#nav-information"
                           aria-controls="nav-information" aria-selected="false">Delivery Information</button>
                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                           id="nav-instructions-tab" data-bs-toggle="tab" data-bs-target="#nav-instructions"
                           aria-controls="nav-instructions" aria-selected="false">Care Instructions</button>
                     </div>
                  </nav>
                  <div class="tab-content mb-5">
                     <div class="tab-pane active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                        <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc. 
                           Susp endisse ultricies nisi vel quam suscipit 
                        </p>
                        <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish filefish Antarctic 
                           icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray sweeper.
                        </p>
                        <div class="px-2">
                           <div class="row g-4">
                              <div class="col-6">
                                 <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                    <div class="col-6">
                                       <p class="mb-0">Weight</p>
                                    </div>
                                    <div class="col-6">
                                       <p class="mb-0">1 kg</p>
                                    </div>
                                 </div>
                                 <div class="row text-center align-items-center justify-content-center py-2">
                                    <div class="col-6">
                                       <p class="mb-0">Country of Origin</p>
                                    </div>
                                    <div class="col-6">
                                       <p class="mb-0">Agro Farm</p>
                                    </div>
                                 </div>
                                 <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                    <div class="col-6">
                                       <p class="mb-0">Quality</p>
                                    </div>
                                    <div class="col-6">
                                       <p class="mb-0">Organic</p>
                                    </div>
                                 </div>
                                 <div class="row text-center align-items-center justify-content-center py-2">
                                    <div class="col-6">
                                       <p class="mb-0">Сheck</p>
                                    </div>
                                    <div class="col-6">
                                       <p class="mb-0">Healthy</p>
                                    </div>
                                 </div>
                                 <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                    <div class="col-6">
                                       <p class="mb-0">Min Weight</p>
                                    </div>
                                    <div class="col-6">
                                       <p class="mb-0">250 Kg</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
                           <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</p>
                           <ul>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                           </ul>
                     </div>
                     <div class="tab-pane" id="nav-instructions" role="tabpanel">
                        <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                           amet diam et eos labore.</p>
                        <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                           Clita erat ipsum et lorem et sit</p>
                           <ul>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                           </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <h3 class="fw-bold mb-0">Make it special with addons:</h3>
      <ul class="slick-slider">
         @if(!empty($product_list))  
         @foreach($product_list as $product)
            <li class="m-3">
               <div class="shadow rounded p-2 product-card">
                  <div class="product-image">
                     <img src="{{$product->product_image}}" class="w-100 shadow rounded">
                  </div>
                  <div class="product-details text-center mt-3">
                     <h6>{{$product->product_name}}</h6>
                     <h5 class="fw-bold">Rs. {{$product->product_price}}/-</h5>
                     <div class="row mt-2">
                        <div class="col-lg-6 col-md-6 col-6">
                           <a href="{{URL::to('/product-details?product_id='.$product->product_id)}}">
                           <button class="buy-now">
                              Buy Now
                           </button></a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                           <!-- <button class="add-to-cart item_add_to_cart" data-id="{{$product->product_id}}"> -->
                           <a href="{{URL::to('/product-details?product_id='.$product->product_id)}}"> 
                           <button class="add-to-cart">
                              Add to Cart
                           </button></a>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
         @endforeach
         @endif
         <!-- <li class="m-3">
            <div class="shadow rounded p-2 product-card">
               <div class="product-image">
                  <img src="assets/images/products/06.webp" class="w-100 shadow rounded">
               </div>
               <div class="product-details text-center mt-3">
                  <h6>Kitkat Butter Scotch Half kg Birthday Cake</h6>
                  <h5 class="fw-bold">Rs. 349/-</h5>
                  <div class="row mt-2">
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="buy-now">
                           Buy Now
                        </button>
                     </div>
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="add-to-cart">
                           Add to Cart
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <li class="m-3">
            <div class="shadow rounded p-2 product-card">
               <div class="product-image">
                  <img src="assets/images/products/07.webp" class="w-100 shadow rounded">
               </div>
               <div class="product-details text-center mt-3">
                  <h6>Kitkat Butter Scotch Half kg Birthday Cake</h6>
                  <h5 class="fw-bold">Rs. 349/-</h5>
                  <div class="row mt-2">
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="buy-now">
                           Buy Now
                        </button>
                     </div>
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="add-to-cart">
                           Add to Cart
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <li class="m-3">
            <div class="shadow rounded p-2 product-card">
               <div class="product-image">
                  <img src="assets/images/products/08.webp" class="w-100 shadow rounded">
               </div>
               <div class="product-details text-center mt-3">
                  <h6>Kitkat Butter Scotch Half kg Birthday Cake</h6>
                  <h5 class="fw-bold">Rs. 349/-</h5>
                  <div class="row mt-2">
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="buy-now">
                           Buy Now
                        </button>
                     </div>
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="add-to-cart">
                           Add to Cart
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <li class="m-3">
            <div class="shadow rounded p-2 product-card">
               <div class="product-image">
                  <img src="assets/images/products/04.webp" class="w-100 shadow rounded">
               </div>
               <div class="product-details text-center mt-3">
                  <h6>Kitkat Butter Scotch Half kg Birthday Cake</h6>
                  <h5 class="fw-bold">Rs. 349/-</h5>
                  <div class="row mt-2">
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="buy-now">
                           Buy Now
                        </button>
                     </div>
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="add-to-cart">
                           Add to Cart
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <li class="m-3">
            <div class="shadow rounded p-2 product-card">
               <div class="product-image">
                  <img src="assets/images/products/05.webp" class="w-100 shadow rounded">
               </div>
               <div class="product-details text-center mt-3">
                  <h6>Kitkat Butter Scotch Half kg Birthday Cake</h6>
                  <h5 class="fw-bold">Rs. 349/-</h5>
                  <div class="row mt-2">
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="buy-now">
                           Buy Now
                        </button>
                     </div>
                     <div class="col-lg-6 col-md-6 col-6">
                        <button class="add-to-cart">
                           Add to Cart
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </li> -->
      </ul>
   </div>
</div>
@include('website.footer')