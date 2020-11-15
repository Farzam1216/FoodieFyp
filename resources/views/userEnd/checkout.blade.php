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
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                   
                    <div class="title-left">
                        <h3>Billing Info</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formLogin"  role="button" aria-expanded="false" class="text-danger">Click here For Billing Address</a></h5>
                    
                    <form method="POST" action="{{route('checkout.store')}}" class="mt-3 collapse review-form-box" id="formLogin">{{csrf_field()}}
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
                                
                                <div class=" mb-3">
                                    <label for="zip">Zip *</label>
                                    <input name="zip" type="text" class="form-control" id="zip" placeholder="" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                               
                            
                        </div>
                        <button type="submit" class="btn hvr-hover">ADD Billing Info</button>
                    </form>
                    
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>View Billing Info</h3>
                    </div>
                    <h5>
                        <a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false" class="text-danger">Click here to View biiling Info You Added</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formRegister">
                        <div class="form-row">
                            @foreach($checkout as $check)
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">Name</label>
                                <input value="{{$check->name}}" disabled  class="form-control" id="InputName" placeholder="First Name"> </div>
                           
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email</label>
                                <input value="{{$check->email}}" disabled class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>

                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Address</label>
                                <input value="{{$check->address}}" disabled class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>

                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Country</label>
                                <input value="{{$check->country}}" disabled class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>                                    
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">City</label>
                                <input value="{{$check->city}}" disabled class="form-control" id="InputPassword1" placeholder="Password"> </div>

                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Zip</label>
                                <input value="{{$check->zip}}" disabled class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>                                        
                                @endforeach
                        </div>
                        
                    </form>
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
                                @foreach($cart as $carts)
                                <div class="rounded p-2 bg-light">
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body text-primary"><h1> <a href="detail.html"></a>{{$carts->name}}</h1>
                                            <div class="large text-muted">Price: Rs {{$carts->price}}  <span class="mx-2">|</span> Qty: {{$carts->quantity}} <span class="mx-2">|</span> Subtotal: Rs {{$carts->price * $carts ->quantity}}</div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                        
                    </div>
          <hr class="mb-1">

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
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> Rs 1340</div>
                                </div>
                                <div class="d-flex">
                                    <h4>Discount</h4>
                                    <div class="ml-auto font-weight-bold"> Rs 0</div>
                                </div>
                                <hr class="my-1">
                                
                                <div class="d-flex">
                                    <h4>Tax</h4>
                                    <div class="ml-auto font-weight-bold"> Rs 5</div>
                                </div>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> Rs 1345</div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"> <a href="userindex" class="ml-auto btn hvr-hover">Place Order</a> </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection    