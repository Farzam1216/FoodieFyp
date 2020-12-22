@extends('admin.layouts.master')
@section('content')
            <!-- ALL Contents Come Here -->
         <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Poducts</h1>
               </div>
            </section>  <div class="header-title">
                   @if (session('status'))
                     <div class="alert alert-success" role="alert">
                     {{ session('status')}}
                   </div>
                   @endif
                  
               </div>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="product">
                                 <h4>Add Products</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="product"> <i class="fa fa-plus"></i> Add Product
                                 </a>  
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <!-- <th>Photo</th> -->
                                       <th class="text-center">Image</th>
                                       <th class="text-center">Name</th>
                                       <th class="text-center">Description</th>
                                       <th class="text-center">Price</th>
                                       <th class="text-center">Quantity</th>
                                       <th class="text-center">Units</th>
                                       <th class="text-center">Category_ID</th>
                                       <!-- <th>Category Name</th> -->
                                       <th class="text-center">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($product as $products)
                                    <tr>
                                    <td class="text-center">
                                           <img src="{{asset('/Uploadimages/Products/'.$products->image)}}" alt="" style="width:100px;">
                                          
                                       </td>                                       
                                       <td class="text-center">{{$products->name}}</td>
                                       <td class="text-center">{{$products->description}}</td>                                     
                                       <td class="text-center">PKR {{$products->price}}</td>
                                       <td class="text-center">{{$products->quantity}}</td>
                                       <td class="text-center">{{$products->units}}</td>
                                       <!--  -->
                                       <td class="text-center">{{$products->foreignproductid}}</td>
                                       <td class="text-center">
                                          <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="{{'#edit'.$products->id}}"><i class="fa fa-pencil"></i></button>
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{'#delete'.$products->id}}"><i class="fa fa-trash-o"></i> </button>
                                       </td>
<!-- edit Modal -->
 <div class="modal fade" id="{{'edit'.$products->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                 
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3><i class="fa fa-user m-r-5"></i> Update Product</h3>
      </div>
    <div class="modal-body">
         <div class="row">
      \               <div class="col-md-12">
                                 <form action="{{ route('product.update',$products->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">{{ csrf_field() }}
                                    @method('PUT')
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Product Name:</label>
                                          <input type="text" placeholder="Customer Name" name="name" value="{{$products->name}}" class="form-control">
                                       </div>
                                        <div class="col-md-4 form-group">
                                          <label class="control-label">Description:</label>
                                          <input type="textarea" placeholder="Customer Name" name="description" value="{{$products->description}}" class="form-control">
                                       </div>
                                        <div class="col-md-4 form-group">
                                          <label class="control-label">Price:</label>
                                          <input type="text" placeholder="Products Price" name="price" value="{{$products->price}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Quantity:</label>
                                          <input type="text" placeholder="Customer Name" name="quantity" value="{{$products->quantity}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Units:</label>
                                         <select class="form-control" name="units" required>
                                               <option value="Per_KG"  {{ $products->units == 'Per_KG '? 'selected' : '' }}>Per Kilogram</option>
                                               <option value="Half_KG"  {{ $products->units == 'Half_KG' ? 'selected' : '' }}>Half Kilogram</option>
                                               <option value="Per_Plate"  {{ $products->units == 'Per_Plate' ? 'selected' : '' }}>Per Plate</option>
                                               <option value="Half_Plate"  {{ $products->units == 'Half_Plate' ? 'selected' : '' }}>Half Plate</option>
                                               <option value="Per_Glass"  {{ $products->units == 'Per_Glass' ? 'selected' : '' }}>Per Glass</option>
                                               <option value="Per_Piece"  {{ $products->units == 'Per_Piece '? 'selected' : '' }}>Per Piece</option>
                                           </select>
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Category Name:</label>
                                         <select class="form-control" name="foregin">
                                           @foreach($categories as $category)
                                               <option value="{{ $category->id}}"  {{ $category->id == $products->foreignproductid ? 'selected' : '' }}>{{ $category->name }}</option>
                                           @endforeach
                                           </select>
                                       </div>
                                       <div class="col-md-6  form-group">
                                          <label class="control-label">Image </label>
                                          <input type="file" value="{{$products->image}}" class="form-control" name="image"  > 
                                           <input type="hidden" required="" name="current_image" value="{{$products->image}}"> 
                                           <img style="width:100px;margin-top:10px;" src="{{asset('/Uploadimages/Products/'.$products->image)}}">
                                       </div>
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
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
 <div class="modal fade" id="{{'delete'.$products->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete Product</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form action="{{ route('product.destroy',$products->id) }}" method="POST"  class="form-horizontal">{{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete Product</label>
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">NO</button>
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
            </section>
            <!-- /.content -->
            


 @endsection
         <!-- /.content-wrapper -->