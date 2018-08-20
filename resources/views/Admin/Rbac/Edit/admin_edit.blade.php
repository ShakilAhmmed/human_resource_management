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
                    <div class="tab-pane " id="profile" role="tabpanel" aria-labelledby="profile-tab">

                               {{Form::open(['url'=>"/admin/$edit_data->id"])}}
                          <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('Admin Name','Admin Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('admin_name',$edit_data->admin_name,['class'=>'form-control','title'=>'admin_name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('admin_name')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('Admin Email','Admin Email ',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::email('admin_email',$edit_data->admin_email,['class'=>'form-control','title'=>'admin_email'])}}
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
                                       {{Form::select('status',[$edit_data->status=>$edit_data->status,'Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'status'])}}
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
    <script type="text/javascript" src="{{asset('extra_js/admin_edit.js')}}"></script>
@endpush
@stop