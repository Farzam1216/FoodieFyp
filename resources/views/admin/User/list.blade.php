@extends('admin.layouts.master')
@section('content') 
     <!-- ALL Contents Come Here -->
         <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>User List</h1>
                  
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

                           
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <!-- <th>Photo</th> -->
                                      <!--  <th class="text-center">ID</th> -->
                                       <th class="text-center">Name</th>
                                       <th class="text-center">Email</th>
                                       <th class="text-center">Mobile</th>
                                       <th class="text-center">Password</th>
                                       <th class="text-center">Role</th>
                                       <th class="text-center">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($user as $user)
                                    <tr>
                                       <!-- <td class="text-center">
                                          {{$user->id}}
                                       </td> -->
                                       <td class="text-center">
                                          {{$user->name}}
                                       </td>
                                       <td class="text-center">
                                          {{$user->email}}
                                       </td>
                                       <td class="text-center">
                                          {{$user->mobile}}
                                       </td>
                                       <td class="text-center">
                                          {{$user->password}}
                                       </td>
                                       <td class="text-center text-custom">
                                          <span class="label-custom label label-default">
                                          {{$user->role}}
                                          </span>
                                       </td>
                                       
                                       <td>
                                          <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="{{'#edit'.$user->id}}"><i class="fa fa-pencil"></i></button>
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{'#delete'.$user->id}}"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                      
<!-- edit Modal -->
 <div class="modal fade" id="{{'edit'.$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                 
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3><i class="fa fa-user m-r-5"></i> Update User</h3>
      </div>
    <div class="modal-body">
         <div class="row">
      \               <div class="col-md-12">
                                 <form action="{{ route('user.update',$user->id) }}" method="POST" class="form-horizontal">{{ csrf_field() }}
                                    @method('PUT')
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">User Name:</label>
                                          <input type="text" placeholder="User Name" name="username" value="{{$user->name}}" class="form-control">
                                       </div>
                                        <div class="col-md-4 form-group">
                                          <label class="control-label">Email:</label>
                                          <input type="email" placeholder="User Email" name="useremail" value="{{$user->email}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Mobile:</label>
                                          <input type="text" placeholder="Mobile" name="mobile" value="{{$user->mobile}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Password:</label>
                                          <input type="password" name="userpassword" placeholder=" Password" value="{{$user->password}}" class="form-control">
                                       </div>
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Role:</label>
                                          <input type="text" placeholder="User Role" name="userrole" value="{{$user->role}}" class="form-control">
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
 <div class="modal fade" id="{{'delete'.$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete User</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form action="{{ route('user.destroy',$user->id) }}" method="POST"  class="form-horizontal">{{ csrf_field() }}
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