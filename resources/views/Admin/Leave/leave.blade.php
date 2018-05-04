@extends('Admin.index')
@section('title','Leave ')
@section('breadcrumbs','Leave ')
@section('main_content')


@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 331px; margin-left: 682px">
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
                      {{Form::open(['url'=>"/leave_type" ,'method'=>'post'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Employee Id','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('employee_id','',['class'=>'form-control','title'=>'employee_id','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('employee_id')}}</div>
                                <div class="form-group">
                                    {{Form::label('All information','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('all_information','',['class'=>'form-control','col'=>'20','rows'=>'4','title'=>'all_information','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('all_information')}}</div>
                                  <div class="form-group">
                                    {{Form::label('Leave Type','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                       {{Form::select('leace_type',['class'=>'form-control','title'=>'leave_type'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('all_information')}}</div>
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
                               <div class="radio-inline">{{Form::radio('status','Pending')}}{{Form::label('status','Pending')}}</div> &nbsp;
                                <div class="radio-inline">{{Form::radio('status','Approve')}}{{Form::label('status','Approve')}}</div>
                               </div>
                               <div class="radio-inline">{{Form::radio('status','Declined')}}{{Form::label('status','Declined')}}</div>
                               </div>
                                </div>

                                 <div class="input-group input-icon right">
                                 {{Form::submit('Save',['class'=>'btn btn-success submit','style'=>'margin-bottom: 55px;margin-left: 101px;'])}}
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
                                                        <th>Si</th>
                                                        <th>Leave Type Name</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                   
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