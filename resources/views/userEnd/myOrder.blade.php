@extends('userEnd.layouts.cartmaster')
@section('content')
<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="{{asset('front_assets/pics/img1.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>Foodie</strong></h1>
                            <h2 style="color: white">Taste of this savoury dish, it gets limited to few words like delicious, lip smacking, awesome, spicy, mouthwatering, moist, dry, succulent etc</h2>
                            <p><a class="btn hvr-hover" href="#">Shop Now</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{asset('front_assets/pics/c3img.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>Foodie</strong></h1>
                            <h2 style="color: white">Gives spicy, juicy, crunchy and tendering experience to tongue</h2>
                            <p><a class="btn hvr-hover" href="#">Shop Now</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{asset('front_assets/pics/img2.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Foodie</strong></h1>
                          <h2 style="color: white">Zinger is a Juicy, spicy and crispy chicken fillet, topped with iceberg lettuce & delicious mayo, served in a soft sesame bun</h2>
                            <p><a class="btn hvr-hover" href="#">Shop Now</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
<!-- End Slider -->
    <div class="welcomemarque"><br><br><br>
        <marquee scrollamount0="10" direcrtion="left" behaviour="scroll">
            <h1>Welcome to Foodie Explore Food, Order Your Favourate Food And Much More...</h1>
        </marquee>
    </div>
    <div class="container">
	
            <div class="table-main table-responsive table-bordered">
                    <table class="table table-hover">
                        <thead class="bg-danger text-white">
                            <tr class="text-center" >
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Order Status</th>
                            <th>Payment Method</th>
                            <th>Order Items</th>
                            </tr>
                        </thead>
                       <tbody>
                    <?php $i=0; ?>
                    @foreach($Order as $Order)
                    <?php $i++; ?>
                    <tr  >
                        <th class="text-center" scope="row">{{$i}}</th>
                        <td class="text-center">{{$Order->username}}</td>
                        <td class="text-center">{{$Order->useraddress}}</td>
                        <td class="text-center">{{$Order->userzip}}</td>
                        <td class="text-center">{{$Order->orderStatus}}</td>
                        <td class="text-center">{{$Order->paymentmethod}}</td>
                        <td class=" text-center "><a class="btn btn btn-sm text-white text-center hvr-hover" href="{{url('/myOrderItem',$Order->id)}}">Click</a></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
		</div>	
	</div>	<br><br><br>	

@endsection