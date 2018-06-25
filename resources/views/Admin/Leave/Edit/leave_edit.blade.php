@extends('Admin.index')
@section('title','Leave')
@section('breadcrumbs','Leave Edit')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;EDIT LEAVE</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Edit Leave Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                            <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-check-square" aria-hidden="true"></i> LEAVE DATA EDIT</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                       
                                    <!-- tab end -->
                     
                                             <div class="col-xs-12 col-sm-12">
                       {{Form::open(['url'=>"/leave/$edit_data->id" ,'method'=>'put'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Employee Code','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('employee_code',$edit_data->employee_code,['class'=>'form-control','title'=>'employee_code','id'=>'employee_code','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('employee_code')}}</div>
                                <div class="form-group">
                                    {{Form::label('Employee Name','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::text('employee_name',$edit_data->employee_name,['class'=>'form-control','title'=>'employee_name','id'=>'employee_name','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('employee_name')}}</div>
                                   <div class="form-group">
                                    {{Form::label('Phone Number','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::text('phone_number',$edit_data->phone_number,['class'=>'form-control','title'=>'phone_number','id'=>'phone_number','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('phone_number')}}</div>
                                   <div class="form-group">
                                    {{Form::label('Address','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('address',$edit_data->address,['class'=>'form-control','title'=>'address','id'=>'address','col'=>'15','rows'=>'2','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('phone_number')}}</div>
                                  <div class="form-group">
                                    {{Form::label('Leave Type','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                    @php
                                     $leave_array=[$edit_data->leave_type=>$edit_data->leave_type];
                                    @endphp
                                    @foreach($leave_type as $leave_fetch_data)
                                    @php
                                    $leave_array[$leave_fetch_data->leave_type_name]=$leave_fetch_data->leave_type_name;
                                    @endphp
                                    @endforeach
                                       {{Form::select('leave_type',$leave_array,null,['class'=>'form-control','title'=>'leave_type'])}}
                                    </div>
                                </div>

                                 <div style="color: red;">{{$errors->first('all_information')}}</div>
                                 <div class="form-group">                                    
                                {{Form::label('From Date','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::date('from_date',$edit_data->from_date,['class'=>'form-control','title'=>'from_date','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('from_date')}}</div>
                                 <div class="form-group">                                    
                                {{Form::label('To Date','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::date('to_date',$edit_data->to_date,['class'=>'form-control','title'=>'to_date','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('to_date')}}</div>
                                <div class="form-group">
                                    {{Form::label('Reason','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('reason',$edit_data->reason,['class'=>'form-control','col'=>'15','rows'=>'3','title'=>'reason','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('reason')}}</div>
                                <div class="form-group">
                                {{Form::label('Status','',['class'=>'control-label'])}}
                                 <div class="input-group">
                                 @if($edit_data->status=='Pending')
                                 <div class="radio-inline">{{Form::radio('status','Pending',['checked'=>'checked'])}}{{Form::label('status','Pending')}}</div> &nbsp;
                                   <div class="radio-inline">{{Form::radio('status','Approve')}}{{Form::label('status','Approve')}}</div>
                                 @elseif($edit_data->status=='Approve')
                                 
                               <div class="radio-inline">{{Form::radio('status','Pending')}}{{Form::label('status','Pending')}}</div> &nbsp;
                                <div class="radio-inline">{{Form::radio('status','Approve',['checked'=>'checked'])}}{{Form::label('status','Approve')}}</div>
                              @endif
                               </div>
                              
                               </div>
                                </div>

                                 <div class="input-group input-icon right">
                                 {{Form::submit('Save',['class'=>'btn btn-success submit','style'=>'margin-bottom: 55px;margin-left: 101px;'])}}
                                </div>
                                  {{Form::close()}}          
                            </div>
                    </div>                     
            </div>
            </div>

          <!--   end first tab -->
          @stop