<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Standard Bakers - Since 1947</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <!-- Favicons -->
      <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
      <link rel="manifest" href="assets/images/favicons/site.webmanifest">
      <!-- Icon Font Stylesheet -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Libraries Stylesheet -->
      <link href="assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
      <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <!-- Slick Slider  -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css'>
      <!-- Customized Bootstrap Stylesheet -->
      <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="assets/css/style.css" rel="stylesheet">
   </head>
   <body>
      <!-- Spinner Start -->
      <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
         <div class="spinner-grow" role="status"></div>
      </div>
      <!-- Spinner End -->
      <!-- Navbar start -->
      <div class="fixed-top">
         <div class="topbar d-none d-lg-block">
            <div class="container-fluid d-flex justify-content-between">
               <div class="top-info ps-2">
                  <small class="me-3" style="letter-spacing: 0px;"><i class="fas fa-phone-alt me-1 text-white"></i> <a href="#" class="text-white">+91 95165 59932</a></small>
                  <span class="text-white me-3"> | </span>
                  <small class="me-3" style="letter-spacing: 0px;"><i class="fas fa-envelope me-1 text-white"></i><a href="#" class="text-white">email@example.com</a></small>
               </div>
               <div class="top-link pe-2">
                  <small class="me-3" style="letter-spacing: 0px;"><i class="fas fa-map-marker-alt me-1 text-white"></i> <a href="#" class="text-white">123 Street, New York - 100001</a></small>
               </div>
            </div>
         </div>
         <div class="container-fluid px-4">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
               <a href="{{URL::to('/')}}" class="navbar-brand">
                  <img src="assets/images/StandardBakersLogo.png" alt="Standard Bakers Logo" width="120" >
               </a>
               <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
               <span class="fa fa-bars"></span>
               </button>
               <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                  <div class="navbar-nav mx-auto">
                     <a href="{{URL::to('/')}}" class="nav-item nav-link active">Home</a>
                     <a href="{{URL::to('/')}}" class="nav-item nav-link">About Us</a>
                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Premium Cakes</a>
                        <div class="dropdown-menu">
                           <div class="row">
                              <div class="col-lg-6">
                                 <a href="" class="dropdown-item">Ready Regulars</a>
                                 <a href="" class="dropdown-item">Photo Cakes</a>
                                 <a href="" class="dropdown-item">Pinata Cakes</a>
                                 <a href="" class="dropdown-item">Unicorn Cakes</a>
                                 <a href="" class="dropdown-item">Fondant Cakes</a>
                                 <a href="" class="dropdown-item">Birthday Boy Cakes</a>
                                 <a href="" class="dropdown-item">Birthday Girl Cakes</a>
                                 <a href="" class="dropdown-item">Anniversary Cakes</a>
                                 <a href="" class="dropdown-item">Retirement Cakes</a>
                              </div>
                              <div class="col-lg-6">
                                 <a href="" class="dropdown-item">Story Cakes</a>
                                 <a href="" class="dropdown-item">Bento Cakes</a>
                                 <a href="" class="dropdown-item">Dry Cakes</a>
                                 <a href="" class="dropdown-item">Wedding Cakes</a>
                                 <a href="" class="dropdown-item">Congratulation Cakes</a>
                                 <a href="" class="dropdown-item">Heart Shape Cakes</a>
                                 <a href="" class="dropdown-item">Number Cakes</a>
                                 <a href="" class="dropdown-item">Alphabet Cakes</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a href="{{URL::to('/')}}" class="nav-item nav-link">Other Products</a>
                     <a href="{{URL::to('/')}}" class="nav-item nav-link">Quality Process</a>
                     <a href="{{URL::to('/testimonials')}}" class="nav-item nav-link">Testimonials</a>
                     <a href="{{URL::to('/contact')}}" class="nav-item nav-link">Contact Us</a>
                  </div>
                  <div class="d-flex m-3 me-0">
                     <?php
                     $session_cart_item = Session::get('cart_item');
                     $cart_count = 0;
                     if($session_cart_item) { $cart_count = count($session_cart_item);}
                     ?>
                     <a href="{{URL::to('/cart')}}" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-cart header-icons"></i>
                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 15px; min-width: 15px;font-size: 14px;font-weight: bold;padding: 5px;">{{$cart_count}}</span>
                     </a>
                     <a href="#" class="my-auto">
                        <i class="fas fa-user header-icons"></i>
                     </a>
                  </div>
               </div>
            </nav>
         </div>
      </div>
      <!-- Navbar End -->