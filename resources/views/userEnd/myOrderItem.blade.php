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
  <table class="table table-hover table-bordered">
        <thead class="bg-danger text-white">
          <tr class="text-center" >
          <th>#</th>
          <th>Item Name</th>
          <th>Item Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Delivery Charges</th>
          <th>Created At</th>
          </tr>
        </thead>
                    <tbody>
          <?php $total_amount = 0; ?>
          <?php $i=0; ?>
          @foreach($ordersitem as $ordersitem)
          <?php $i++; ?>
          <tr  >
             <th class="text-center" scope="row">{{$i}}</th>
                       <td class="text-center">
                          {{$ordersitem->name}}
                       </td>
                       <td class="text-center">
                          {{$ordersitem->price}}
                       </td>
                       <td class="text-center">
                          {{$ordersitem->quantity}}
                       </td>
                       <td class="text-center">
                          RS {{$ordersitem->price * $ordersitem->quantity}}   
                       </td>
                       <td class="text-center">Rs 150</td>
                       <td class="text-center">
                          {{$ordersitem->created_at}}   
                       </td>
          </tr>
          <?php 
                      $deliverycharges = 150;
                      $total_amount = $total_amount + ($ordersitem->price*$ordersitem->quantity); 
                    ?>
          @endforeach
          <tr>
                      <th class="text-center bg-danger text-white" colspan="5" >Grand_Total</th>
                      <th class="text-center bg-danger text-white" colspan="4">
                        <?php 
                            $deliverycharges = 150;
                            $total_amount = $total_amount  + $deliverycharges; 
                          ?>
                         RS  {{$total_amount}}</th>
                    </tr>
        </tbody>
                </table>

</div><br><br><br>
@endsection