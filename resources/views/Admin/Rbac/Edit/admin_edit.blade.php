@extends('Admin.index')
@section('title','Admin Edit')
@section('breadcrumbs','Admin Edit')
@section('main_content')

  <div class="col-lg-12">
     <hr>
@if(session('success'))
   <div class="alert alert-success alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Success!</strong> {{session('success')}}
</div>
 @endif
                          
                               
                                     <!-- tab -->
                                       
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>    ADmin Edit FROM</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                              {{Form::open(['url'=>"/admin/$edit_data->id",'files'=>true,'method'=>'put'])}}

                            <div class="card-body card-block">
                               
                                <div class="form-group">
                                     {{Form::label('admin_name','Admin Name',['class'=>'control-label','title'=>'admin_name'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                      
                                        {{Form::text('admin_name',$edit_data->admin_name,['id'=>'required','placeholder'=>'Admin Name','title'=>'admin_name','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text" style="color: red;">{{$errors->first('admin_name')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('admin_email','Admin Email',['class'=>'control-label','title'=>'admin_email'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::email('admin_email',$edit_data->admin_email,['id'=>'required','placeholder'=>'Admin Email','title'=>'admin_email','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('admin_email')}}</small>
                                </div>
                              <div class="control-group">
                                 {{Form::label('password','Password',['class'=>'control-label','title'=>'password'])}}           
                                 <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::password('password', ['onkeyup'=>'password_len_check()','id'=>'password','title'=>'password','style'=>"width:1477px"])}}
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
                                    {{Form::password('confirm_password', ['onkeyup'=>'Password_match()','id'=>'password_confirm','name'=>'password_confirmation','title'=>'confirm_password','style'=>"width:1477px"])}}
                                  </div>
                                  </br>
                                   <span id="password_match"></span>
                              </div>

                              <div class="form-group">
                                {{Form::label('Status','',['class'=>'control-label'])}}
                               <div class="input-group">
                               <div class="radio-inline">
                               @if($edit_data->status=='Active')
                               {{Form::radio('status','Active','null',['checked'=>'checked'])}}{{Form::label('status','Active')}}</div> &nbsp;
                                <div class="radio-inline">{{Form::radio('status','Inactive')}}{{Form::label('status','Inactive')}}</div>
                               </div>
                               @else
                               {{Form::radio('status','Inactive','null',['checked'=>'checked'])}}{{Form::label('status','Inactive')}}</div> &nbsp;
                                <div class="radio-inline">{{Form::radio('status','Active')}}{{Form::label('status','Active')}}</div>
                               </div>
                                </div>
                                @endif
                                
                                   <div class="input-group input-icon right">
                                 {{Form::submit('Save',['class'=>'btn btn-success submit','style'=>'margin-bottom: 55px;margin-left: 101px;'])}}
                                </div>
                            </div>
                    </div> 
                    {{Form::close()}}                    
            </div>
            </div>
            </div>
          <!--   end first tab -->
                              </div>
                            </div>
            
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/admin_edit.js')}}"></script>
@endpush           
@stop