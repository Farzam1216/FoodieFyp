@extends('userEnd.layouts.cartmaster')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                @foreach($products as $Product)
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <ol class="">
                        <li class="">
                            <a href="{{asset('/Uploadimages/Products/'.$Product->image)}}">   <img class="d-block w-100 img-fluid" src="{{asset('/Uploadimages/Products/'.$Product->image)}}" alt="" /></a>
                        </li>
                    </ol>
                </div>
                @endforeach
                <div class="col-xl-7 col-lg-7 col-md-6">@foreach($products as $products)
                <form action="{{route('cart.store')}}" method="POST">{{csrf_field()}}
                    <div class="single-product-details">
                    
                        <input type="hidden" name="name" value="{{$products->name}}">
                        <input type="hidden" name="price" value="{{$products->price}}">  
                    
                        <h2>Product Name : {{$products->name}}</h2>
                        <h5 >Product Price: Rs {{$products->price}}</h5>
                            <p>
                                <h4>Short Description:</h4>
                                <h4>{{$products->description}} </h4>
                                <ul>
                                    <li>
                                        <div class="form-group quantity-box">
                                            <h4><label class="control-label">Select Quantity: </label></h4>
                                            <input class="form-control" name="quantity" value="1" min="1" max="20" type="number">
                                        </div>
                                    </li>
                                </ul>

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">        
                                        <button class="btn hvr-hover" data-fancybox-close="" type="submit" style="color:white;">Add to cart</button>
                                    </div>
                                </div>

                                <div class="add-to-btn">
                                    
                                    <div class="share-bar">
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                    </div>
                </form>
                </div>@endforeach
            </div>

            

        </div>
    </div>
@endsection