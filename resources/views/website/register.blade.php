@include('website.header')
<div class="container-fluid page-header py-5">
   <h1 class="text-center text-white display-6">Register</h1>
   <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active text-white">Register</li>
   </ol>
</div>
<div class="container-fluid contact py-5">
   <div class="container py-5">
      <div class="p-5 bg-light rounded">
         <div class="row g-4">
            <div class="col-12">
               <div class="text-center mx-auto" style="max-width: 700px;">
                  <h1 class="text-primary">Login</h1>
               </div>
            </div>
            <div class="col-lg-12">
               <form action="" class="">
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter First Name">
                     </div>
                     <div class="col-lg-6">
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Last Name">
                     </div>
                     <div class="col-lg-6">
                        <input type="tel" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Contact Number">
                     </div>
                     <div class="col-lg-6">
                        <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Email">
                     </div>
                     <div class="col-lg-6">
                        <input type="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter password">
                     </div>
                     <div class="col-lg-6">
                        <input type="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Confirm password">
                     </div>
                  </div>
                  <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Register</button>
               </form>
               <p class="text-center pt-3">Already Registered <u><a href="{{URL::to('/login')}}">Login Now</a></u> </p>
            </div>
         </div>
      </div>
   </div>
</div>
@include('website.footer')