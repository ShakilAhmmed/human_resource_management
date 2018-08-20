@extends('Admin.index')
@section('title','Admin')
@section('breadcrumbs','Admin')
@section('main_content')


     <div class="col-lg-12">
     <div style="    margin-left: 67px;     margin-top: 34px;" >
      <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;ADD Admin</h2> <!-- Tab Heading  -->
         <p title="Transport Details">  ADD Admin DETAILS</p> <!-- Transport Details -->
     </div>
     <hr>

@if(session('success'))
   <div class="alert alert-success alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Success!</strong> {{session('success')}}
</div>
 @endif
<div>
         <div class="panel-body text-left">
           <ul class='dropdown_test'>

         <li><a href='/admin'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
         <li><a href='/company'><i class="ti-pencil-alt2" aria-hidden="true"></i>Company</a></li>&nbsp;
         <li><a href='/desk'><i class="ti-pencil-alt2" aria-hidden="true"></i>Desk</a></li>&nbsp;
         <li><a href='/medicine'><i class="ti-pencil-alt2" aria-hidden="true"></i>Medcine</a></li>&nbsp;
         <div style="float: right;">
         <li><a href='/catagory_pdf' target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></li>&nbsp;
         <li><a href='/'><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;</a></li>&nbsp;
         <li><a href='/'><i class="fa fa-print" aria-hidden="true"></i></a></li>&nbsp;
         <li><a href='/'><i class="fa fa-street-view" aria-hidden="true"></i></a></li>&nbsp;
         </div>
      </ul>
         </div>
  </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Admin</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a style="background: #6c5ce7;color: white;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Admin LIST</a>
                                            </li>
                                            <li class="nav-item">
                                                <a style="background: #0984e3;color: white;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">NEW Admin</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                       <div class="col-md-12">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Sl No</th>
                                      <th>Admin Name</th>
                                      <th>Admin Email</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <tr>
                                    @foreach($data as $key=>$admin_data_value)

                                      <td>{{$key+1}}</td>
                                      <td>{{$admin_data_value->admin_name}}</td>
                                      <td>{{$admin_data_value->admin_email}}</td>
                                      <td>
                                      @if($admin_data_value->status=='Active')
                                      <span style="color: green;">
                                      <i class="fa fa-circle"></i>&nbsp;{{$admin_data_value->status}}
                                      </span>
                                      @else
                                       <span style="color: red;">
                                       <i class="fa fa-circle"></i>&nbsp;{{$admin_data_value->status}}
                                       @endif
                                       </td>
                                      <td style="display: inline-flex;">
                                      {{Form::open(['url'=>"/admin/$admin_data_value->id",'method'=>'DELETE'])}}
                                        {{Form::submit('DELETE',['class'=>'btn btn-danger','onclick'=>'checkdelete()'])}}
                                      {{Form::close()}}

                                     {{Form::open(['url'=>"/admin/$admin_data_value->id/edit ",'method'=>'GET'])}}
                                        {{Form::submit('EDIT',['class'=>'btn btn-primary'])}}
                                      {{Form::close()}}

                                      @if($admin_data_value->status=='Active')
                                      {{Form::open(['url'=>"/admin/$admin_data_value->id" ,'method'=>'GET'])}}
                                      {{Form::submit('Inactive',['class'=>'btn btn-warning'])}}
                                      {{Form::close()}}
                                      @else
                                      {{Form::open(['url'=>"/admin/$admin_data_value->id" ,'method'=>'GET'])}}
                                      {{Form::submit('Active',['class'=>'btn btn-success'])}}
                                     {{Form::close()}}
                                      @endif  
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                              
            </div>
          <!--   end first tab -->
            <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                               {{Form::open(['url'=>"/admin"])}}
                          <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('Admin Name','Admin Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('admin_name','',['class'=>'form-control','title'=>'admin_name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('admin_name')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('Admin Email','Admin Email ',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::email('admin_email','',['class'=>'form-control','title'=>'admin_email'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('admin_email')}}</div>
                                </div>

                              <div class="control-group">
                                 {{Form::label('password','Password',['class'=>'control-label','title'=>'password'])}}           
                                 <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::password('password', ['onkeyup'=>'password_len_check()','id'=>'password','title'=>'password','style'=>"width:1475px"])}}
                                   </div>
                                   <div hidden="hidden"> 
                                {{Form::text('remember_token',csrf_token(),['id'=>'required','placeholder'=>'Student Name','title'=>'Token','class'=>'form-control'])}}
                                 </div>                                
                                  </br>
                                   <span id="help_block"></span>
                               </div>

                               <div class="control-group">
                                 {{Form::label('confirm_password','Confirm Password',['class'=>'control-label','title'=>'confirm_password'])}}
                                     <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    {{Form::password('confirm_password', ['onkeyup'=>'Password_match()','id'=>'password_confirm','name'=>'password_confirmation','title'=>'confirm_password','style'=>"width:1475px"])}}
                                  </div>
                                  </br>
                                   <span id="password_match"></span>
                              </div>
                               
                                <div class="form-group">
                                {{Form::label('status','Status',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'status'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('status')}}</div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                       {{Form::submit('Save',['class'=>'btn btn-success'])}}
                                    </div>
                                </div>
                            </div>
                    </div>  
                    {{Form::close()}}  
             
                            <!-- table-end -->
                          </div>
                          <!-- end second tab -->
                      </div>
              </div>
          </div>
      </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/admin.js')}}"></script>
@endpush
@stop