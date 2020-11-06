<!-- Content Header (Page header) -->
@extends('admin.layouts.master')
@section('content')
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Resturants</h1>
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
                              <a class="btn btn-add " href="resturant"> 
                              <i class="fa fa-list"></i>  Resturants List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form action="{{ action('App\Http\Controllers\ResturantController@store') }}" class="col-sm-6" method="POST">{{ csrf_field() }}
                              <div class="form-group">
                                 <label>Resturants Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Name" name="name"  required>
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                                
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
                                 <button class="btn btn-success">Save</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
 @endsection           