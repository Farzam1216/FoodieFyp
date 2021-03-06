@extends('userEnd.layouts.master')
@section('content')
                    @if (session('status'))
                     <div class="alert alert-success text-center" role="alert">
                     {{ session('status')}}
                   </div>
                   @endif
                   @if (session('danger'))
                     <div class="alert alert-danger text-center" role="alert">
                        <h1 class="text-primary">{{ session('danger')}}</h1>
                   </div>
                   @endif
    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="pics/img1.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>Foodie</strong></h1>
                            <h2 style="color: white">Taste of this savoury dish, it gets limited to few words like delicious, lip smacking, awesome, spicy, mouthwatering, moist, dry, succulent etc</h2>
                            <p><a class="btn hvr-hover" href="usercategory">Shop Now</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="pics/c3img.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>Foodie</strong></h1>
                            <h2 style="color: white">Gives spicy, juicy, crunchy and tendering experience to tongue</h2>
                            <p><a class="btn hvr-hover" href="usercategory">Shop Now</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="pics/img2.jpg" alt="">
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
    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Food Categories</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($categories as $categories)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{asset('/Uploadimages/Categories/'.$categories->image)}}" alt="" style="height: 300px"/>
                        <a class="btn hvr-hover" href="{{url('categoryDetail/'.$categories->id)}}">{{$categories->name}}</a>
                    </div>
                </div>
               
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Categories -->
 <div class="shop-detail-box-main">
        <div class="container">
            

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p> --}}
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach($products as $products)
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="{{asset('/Uploadimages/Products/'.$products->image)}}" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="{{asset('/Uploadimages/Products/'.$products->image)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="{{url('productDetails/'.$products->id)}}">Product Detail</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h5 class="text-center">{{$products->name}}</h5>
                                    <h5 class="text-center">PKR {{$products->price}} ({{$products->units}})</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- slider -->
    <!-- Our Restaurants  -->
    <div class="categories-restaurants">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Our Restaurants </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($resturants as $resturant)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{asset('/Uploadimages/Resturants/'.$resturant->image)}}" alt="" style="height: 300px"/>
                        <a class="btn hvr-hover" href="{{url('resturantDetail/'.$resturant->id)}}">{{$resturant->name}}</a>
                    </div>
                </div>
               
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Restaurants -->
@endsection