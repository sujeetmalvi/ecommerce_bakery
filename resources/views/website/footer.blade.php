      <!-- Footer Start -->
      <div class="container-fluid bg-light text-white-50 footer pt-5 mt-5">
         <div class="container py-5">
            <div class="row g-5">
               <div class="col-lg-3 col-md-6">
                  <div class="footer-item">
                     <h4 class="text-dark mb-3">About Us !</h4>
                     <p class="text-dark mb-4">typesetting, remaining essentially unchanged. It was 
                        popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.
                     </p>
                     <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="d-flex flex-column text-start footer-item">
                     <h4 class="text-dark mb-3">Quick Links !</h4>
                     <a class="btn-link" href="">About Us</a>
                     <a class="btn-link" href="">Premium Cakes</a>
                     <a class="btn-link" href="">Customized Cakes</a>
                     <a class="btn-link" href="">Other Products</a>
                     <a class="btn-link" href="">Our Stores</a>
                     <a class="btn-link" href="">Get Franchisee</a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="d-flex flex-column text-start footer-item">
                     <h4 class="text-dark mb-3">Policy Info !</h4>
                     <a class="btn-link" href="">Terms & Conditions </a>
                     <a class="btn-link" href="">Disclaimer</a>
                     <a class="btn-link" href="">Cancellation Policy</a>
                     <a class="btn-link" href="">Return Policy</a>
                     <a class="btn-link" href="">FAQ's</a>
                     <a class="btn-link" href="">Contact Us</a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="footer-item">
                     <h4 class="text-dark mb-3">Contact Us !</h4>
                     <p>Address: 1429 Netus Rd, NY 48247</p>
                     <p>Email: Example@gmail.com</p>
                     <p>Phone: +0123 4567 8910</p>
                     <div class="d-flex pt-2">
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Footer End -->
      <!-- Copyright Start -->
      <div class="container copyright bg-light py-4" style="border-top: 1px solid rgba(160, 160, 160, 0.5) ;">
         <div class="container">
            <div class="row">
               <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                  <p><span class="footer-text mb-0">Copyright &copy; 2023 <a href="#"><u>Standard Bakers</u></a>. All right reserved.</span></p>
               </div>
               <div class="col-md-6 my-auto text-center text-md-end text-dark">
                  <p class="footer-text mb-0">Powered By <a class="border-bottom" href="https://rachitsoftsol.com/" target="_blank"><u>RaChiT</u>.</a></p>
               </div>
            </div>
         </div>
      </div>
      <!-- Copyright End -->
      <!-- Back to Top -->
      <a href="#" class="rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
      <!-- JavaScript Libraries -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="assets/lib/easing/easing.min.js"></script>
      <script src="assets/lib/waypoints/waypoints.min.js"></script>
      <script src="assets/lib/lightbox/js/lightbox.min.js"></script>
      <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
      <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script> -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>
      <script type="text/javascript">
         $('.slick-slider').on('init', (event, slick, currentSlide) => {
           let slideIndex = slick.currentSlide;
           let slidesLength = slick.slideCount;
         })

         // Initialise.
         $('.slick-slider').slick({
           slidesToShow: 3,
           dots: true,
           autoPlay: true,
           // centerMode: true,
           responsive: [
             {
               breakpoint: 768,
               settings: {
                 slidesToShow: 1
               }
             }
           ]
         })

         let slideIndex = $('.slick-slide:not(.slick-cloned)').length
           $('.add-slide').on('click', () => {
             slideIndex++
             $('.slick-slider').slick('slickAdd','<li><h3>' + slideIndex + '</h3></li>')
             $('.slick-slider').slick('slickGoTo', 'slickCurrentSlide' + 1)
           })

           $('.remove-slide').on('click', () => {
             $('.slick-slider').slick('slickRemove', slideIndex - 1)
               if (slideIndex !== 0) {
                 slideIndex--
               }
           })
      </script>
      <!-- Template Javascript -->
      <script src="assets/js/main.js"></script>
      <script src="assets/lib/MaxLength.min.js"></script>
      <script type="text/javascript">
         $(function () {
            //Normal Configuration.
            $("#cake_message").MaxLength({ MaxLength: 15 });

            //Specifying the Character Count control explicitly.
            $("#TextBox2").MaxLength(
         {
            MaxLength: 15,
            CharacterCountControl: $('#counter')
        });

            //Disable Character Count.
            $("#TextBox3").MaxLength(
        {
            MaxLength: 20,
            DisplayCharacterCount: false
        });
        });

         $(document).ready(function() {
            $('.item_add_to_cart').click(function(){       
               var product_id = $(this).attr('data-id');
               var weight = $('input[name="weight"]:checked').val();
               var quantity = $('input[name="quantity"]').val();
               var property = $('input[name="property"]:checked').val();
               var weight_id = $('input[name="weight"]:checked').attr('data-id');
               var property_id = $('input[name="property"]:checked').attr('data-id');
               var cake_message = $('#cake_message').val();
               
               let data = {
                  product_id: product_id,
                  weight: weight,
                  weight_id: weight_id,
                  property: property,
                  property_id: property_id,
                  quantity: quantity,
                  cake_message: cake_message
               }
              
               // loader.show()
               $.ajax({
                  url: '/add-item-in-cart',
                  type: 'post',
                  data: data,
                  success: function(data){
                     console.log('data',data)

                     // loader.hide();
                      var json_response = jQuery.parseJSON(data);
                      location.reload();
                  }
               });
            });

            $('.cart-remove-item').click(function(){       
               var prod_weight_id = $(this).attr('data-id');
              
               // loader.show()
               $.ajax({
                  url: '/remove-item-from-cart',
                  type: 'post',
                  data: {prod_weight_id: prod_weight_id},
                  success: function(data){
                     console.log('data',data)

                     // loader.hide();
                      var json_response = jQuery.parseJSON(data);
                      location.reload();
                  }
               });
            });

            $('#checkout_form').on('submit', function (e) {
               e.preventDefault();
               var grand_total = $('input[name="grand_total"]').val();
               if(grand_total != 0) {
                  let data = {
                     first_name: $('#first_name').val(),
                     last_name: $('#last_name').val(),
                     company_name: $('#company_name').val(),
                     address: $('#address').val(),
                     city: $('#city').val(),
                     country: $('#country').val(),
                     zip_code: $('#zip_code').val(),
                     mobile: $('#mobile').val(),
                     email: $('#email').val(),
                     note: $('#note').val()
                  }

                  $.ajax({
                     url: '/add-user',
                     type: 'post',
                     data: data,
                     success: function(data){
                        // console.log('data',data)
                        var json_response = jQuery.parseJSON(data);
                        window.location.href = '/payment';
                     }
                  });
               }
               
            });

            $('.add_to_cart').click(function(){       
               var product_id = $(this).attr('data-id');
              
               // loader.show()
               $.ajax({
                  url: '/add-item-in-cart',
                  type: 'post',
                  data: {product_id: product_id, product_quantity: 1, product_weight: '500 gm'},
                  success: function(data){
                     console.log('data',data)

                     // loader.hide();
                      var json_response = jQuery.parseJSON(data);
                      location.reload();
                  }
               });
            });

            $('.buy_now').click(function(){       
               var product_id = $(this).attr('data-id');
              
               // loader.show()
               $.ajax({
                  url: '/add-item-in-cart',
                  type: 'post',
                  data: {product_id: product_id, product_quantity: 1, product_weight: '500 gm'},
                  success: function(data){
                     console.log('data',data)

                     // loader.hide();
                     var json_response = jQuery.parseJSON(data);
                     window.location.href = '/cart';
                  }
               });
            });

            $('.item_buy_now').click(function(){     
               var product_id = $(this).attr('data-id');
               var weight = $('input[name="weight"]:checked').val();
               var quantity = $('input[name="quantity"]').val();
               var property = $('input[name="property"]:checked').val();
               var weight_id = $('input[name="weight"]:checked').attr('data-id');
               var property_id = $('input[name="property"]:checked').attr('data-id');
               var cake_message = $('#cake_message').val();
               
               let data = {
                  product_id: product_id,
                  weight: weight,
                  weight_id: weight_id,
                  property: property,
                  property_id: property_id,
                  quantity: quantity,
                  cake_message: cake_message
               }
              
               // loader.show()
               $.ajax({
                  url: '/add-item-in-cart',
                  type: 'post',
                  data: data,
                  success: function(data){
                     console.log('data',data)

                     // loader.hide();
                     var json_response = jQuery.parseJSON(data);
                     window.location.href = '/cart';
                  }
               });
            });

            $('.increase_qty').click(function(){       
               var prod_weight_id = $(this).attr('data-id');
              
               // loader.show()
               $.ajax({
                  url: '/increase-decrease-qty',
                  type: 'post',
                  data: {prod_weight_id: prod_weight_id, type: 'increase_qty'},
                  success: function(data){
                     console.log('data',data)

                     // loader.hide();
                     var json_response = jQuery.parseJSON(data);
                     // window.location.href = '/cart';
                     location.reload();
                  }
               });
            });

            $('.decrease_qty').click(function() { 
               var prod_weight_id = $(this).attr('data-id');
               var quantity = $('#quantity_'+prod_weight_id).val();
               if(quantity == 0) {
                  $('#quantity_'+prod_weight_id).val(1);
               }
               if(quantity >= 1) { 
                  // loader.show()
                  $.ajax({
                     url: '/increase-decrease-qty',
                     type: 'post',
                     data: {prod_weight_id: prod_weight_id, type: 'decrease_qty'},
                     success: function(data){
                        console.log('data',data)

                        // loader.hide();
                        var json_response = jQuery.parseJSON(data);
                        // window.location.href = '/cart';
                        location.reload();
                     }
                  });
               }
            });

            $('.dec_qty').click(function(){ 
               var quantity = $('input[name="quantity"]').val();
               if(quantity == 0) {
                  $('input[name="quantity"]').val(1);
               }
            });

            $('.weights').click(function() {
               let weight_id = $(this).attr('data-id');
               let price = $('input[name="weight_array"]').val();
               price = JSON.parse(price);

               let product_price = 0;
               for(i=0; i<price.length; i++) {
                  if(price[i].weight_id == weight_id) {
                     product_price = price[i].product_price;
                  }
               }
               $('.product_price').text(product_price);
            })
         });
   </script>
   </body>
</html>