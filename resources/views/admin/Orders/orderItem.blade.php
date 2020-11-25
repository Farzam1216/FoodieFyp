@extends('admin.layouts.master')
@section('content') 
     <!-- ALL Contents Come Here -->
         <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Order Items List</h1>
                  
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
                                 <h4>Order Items</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                   <a class="btn btn-add" href="order"> <i class=""></i> Order Detail List
                                 </a>  <br><br>
                              </div>
   
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       
                                       <th class="text-center">Name</th>
                                       <th class="text-center">Email</th>
                                       <th class="text-center">Order_ID</th>
                                       <th class="text-center">Item_Name</th>
                                       <th class="text-center">Item_Price</th>
                                       <th class="text-center">Quantity</th>
                                       <th class="text-center">Total_Price</th>
                                       <!-- <th class="text-center">Grand_Total</th> -->
                                       <th class="text-center">Created_at</th>
                                       <th class="text-center">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody><?php $total_amount = 0; ?>
                                    @foreach($ordersitem as $orderitem)

                                    <tr>
                                       
                                       <td class="text-center">
                                          {{$orderitem->userName}}
                                       </td>
                                       <td class="text-center">
                                          {{$orderitem->userEmail}}
                                       </td>
                                       <td class="text-center">
                                          {{$orderitem->orderid}}
                                       </td>
                                       <td class="text-center">
                                          {{$orderitem->name}}
                                       </td>
                                       <td class="text-center">
                                          {{$orderitem->price}}
                                       </td>
                                       <td class="text-center">
                                          {{$orderitem->quantity}}
                                       </td>
                                       <td class="text-center">
                                          RS {{$orderitem->price*$orderitem->quantity}}   
                                       </td>
                                       <!-- <td class="text-center">
                                          <?php 
                                            $deliverycharges = 150;
                                            $total_amount = $total_amount + ($orderitem->price*$orderitem->quantity) + $deliverycharges; 
                                          ?>
                                         RS  {{$total_amount}}   
                                       </td> -->
                                       <td class="text-center">
                                          {{$orderitem->created_at}}   
                                       </td>
                                       <td class="text-center">
                                          <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="{{'#edit'.$orderitem->id}}"><i class="fa fa-pencil"></i></button>
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{'#delete'.$orderitem->id}}"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                      
<!-- edit Modal -->
 <div class="modal fade" id="{{'edit'.$orderitem->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                 
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3><i class="fa fa-user m-r-5"></i> Update Order Item</h3>
      </div>
    <div class="modal-body">
         <div class="row">
      \               <div class="col-md-12">
                                 <form enctype="multipart/form-data"  action="{{ route('orderitem.update',$orderitem->id) }}" method="POST" class="form-horizontal">{{ csrf_field() }}
                                    @method('PUT')
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">User Name:</label>
                                          <input type="text" placeholder="User Name" name="userName" value="{{$orderitem->userName}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">User Email:</label>
                                          <input type="text" placeholder="User Email" name="userEmail" value="{{$orderitem->userEmail}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Order_ID:</label>
                                          <input type="text" placeholder="Order_ID" name="orderid" value="{{$orderitem->orderid}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">name:</label>
                                          <input type="text" placeholder="Country Name" name="name" value="{{$orderitem->name}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">price:</label>
                                          <input type="text" placeholder="City Name" name="price" value="{{$orderitem->price}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Quantity:</label>
                                          <input type="text" placeholder="Zip Code" name="quantity" value="{{$orderitem->quantity}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Total Price:</label>
                                          <input type="text" placeholder="User Name" name="totalPrice" value="{{$orderitem->totalPrice}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Grand Total:</label>
                                          <input type="text" placeholder="Payment Method" name="grandTotal" value="{{$orderitem->grandTotal}}" class="form-control">
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
 <div class="modal fade" id="{{'delete'.$orderitem->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete Category</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form action="{{ route('orderitem.destroy',$orderitem->id) }}" method="POST"  class="form-horizontal">{{ csrf_field() }}
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