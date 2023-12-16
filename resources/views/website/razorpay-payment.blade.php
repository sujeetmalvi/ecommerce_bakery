@include('website.header')
<div class="container-fluid page-header py-5">
   <h1 class="text-center text-white fw-bols">Pay Now</h1>
   <!-- <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active text-white">Contact</li>
   </ol> -->
</div>
<section style="margin-top: 50px !important">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card card-default razorpay-payment">
                <div class="card-header" style="border: 0; background: #fff; text-align: center;">
                    Razorpay Payment
                </div>
                <div class="card-body text-center">
                    <form action="{{ URL::to('/razorpay-payment') }}" method="POST" >
                        <?php
                        $grand_total_paise = Session::get('grand_total_paise');
                        $grand_total = Session::get('grand_total');
                        ?>
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
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</section>
@include('website.footer')