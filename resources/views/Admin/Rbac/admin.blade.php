@extends('Admin.index')
@section('title','Create Admin')
@section('breadcrumbs','Create Admin')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;ADD CREATE ADMIN </h2> <!-- Tab Heading  -->
    <p title="Transport Details">  ADD Create Admin Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->

                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                           @permission('INSERT')
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Admin</a>
                                            </li> 
                                            @endpermission
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-table" aria-hidden="true"></i> Admin List</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ADD ADMIN FROM</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                      {{Form::open(['url'=>"/register",'method'=>'post'])}}
                          <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('name','Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('name','',['class'=>'form-control','title'=>'name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('name')}}</div>
                                </div>
                                 <div class="form-group">password-confirm
                                {{Form::label('email','Email',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('email','',['class'=>'form-control','title'=>'email'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('email')}}</div>
                                </div>
                                   
                                 <div class="form-group">
                                {{Form::label('password','Password',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('password','',['class'=>'form-control','title'=>'password'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('password')}}</div>
                                </div>
                                 <div class="form-group">
                                {{Form::label('password-confirm','Confirm Password',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('password-confirm','',['class'=>'form-control','title'=>'password'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('password-confirm')}}</div>
                                </div>
                               
                                 <div style="color: red;">{{$errors->first('description')}}</div>
                                <div class="form-group">
                                    <div class="input-group">
                                      @permission('INSERT')
                                       {{Form::submit('Save',['class'=>'btn btn-success'])}}
                                      @endpermission
                                    </div>
                                </div>
                            </div>
                    </div>  
                    {{Form::close()}}                     
            </div>
            </div>
</div>
</div>
          <!--   end first tab -->
            <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-th-list" aria-hidden="true"></i> VACANCIES DETAILS LIST</h4>
                                </div>
                                 <div class="card-body">
                                              <div class="col-md-12">
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Department Name</th>
                                                        <th>Position Name</th>
                                                        <th>Job Title</th>
                                                        <th>Number Of Vacation</th>
                                                        <th>Details</th>
                                                        <th>Last Date Of Application</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                               
                                                      <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                          <td>
                                                         
                                                           <span style="color: green"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;</span>
                                                            
                                                           <span style="color: red"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;</span>
                                                        
                                                        </td>
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                           

                                                         
                                                          </div>
                                                          </td>
                                                      </tr>
                                                    
                                                    </tbody>
                                                  </table>
                                                </div>
                                              <!-- table-end -->
                                            </div>
                                </div>
                                </div>
                            </div>
                        
         
    </div>


                       
@stop