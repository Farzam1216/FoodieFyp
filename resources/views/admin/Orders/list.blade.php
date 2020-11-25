@extends('admin.layouts.master')
@section('content') 
     <!-- ALL Contents Come Here -->
         <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Orders Details </h1>
                  
               </div>
            </section>
              @if (session('status'))
                     <div class="alert alert-success" role="alert">
                     {{ session('status')}}
                   </div>
                   @endif
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">

                           <div class="btn-group" id="buttonexport">
                              <a href="order">
                                 <h4>Orders List</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="orderitem"> <i class=""></i> Order Item List
                                 </a>  <br><br>
                              </div>
   
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <!-- <th>Photo</th> -->
                                      <!--  <th class="text-center">Order_ID</th> -->
                                       <th class="text-center">Name</th>
                                       <!-- <th class="text-center">Email</th> -->
                                       <th class="text-center">Address</th>
                                       <th class="text-center">Mobile</th>
                                       <!-- <th class="text-center">Country</th> -->
                                       <th class="text-center">City</th>
                                       <th class="text-center">Total</th>
                                       <th class="text-center">Order_Items</th>
                                       <th class="text-center">Payment_Method</th>
                                       <th class="text-center">Order_Status</th>
                                       <th class="text-center">Created_at</th>
                                       <th class="text-center">Updated_at</th>
                                       <th class="text-center">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                       <td class="text-center">
                                          {{$order->username}}
                                       </td>
                                      <!--  <td class="text-center">
                                          {{$order->useremail}}
                                       </td> -->
                                       <td class="text-center">
                                          {{$order->useraddress}}
                                       </td>
                                       <td class="text-center">
                                          {{$order->userzip}}
                                       </td>
                                       
                                       <td class="text-center">
                                          {{$order->usercity}}
                                       </td>
                                       <td class="text-center">
                                          RS {{$order->usertotal}}   
                                       </td>
                                       <td class="text-center"><a class="text-danger" href="{{url('/item',$order->id)}}">Click</a></td>
                                       <td class="text-center">
                                          {{$order->paymentmethod}}   
                                       </td>
                                       <td class="text-center">
                                          {{$order->orderStatus}}   
                                       </td>
                                       <td class="text-center">
                                          {{$order->created_at}}   
                                       </td>
                                       <td class="text-center">
                                          {{$order->updated_at}}
                                       </td>
                                       <td class="text-center">
                                          <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="{{'#edit'.$order->id}}"><i class="fa fa-pencil"></i></button>
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{'#delete'.$order->id}}"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                      
<!-- edit Modal -->
 <div class="modal fade" id="{{'edit'.$order->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                 
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3><i class="fa fa-user m-r-5"></i> Update Order</h3>
      </div>
    <div class="modal-body">
         <div class="row">
      \               <div class="col-md-12">
                                 <form enctype="multipart/form-data"  action="{{ route('order.update',$order->id) }}" method="POST" class="form-horizontal">{{ csrf_field() }}
                                    @method('PUT')
                                    <fieldset>
                                       <!-- Text input-->
                                       @if(Auth::user()->role == 'Admin')
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">User Name:</label>
                                          <input type="text" placeholder="User Name" name="username" value="{{$order->username}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">User Email:</label>
                                          <input type="text" placeholder="User Email" name="useremail" value="{{$order->useremail}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">User Address:</label>
                                          <input type="text" placeholder="User Address" name="useraddress" value="{{$order->useraddress}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Country:</label>
                                          <input type="text" placeholder="Country Name" name="usercountry" value="{{$order->usercountry}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">City:</label>
                                          <input type="text" placeholder="City Name" name="usercity" value="{{$order->usercity}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Zip Code:</label>
                                          <input type="text" placeholder="Zip Code" name="userzip" value="{{$order->userzip}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">User Total:</label>
                                          <input type="text" placeholder="User Name" name="usertotal" value="{{$order->usertotal}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Payment Method:</label>
                                          <input type="text" placeholder="Payment Method" name="paymentmethod" value="{{$order->paymentmethod}}" class="form-control">
                                       </div>
                                       @endif
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Order Status:</label>
                                          <input type="text" placeholder="Order Status" name="orderStatus" value="{{$order->orderStatus}}" class="form-control">
                                       </div>
                                        
                                        
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button"  data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>
                                             <button type="submit" class="btn btn-add btn-sm">Save</button>
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
                                    <!-- end Edit Modal -->
<!-- Start Delete Modal -->
 <div class="modal fade" id="{{'delete'.$order->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete Category</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form action="{{ route('order.destroy',$order->id) }}" method="POST"  class="form-horizontal">{{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete Order</label>
                                          <div class="pull-right">
                                             <button  data-dismiss="modal" type="button" class="btn btn-danger btn-sm">NO</button>
                                             <button type="submit" class="btn btn-add btn-sm">YES</button>
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
<!-- End Delete Modal -->
                                  </tr>
                                   @endforeach 
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Edit Modal -->
               <!-- customer Modal1 -->
               
               <!-- /.modal -->
               <!-- Modal -->    
               <!-- Customer Modal2 -->
              
               <!-- /.modal -->
            </section>
            <!-- /.content -->
            

@endsection