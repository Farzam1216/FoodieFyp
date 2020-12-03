@extends('userEnd.layouts.cartmaster')
@section('content')



<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th class="text-center">Name</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Mobile</th>
                                <th class="text-center">Address</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($checkout as $checkouts)
                            <tr>
                                <td class=" text-center">
                                    {{$checkouts->name}}
                                </td>
                               <td class=" text-center">
                                    {{$checkouts->city}}
                                </td>
                                <td class=" text-center">
                                    {{$checkouts->zip}}
                                </td>
                                <td class=" text-center">
                                    {{$checkouts->address}}    
                                </td>
                                
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_amount = 0; ?>
                            @foreach($cart as $cart)
                            <tr>
                                
                                <td class="name-pr text-center">
									{{$cart->name}}
                                </td>
                               <td class="price-pr text-center">
                                    <p>PKR {{$cart->price}}</p>
                                </td>
                                <td class="quantity-box text-center">
                                    {{$cart->quantity}}
                                </td>
                                <td class="total-pr text-center">
                                    <p>PKR {{$cart->price*$cart->quantity}}</p>
                                </td>
                                
                            </tr>
                            <?php 
                            $deliverycharges = 150;
                            $total_amount = $total_amount + ($cart->price*$cart->quantity); 
                            ?>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="order-box">

                    <h3>Your Total</h3>
                    <hr class="mb-4 title-left">

                    <div class="d-flex">
                        <h4>Cart Sub Total</h4>

                        <div class="ml-auto font-weight-bold"> PKR  {{$total_amount}} </div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Delivery Charges (+)</h4>
                        <div class="ml-auto font-weight-bold">PKR <?php 
                             $deliverycharges = 150;
                         echo $deliverycharges; ?> </div>
                    </div>
                    <hr class="my-1 ">
  
                    <div class="d-flex  ">
                        <h3 class="text-danger">Grand Total</h3>
                        <div class="ml-auto h5 text-danger"> PKR {{$grand_total = $total_amount + $deliverycharges}} </div>
                    </div>
                    </div> 
            </div>
            
        </div>

        <form action="{{route('orderreview.store')}}" method="POST"> {{csrf_field()}}
           @foreach($checkout as $checkout)
           <input type="hidden" name="username" value="{{$checkout->name}}">
           <input type="hidden" name="useremail" value="{{$checkout->email}}">
           <input type="hidden" name="usercountry" value="{{$checkout->country}}">
           <input type="hidden" name="useraddress" value="{{$checkout->address}}">
           <input type="hidden" name="usercity" value="{{$checkout->city}}">
           <input type="hidden" name="userzip" value="{{$checkout->zip}}">
           <input type="hidden" name="usertotal" value="{{$grand_total = $total_amount + $deliverycharges}}">
           @endforeach 
            <hr class="mb-4">
            <div class="title-left">
                <h3>Payments</h3>
            </div>
            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit"  name="payment_method" value="cod"  type="radio" class="custom-control-input cod">
                    <label class="custom-control-label" select for="credit">Cash On Delivery</label>
                </div>
                
                <div class="col-12 d-flex shopping-box">
                    <button type="submit" class="ml-auto btn hvr-hover text-white"  >Place Order </button> 
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Cart -->
@endsection