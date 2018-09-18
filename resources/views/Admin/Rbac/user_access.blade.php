@extends('Admin.index')
@section('title','User Access')
@section('breadcrumbs','User Access')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Error !</strong> {{session('error')}}
  </div>
@endif    
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;ADD User Access</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Add User Access Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD User Access</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-table" aria-hidden="true"></i> User Access LIST</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Add User Access From</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                              {{Form::open(['url'=>"/user_access" ,'method'=>'post'])}}

                            <div class="card-body card-block">
                                <div class="form-group">
                                     {{Form::label('user_id','User Name',['class'=>'control-label','title'=>'user_id'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                         @php 
                                           $admins_array=[''=>'--select--'];
                                         @endphp
                                         @foreach($admins as $admins_data)
                                           @php 
                                              $admins_array[$admins_data->id]=$admins_data->email;
                                           @endphp
                                         @endforeach
                                        {{Form::select('user_id',$admins_array,null,['id'=>'required','title'=>'user_id','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text" style="color: red;">{{$errors->first('user_id')}}</small>
                                </div>
                                 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                         @php 
                                           $roles_array=[''=>'--select--'];
                                         @endphp
                                         @foreach($roles as $roles_data)
                                           @php 
                                              $roles_array[$roles_data->id]=$roles_data->display_name;
                                           @endphp
                                         @endforeach
                                        {{Form::select('role_id',$roles_array,null,['id'=>'required','title'=>'role_id','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text" style="color: red;">{{$errors->first('role_id')}}</small>
                                </div>
                     
                             
                                   <div class="input-group input-icon right">
                                 {{Form::submit('Save',['class'=>'btn btn-success submit','style'=>'margin-bottom: 55px;margin-left: 101px;'])}}
                                </div>
                            </div>
                    </div> 
                    {{Form::close()}}                    
            </div>
            </div>
           
          <!--   end first tab -->
            <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-th-list" aria-hidden="true"></i> User Access Details List</h4>
                                </div>
                                <div class="card-body">
                                              <div class="col-md-12">
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>User Name</th>
                                                        <th>Role Name</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                  </tr>
                                                    </tbody>
                                                  </table>
                                                </div>
                                              <!-- table-end -->
                                    </div>
                                            <!-- end second tab -->
                                        </div>
                                </div>
                                </div>
                            </div>
                       
@stop