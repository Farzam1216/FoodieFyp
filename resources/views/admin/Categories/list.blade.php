@extends('admin.layouts.master')
@section('content') 
     <!-- ALL Contents Come Here -->
         <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Categories List</h1>
                  
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
                              <a href="addCategories">
                                 <h4>Add Category</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="addCategories"> <i class="fa fa-plus"></i> Add Category
                                 </a>  
                              </div>
   
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <!-- <th>Photo</th> -->
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Description</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($categories as $category)
                                    <tr>
                                       <td>
                                          {{$category->id}}
                                       </td>
                                       <td>
                                          {{$category->name}}
                                       </td>
                                       <td>
                                          {{$category->description}}
                                       </td>
                                       <td>
                                          <span class="label-custom label label-default"> 
                                          {{$category->status}}   
                                          </span>
                                       </td>
                                       <td>
                                          <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="{{'#edit'.$category->id}}"><i class="fa fa-pencil"></i></button>
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{'#delete'.$category->id}}"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                      
<!-- edit Modal -->
 <div class="modal fade" id="{{'edit'.$category->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                 
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3><i class="fa fa-user m-r-5"></i> Update Category</h3>
      </div>
    <div class="modal-body">
         <div class="row">
      \               <div class="col-md-12">
                                 <form action="{{ route('category.update',$category->id) }}" method="POST" class="form-horizontal">{{ csrf_field() }}
                                    @method('PUT')
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Category Name:</label>
                                          <input type="text" placeholder="Customer Name" name="name" value="{{$category->name}}" class="form-control">
                                       </div>
                                        <div class="col-md-4 form-group">
                                          <label class="control-label">Description:</label>
                                          <input type="textarea" placeholder="Customer Name" name="description" value="{{$category->description}}" class="form-control">
                                       </div>
                                        <div class="col-md-4 form-group">
                                          <label class="control-label">Status:</label>
                                          <input type="text" name="status" placeholder="Customer Name" value="{{$category->status}}" class="form-control">
                                       </div>
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">Cancel</button>
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
 <div class="modal fade" id="{{'delete'.$category->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete Category</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form action="{{ route('category.destroy',$category->id) }}" method="POST"  class="form-horizontal">{{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete Category</label>
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
               <!-- Edit Modal -->
               <!-- customer Modal1 -->
               
               <!-- /.modal -->
               <!-- Modal -->    
               <!-- Customer Modal2 -->
              
               <!-- /.modal -->
            </section>
            <!-- /.content -->
            

@endsection