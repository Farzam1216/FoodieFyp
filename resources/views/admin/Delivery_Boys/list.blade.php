@extends('admin.layouts.master')
@section('content') 
     <!-- ALL Contents Come Here -->
         <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Delivery Boys List</h1>
                  
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
                                       <th>User_ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Role</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($user as $user)
                                    <tr>
                                       <td>
                                          {{$user->id}}
                                       </td>
                                       <td>
                                          {{$user->name}}
                                       </td>
                                       <td>
                                          {{$user->email}}
                                       </td>
                                       <td>
                                          {{$user->role}}
                                       </td>
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