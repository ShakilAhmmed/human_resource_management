@extends('Admin.index')
@section('title','Leave ')
@section('breadcrumbs','Leave ')
@section('main_content')


@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   

     <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Leave </h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ADD Leave </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Leave  LIST</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                             <div class="col-xs-12 col-sm-12">
                      {{Form::open(['url'=>"/leave" ,'method'=>'post'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Employee Code','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('employee_code','',['class'=>'form-control employee_code','title'=>'employee_code','required'=>'required'])}}
                                    </div>
                                  <div style="color: red;">{{$errors->first('employee_id')}}</div>
                                </div>

                                <div class="form-group">
                                    {{Form::label('Employee Name','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        {{Form::text('employee_name','',['class'=>'form-control employee_name','title'=>'employee_name','readonly'=>'readonly'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('employee_name')}}</div>
                                </div>


                                <div class="form-group">
                                    {{Form::label('Employee Phone','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        {{Form::text('employee_phone','',['class'=>'form-control employee_phone','title'=>'employee_phone','readonly'=>'readonly'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('employee_phone')}}</div>
                                </div>


                                  <div class="form-group">
                                    {{Form::label('Leave Type','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        @php  $leave_type_array=['--select--'=>'--select--'] @endphp
                                        @foreach($leave as $leave_data)
                                          @php
                                            $leave_type_array[$leave_data->leave_type_name]=$leave_data->leave_type_name;
                                          @endphp
                                        @endforeach


                                       {{Form::select('leave_type',$leave_type_array,null,['class'=>'form-control','title'=>'leave_type'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('leave_type')}}</div>
                                 <div class="form-group">                                    
                                {{Form::label('From Date','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::date('from_date','',['class'=>'form-control','title'=>'from_date','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('from_date')}}</div>
                                 <div class="form-group">                                    
                                {{Form::label('To Date','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::date('to_date','',['class'=>'form-control','title'=>'to_date','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('to_date')}}</div>
                                <div class="form-group">
                                    {{Form::label('Reason','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('reason','',['class'=>'form-control','col'=>'20','rows'=>'4','title'=>'reason','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('reason')}}</div>
                                <div class="form-group">
                                {{Form::label('Status','',['class'=>'control-label'])}}
                                 <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                     {{Form::select('status',['Active'=>'Active','Pending'=>'Pending'],null,['class'=>'form-control','title'=>'leave_type'])}}
                                 </div>
                                </div>

                                 <div class="input-group input-icon right">
                                 {{Form::submit('Save',['class'=>'btn btn-success submit'])}}
                                </div>
                                  {{Form::close()}}
                            </div>
                    </div>                     
            </div>
          <!--   end first tab -->
            <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                              <div class="col-md-12">
                                                  <table  class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                          <th>SL No</th>
                                                          <th>Employee Code</th>
                                                          <th>Leave Type</th>
                                                          <th>From Date</th>
                                                          <th>To Date</th>
                                                          <th>Status</th>
                                                          <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                @foreach($data as $key=>$leave_data_value)
                                                                <td>{{$key+1}}</td>
                                                                <td>{{$leave_data_value->employee_code}}</td>
                                                                <td>{{$leave_data_value->leave_type}}</td>
                                                                <td>{{date('d-M-Y',strtotime($leave_data_value->from_date))}}</td>
                                                                <td>{{date('d-M-Y',strtotime($leave_data_value->to_date))}}</td>
                                                                <td>sss</td>
                                                                <td>ssss</td>
                                                            </tr>
                                                    @endforeach
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@stop