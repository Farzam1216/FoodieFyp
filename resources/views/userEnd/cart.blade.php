@extends('userEnd.layouts.cartmaster')
@section('content')
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

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Foodie</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
                    
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
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
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php  $i=0; ?>
                                @foreach($cart as $cart)
                                <tr><?php $i++ ?>
                                    <td class="name-pr text-center"> {{$i}} </td>
                                    <td class="name-pr text-center">
                                        
                                    {{$cart->name}}
                                </a>
                                    </td>
                                    <td class="price-pr text-center">
                                        <p>Rs {{$cart->price}}</p>
                                    </td>
                                    <td class="name-pr text-center">
                                        
                                        <i class="fas fa-plus"></i><button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="{{'#edit'.$cart->id}}">{{$cart->quantity}}</i>
                                        </button><i class="fas fa-minus">

<!-- edit Modal -->
 <div class="modal fade" id="{{'edit'.$cart->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                 
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3>Update Quantity</h3>
      </div>
    <div class="modal-body">
         <div class="row">
      \               <div class="col-md-12">
                                 <form action="{{ route('cart.update',$cart->id) }}" method="POST" class="form-horizontal">{{ csrf_field() }}
                                    @method('PUT')
                                    <fieldset>
                                       <!-- Text input-->
                                      <div class="col-md-4 input-group">
                                          
                                          <input type="number" value="{{$cart->quantity}}" placeholder="Quantity" name="quantity"  class="form-control text-center">

                                          <div class="pull-right">
                                            <br><br>
                                             <button type="submit" class="btn btn-add btn-sm">Save</button>
                                             <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                                             
                                          </div>
                                       </div>
                                       <div class="col-md-12 form-group user-form-group">

                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
                                    <!-- end Edit Modal -->


                                    </td>
                                    <td class="total-pr text-center">
                                        <p>RS {{$cart->price * $cart->quantity}}</p>
                                    </td>
                                    <td class="remove-pr ">
                                        <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="{{'#delete'.$cart->id}}"><i class="fa fa-trash-o"></i><i class="fas fa-times"></i> </button>
                                    
                                    <!-- Start Delete Modal -->
 <div class="modal fade" id="{{'delete'.$cart->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i>Cancel</h3> -->
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form action="{{ route('cart.destroy',$cart->id) }}" method="POST"  class="form-horizontal">{{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label text-danger">Are You Sure You Want To Remove This Product ?</label>
                                          <div class="pull-right">
                                             <button type="submit" class="btn btn-danger btn-sm">YES</button>
                                             <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NO</button>
                                             
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>

                                    </td>
                                </tr>@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                    <div class="update-box d-flex">
                        <a href="checkout"><input ml-auto btn hvr-hover value="Checkout" type="submit" ></a>
                        <a href="usercategory"><input ml-auto btn hvr-hover value="Add More Poducts" type="submit"> </a> 
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    
                <div class="col-12 d-flex shopping-box"><a href="checkout" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart
@endsection