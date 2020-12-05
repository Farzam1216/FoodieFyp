<!-- Start Top Search -->
@extends('userEnd.layouts.master')
@section('content')   
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

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Foodie</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
                    
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                   @if (session('status'))
                    <div class="alert alert-success" role="alert">
                     {{ session('status')}}
                    </div>
                    @endif
                     @if (session('dstatus'))
                    <div class="alert alert-danger" role="alert">
                     {{ session('dstatus')}}
                    </div>
                    @endif
                    <div class="title-left">
                        <h3>Add Billing Info If Not Already Added</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formLogin"  role="button" aria-expanded="false" class="btn hvr-hover text-white ">Click here To Add Billing Address</a></h5>
                    
                    <form method="POST" action="{{route('checkout.store')}}" class="mt-3 collapse review-form-box" id="formLogin">{{csrf_field()}}
                          @if(DB::table('checkouts')->where('email', Auth::User()->email)->doesntExist())   
                        <div class="form-row">
                        
                            
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="" required>
                                <div class="invalid-feedback"> Please enter your shipping address.
                            </div>
                            </div>
                            
                             <div class=" mb-3">
                                    <label for="country">Country *</label>
                                    <select name="country" class="wide w-100" id="country">
                                    <option value="Choose..." data-display="Select">Choose...</option>
                                    <option value="Pakistan">Pakistan</option>
                                </select>
                                    <div class="invalid-feedback"> Please select a valid country. </div>
                                </div>
                                 <div class=" mb-3">
                                    <label for="country">City *</label>
                                    <select name="city" class="wide w-100" id="country">
                                    <option value="Choose..." data-display="Select">Choose...</option>
                                    <option value="Chakwal">Chakwal</option>
                                </select>
                                    <div class="invalid-feedback"> Please select a valid country. </div>
                                </div>
                        </div>
                       
                        <button type="submit" class="btn hvr-hover">ADD Billing Info</button>
                        @else
                        <h3 class=" text-primary">You have already enterd your Address If you want to change go to right and update Address </h3>
                        @endif
                    </form>

                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    @if (session('ustatus'))
                    <div class="alert alert-success" role="alert">
                     {{ session('ustatus')}}
                    </div>
                    @endif
                    <div class="title-left">
                        <h3 >View OR Edit Billing Info If Already Added</h3>
                    </div>
                    <h5>
                        <a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false" class="btn hvr-hover text-white">Click here to View or Update biiling Info You Added</a></h5>
                         @if(DB::table('checkouts')->where('email', Auth::User()->email)->doesntExist())
                         <h3 class="text-primary mt-3 collapse review-form-box" id="formRegister">Please Enter Address First</h3>
                         @endif

                        @foreach($checkout as $check)
                    <form method="POST" action="{{route('checkout.update',$check->id)}}" class="mt-3 collapse review-form-box" id="formRegister">{{csrf_field()}}
                        @method('PUT')
                        <div class="form-row">
                             @if(DB::table('checkouts')->where('email', Auth::User()->email)->exists())
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">Name</label>
                                <input value="{{$check->name}}" disabled  class="form-control" id="InputName" placeholder="First Name"> </div>
                           
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email</label>
                                <input value="{{$check->email}}" disabled class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>

                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Address</label>
                                <input type="text" name="address" value="{{$check->address}}"  class="form-control" id="InputEmail1" placeholder="Enter Address"> </div>

                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Country</label>
                                <input type="text" name="country" value="{{$check->country}}"  class="form-control" id="InputEmail1" placeholder="Enter Country Name"> </div>                                    
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">City</label>
                                <input type="text" value="{{$check->city}}" name="city" class="form-control" id="InputPassword1" placeholder="Enter City Name"> </div>

                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Mobile</label>
                                <input type="text" value="{{$check->zip}}" name="zip"  class="form-control" id="InputEmail1" placeholder="Enter Mobile Number"> </div>                                        
                                
                        </div>
                        <button type="submit" class="btn hvr-hover">Update Billing Info</button>
                        @endif
                    </form>@endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        
                        <form class="needs-validation" novalidate>
                        
                            
                            <div class="row">
                       
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3 class="">Shopping cart</h3>
                                </div>
                                <?php $total_amount = 0; ?>
                                @foreach($cart as $carts)
                                <div class="rounded p-2 bg-light">
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body text-primary"><h1> <a href="detail.html"></a>{{$carts->name}}</h1>
                                            <div class="large text-muted">Price: Rs {{$carts->price}}  <span class="mx-2">|</span> Qty: {{$carts->quantity}} <span class="mx-2">|</span> Subtotal: Rs {{$carts->price * $carts ->quantity}}</div>
                                        </div>
                                    </div>
                                    
                                </div>
                                 <?php 
                                $deliverycharges = 150;
                                $total_amount = $total_amount + ($carts->price*$carts->quantity); 
                                ?>
                                @endforeach
                               
                            </div>
                        </div>
                        
                    </div>
          

                             </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <hr class="mb-4">

                                <div class="d-flex">
                                    <h4>Cart Sub Total</h4>

                                    <div class="ml-auto font-weight-bold"> PKR  {{$total_amount}} </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Delivery Charges (+)</h4>
                                    <div class="ml-auto font-weight-bold">PKR <?php 
                                    $deliverycharges = 150;    
                                    echo $deliverycharges; ?> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> PKR {{$grand_total = $total_amount + $deliverycharges}} </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        @if(DB::table('checkouts')->where('email', Auth::User()->email)->exists() &&  DB::table('carts')->where('email', Auth::User()->email)->exists())
                        <div class="col-12 d-flex shopping-box"> <a href="orderreview" class="ml-auto btn hvr-hover">Order Review</a>
                            @else
                             
                            <div class="col-12 d-flex shopping-box">
                                @if(DB::table('checkouts')->where('email' , Auth::User()->email)->doesntExist())
                                <a href="#" class="ml-auto btn hvr-hover">Please Add Address First </a>
                                @endif
                                @if(DB::table('carts')->where('email' , Auth::User()->email)->doesntExist())
                               <a href="usercategory" class="ml-auto btn hvr-hover">Please Add Products First </a>
                            @endif
                            @endif
                            
                           </div>
                        </div>
                  </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection    