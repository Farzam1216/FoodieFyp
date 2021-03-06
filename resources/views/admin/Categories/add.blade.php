<!-- Content Header (Page header) -->
@extends('admin.layouts.master')
@section('content')
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Category</h1>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="category"> 
                              <i class="fa fa-list"></i>  Category List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form action="{{ action('App\Http\Controllers\CategoryController@store') }}" class="col-sm-6" enctype="multipart/form-data" method="POST">{{ csrf_field() }}
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Name" name="name"  required>
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                                
                              </div>
                              <div class="form-group">
                                 <label>Image </label>
                                 <input type="file" class="form-control" name="image"  required>
                                
                              </div>
                              <div class="form-check">
                                 <label>Status</label><br>
                                 <label class="radio-inline">
                                 <input type="radio" name="status" value="1" checked="checked">Active</label>
                                 <label class="radio-inline"><input type="radio" name="status" value="0" >Inactive</label>
                              </div>
                              <!-- <div class="form-group">
                                 <label>Picture upload</label>
                                 <input type="file" name="picture">
                                 <input type="hidden" name="old_picture">
                              </div> -->
                              <div class="reset-button">
                                 <input type="reset" name="" class="btn btn-warning"  value="Reset">
                                 <input type="submit" name=""  value="Save" class="btn btn-success" value="Reset">
                                 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
 @endsection           