@include('website.header')
<div class="container-fluid page-header py-5">
   <h1 class="text-center text-white display-6">Login</h1>
   <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active text-white">Login</li>
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
                  <input type="tel" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Contact Number">
                  <input type="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter password">
                  <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Login</button>
               </form>
               <p class="text-center pt-3">Not Registered <u><a href="{{URL::to('/register')}}">Register Now</a></u> </p>
            </div>
         </div>
      </div>
   </div>
</div>
@include('website.footer')