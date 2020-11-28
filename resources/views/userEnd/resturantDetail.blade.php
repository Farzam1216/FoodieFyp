@extends('userEnd.layouts.cartmaster')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Resturant Details</li>
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
                @foreach($resturant as $resturants)
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <ol class="">
                        <li class="">
                            <a href="{{asset('/Uploadimages/Resturants/'.$resturants->image)}}">   <img class="d-block w-100 img-fluid" src="{{asset('/Uploadimages/Resturants/'.$resturants->image)}}" alt="" /></a>
                        </li>
                    </ol>
                </div>
                @endforeach
                <div class="col-xl-7 col-lg-7 col-md-6">@foreach($resturant as $resturants)
                <form action="" method="POST">
                    <div class="single-product-details"><br><br><br><br><br> 
                        <h2 class="text-center">Resturant Name : {{$resturants->name}}</h2>
                        <h2 class="text-center"> </h2>
                        <h2 class="text-center">Short Description: </h2>
                        <h3 class="text-center">{{$resturants->description}}</h3>
                    </div>
                </form>
                </div>                
                </div>@endforeach
            </div>
     </div>
    </div>
@endsection