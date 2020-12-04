@extends('userEnd.layouts.cartmaster')
@section('content')
<body>
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

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <!-- <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div> -->
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" >
                                @foreach($categories as $cat)
                                <div class=" ">
                                  <h1><a href="{{url('/categories/'.$cat->id)}}" class="list-group-item  list-group-item-action">{{$cat->name}}</h1> 
								</a>
                                    <div class="collapse" id="{{$cat->id}}" data-parent="#list-group-men">
                                        <div class="list-group">
                                            
                                        <a href="" class="list-group-item list-group-item-action"></a>
                                           
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                         <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                <img src="{{asset('/Uploadimages/Products/'.$product->image)}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        
                                                        <form action="{{route('cart.store')}}" method="POST">{{csrf_field()}}
                                                         <input type="hidden" name="name" value="{{$product->name}}">
                                                         <input type="hidden" name="quantity" value="1">
                                                         <input type="hidden" name="price" value="{{$product->price}}"> 
                                                        <input class="cart  btn btn-danger" type="submit" name="" value="Add To Cart">
                                                      
                                                   </form>
                                                     <a class="cart" href="{{url('/productDetails/'.$product->id)}}">Detail Page</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4 class="text-center">
                                                        {{$product->name}}
                                                    </h4>
                                                    <h5 class="text-center">
                                                        RS {{$product->price}} 
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                            <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection