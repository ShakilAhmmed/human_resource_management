@extends('Admin.index')
@section('title','Settings')
@section('breadcrumbs','Settings')
@section('main_content')
   
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;ADD SETTINGS</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Add Settings Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD SETTINGS</a>
                                            </li>
                                          
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>    ADD SETTINGS FROM</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                              {{Form::open(['url'=>"/settings/$settings_data->id",'files'=>true,'method'=>'put'])}}

                            <div class="card-body card-block">
                               
                                <div class="form-group">
                                     {{Form::label('syestem_name','Syestem Name',['class'=>'control-label','title'=>'syestem_name'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                      
                                        {{Form::text('syestem_name',$settings_data->syestem_name,['id'=>'required','placeholder'=>'Syestem Name','title'=>'syestem_name','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text" style="color: red;">{{$errors->first('department_name')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('syestem_title','System Title',['class'=>'control-label','title'=>'syestem_title'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::text('syestem_title',$settings_data->syestem_title,['id'=>'required','placeholder'=>'System Title','title'=>'syestem_title','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('syestem_title')}}</small>
                                </div>
                                <div class="form-group">
                                {{Form::label('address','Address',['class'=>'control-label','title'=>'address'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                          {{Form::text('address',$settings_data->address,['id'=>'required','placeholder'=>'Address','title'=>'address','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('address')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::number('phone',$settings_data->phone,['id'=>'required','placeholder'=>'Phone','title'=>'phone','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text text-muted" style="color: red;">{{$errors->first('phone')}}</small>
                                </div>
                                <div class="form-group">
                                          {{Form::label('system_email','System Email',['class'=>'control-label','title'=>'system_email'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-info" aria-hidden="true"></i></div>
                                           {{Form::email('system_email',$settings_data->system_email,['id'=>'required','placeholder'=>'System Email','title'=>'system_email','class'=>'form-control','col'=>'10','rows'=>'2'])}}
                                    </div>
                                      <small class="form-text" style="color: red;">{{$errors->first('system_email')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('language','Language',['class'=>'control-label','title'=>'language'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-cog" aria-hidden="true"></i></div>
                                       {{Form::text('language',$settings_data->language,['id'=>'required','placeholder'=>'Language','title'=>'language','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('language')}}</small>
                                </div>
                                 <div class="form-group">
                                    {{Form::label('purchase_code','Purchase Code',['class'=>'control-label','title'=>'purchase_code'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                       {{Form::text('purchase_code',$settings_data->purchase_code,['id'=>'required','placeholder'=>'Purchase Code','title'=>'purchase_code','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('purchase_code')}}</small>
                                </div>
                                 <div class="form-group">
                                    {{Form::label('logo','System Logo',['class'=>'control-label','title'=>'logo'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                     {{Form::file('logo')}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('logo')}}</small>
                                </div>
                               
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
            <!-- second-tab -->
            
                                </div>
                            </div>
                       
@stop