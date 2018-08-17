@extends('Admin.index')
@section('title','Leave')
@section('breadcrumbs','Leave')
@section('main_content')


@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 331px; margin-left: 682px">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

     <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Leave Edit</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Leave Edit</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                             <div class="col-xs-12 col-sm-12">
                      {{Form::open(['url'=>"/leave/$edit_data->id" ,'method'=>'put'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Employee Code','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('employee_code',$edit_data->employee_code,['class'=>'form-control employee_code','title'=>'employee_code','required'=>'required'])}}
                                    </div>
                                </div>
                                
                                <div style="color: red;">{{$errors->first('employee_code')}}</div>
                                <div class="form-group">
                                    {{Form::label('Employee name','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        @php
                                         $employee_data=DB::table('employee_company_details')->where('employee_code',$edit_data->employee_code)->first();

                                         $employee_name=DB::table('employee_personal_details')->where('employee_personal_details_id',$employee_data->employee_personal_details_id)->first();                       



                                        @endphp
                                       {{Form::text('employee_name',$employee_name->name,['class'=>'form-control employee_name','title'=>'employee_name','required'=>'required','readonly'=>'readonly'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('employee_name')}}</div>
                                  <div class="form-group">
                                    {{Form::label('Employee Phone','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                       {{Form::text('employee_phone',$employee_name->phone,['class'=>'form-control employee_phone','title'=>'employee_phone','required'=>'required','readonly'=>'readonly'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('employee_phone')}}</div>
                                 <div class="form-group">
                                    {{Form::label('Leave Type','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       @php  $leave_type_array=[$edit_data->leave_type=>$edit_data->leave_type] @endphp
                                        @foreach($leave as $leave_data)
                                          @php
                                            $leave_type_array[$leave_data->leave_type_name]=$leave_data->leave_type_name;
                                          @endphp
                                        @endforeach


                                       {{Form::select('leave_type',$leave_type_array,null,['class'=>'form-control','title'=>'leave_type'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('employee_code')}}</div>
                                  <div class="form-group">
                                    {{Form::label('From Date','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                       {{Form::date('from_date',$edit_data->from_date,['class'=>'form-control','title'=>'from_date','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('employee_code')}}</div>
                                  <div class="form-group">
                                    {{Form::label('To Date','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                       {{Form::date('to_date',$edit_data->to_date,['class'=>'form-control','title'=>'to_date','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('employee_code')}}</div>
                                <div class="form-group">
                                    {{Form::label('Reason','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('reason',$edit_data->reason,['class'=>'form-control','col'=>'20','rows'=>'4','title'=>'reason','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('employee_code')}}</div>
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
                                  {{Form::close()}}
                            </div>
                    </div>                     
            </div>
          <!--   end first tab -->
          @stop