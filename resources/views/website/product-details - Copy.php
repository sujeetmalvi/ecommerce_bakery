<?php include('header.php');?>
<style type="text/css">
   label {
    font-size: .8rem;
    color: #9e9e9e;
}
[type=radio]:checked, [type=radio]:not(:checked) {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}
[type=radio] {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}
[type=radio]:checked, [type=radio]:not(:checked) {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}
[type=checkbox], [type=radio] {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}
button, input, optgroup, select, textarea {
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
}
button, input {
    overflow: visible;
}
   [type=radio]:not(:checked)+span {
    color: #666666;
    border-radius: 7px;
    border: 1px solid #CFCFCF;
    padding: 0 16px 0;
}
[type=radio]:checked+span, [type=radio]:not(:checked)+span {
    position: relative;
    padding-left: 35px;
    cursor: pointer;
    display: inline-block;
    height: 25px;
    line-height: 25px;
    font-size: 1rem;
    -webkit-transition: .28s ease;
    transition: .28s ease;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
[type=radio]:checked+span {
    background-color: #FF4E84;
    color: #FFFFFF!important;
    border-radius: 7px;
    border: 1px solid #FF4E84;
    padding: 0 16px 0;
}
[type=radio]:checked+span {
    background-color: #FF4E84;
    color: #FFFFFF!important;
    border-radius: 7px;
    border: 1px solid #FF4E84;
    padding: 0 16px 0;
}
</style>
<div class="container-fluid page-header py-5">
   <h1 class="text-center text-white display-6">Product Name</h1>
   <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active text-white">Product Name</li>
   </ol>
</div>
<div class="container-fluid py-5 mt-5">
   <div class="container py-5">
      <div class="row g-4 mb-5">
         <div class="col-lg-12 col-xl-12">
            <div class="row g-4">
               <div class="col-lg-5">
                  <div class="border rounded">
                     <a href="#">
                     <img src="assets/images/products/01.webp" class="img-fluid rounded" alt="Image">
                     </a>
                  </div>
               </div>
               <div class="col-lg-7">
                  <h4 class="fw-bold mb-3">Kitkat Butter Scotch</h4>
                  <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                  <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p>
                  <h5 class="fw-bold mb-3">Rs. <span class="display-6 fw-bold">449/-</span> </h5>
                  <!-- <div class="input-group quantity mb-5" style="width: 100px;">
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
                  </div> -->
                  <div class="details-form">
                     <form method="post" action="">
                        <div>
                           <p class="fw-bold mb-0 mt-4">Weight:</p>
                        </div>
                        <!-- <input type="radio" name="Hi">111
                        <input type="radio" name="Hi">111 -->

                        <label>
                           <input class="with-gap prod-att-radio" name="att_2" type="radio">
                           <span for="attval_500 gm" style="margin-right:10px; height:31px; line-height:30px; text-align:center; width:100%;border: 1px solid #000000;">500 gm</span>
                        </label>
                        <label>
                           <input class="with-gap prod-att-radio" name="att_2" type="radio">
                           <span for="attval_500 gm" style="margin-right:10px; height:31px; line-height:30px; text-align:center; width:100%;border: 1px solid #000000;">1000 gm</span>
                        </label>
                        <label>
                           <input class="with-gap prod-att-radio" name="att_2" type="radio">
                           <span for="attval_500 gm" style="margin-right:10px; height:31px; line-height:30px; text-align:center; width:100%;border: 1px solid #000000;">1500 gm</span>
                        </label>

                        <label>
                           <input type="radio" name="na">1
                           <input type="radio" name="na">2
                           <input type="radio" name="na">3
                           <input type="radio" name="na">4
                        </label>
                     </form>
                  </div>
                  <div class="row mt-2">
                     <div class="col-lg-3 col-md-3 col-6">
                        <button class="buy-now">
                           Buy Now
                        </button>
                     </div>
                     <div class="col-lg-3 col-md-3 col-6">
                        <button class="add-to-cart">
                           Add to Cart
                        </button>
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
                        <div class="d-flex">
                           <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</p>
                           <ul>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                              <li>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</li>
                           </ul>
                        </div>
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
      <h1 class="fw-bold mb-0">Similar products</h1>
      <ul class="slick-slider">
         <li class="m-3">
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
         </li>
      </ul>
   </div>
</div>
<?php include('footer.php');?>