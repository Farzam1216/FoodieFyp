@extends('userEnd.layouts.master')
@section('content')

<!-- Start All Title Box -->
    <div class="all-title-box" style="height: 200px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Traditional Food</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Traditional Foods</li>
                    </ul>
                </div><br><br>
            </div>
        </div>
    </div>
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 shop-content-center">
                    
                    <div class="right-product-box">
                        

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">@foreach($products as $products)
                                       
                                        
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <img src="{{asset('/Uploadimages/Products/'.$products->image)}}" style="height: 350px "  class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                         <form action="{{route('cart.store')}}" method="POST">{{csrf_field()}}
                                                         <input type="hidden" name="name" value="{{$products->name}}">
                                                         <input type="hidden" name="price" value="{{$products->price}}"> 
                                                         <input type="hidden" name="quantity" value="1"> 
                                                        <input class="cart  btn btn-danger" type="submit" name="" value="Add To Cart">
                                                      
                                                   </form> </div>
                                                </div>
                                                <div class="why-text title-all text-center">
                                                    <h1 class="text-center">{{$products->name}}</h1>
                                                    <h3 class="text-center"> RS {{$products->price}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                               
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection