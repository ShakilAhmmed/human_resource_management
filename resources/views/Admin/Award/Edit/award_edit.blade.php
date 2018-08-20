@extends('Admin.index')
@section('title','Award')
@section('breadcrumbs','Award')
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
                                    <h4>Award Edit</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Award Edit</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                             <div class="col-xs-12 col-sm-12">
                      {{Form::open(['url'=>"/award/$edit_data->award_id" ,'method'=>'put'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Award Name','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('award_name',$edit_data->award_name,['class'=>'form-control award_name','title'=>'award_name','required'=>'required'])}}
                                    </div>
                                </div>
                                
                                <div style="color: red;">{{$errors->first('award_name')}}</div>
                
                                  <div class="form-group">
                                    {{Form::label('Gift','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                       {{Form::text('gift',$edit_data->gift,['class'=>'form-control','title'=>'gift','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('gift')}}</div>
                                  <div class="form-group">
                                    {{Form::label('Amount','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                       {{Form::text('amount',$edit_data->amount,['class'=>'form-control','title'=>'amount','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('amount')}}</div>
                                         <div class="form-group">
                                    {{Form::label('employee','Employee',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        @php  $employee_data_array=[$edit_data->employee=>$edit_data->employee] @endphp
                                
                                        @foreach($employee_data as $employee_data_value)
                                            @php
                                                $employee_data_array[$employee_data_value->employee_personal_details_id]=$employee_data_value->name;
                                            @endphp
                                        @endforeach
                                        {{Form::select('employee',$employee_data_array,null,['class'=>'form-control','title'=>'designation_status'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('employee')}}</div>
                                </div>                     

                                 <div class="input-group input-icon right">
                                 {{Form::submit('Save',['class'=>'btn btn-success submit','style'=>'margin-bottom: 55px;margin-left: 101px;'])}}
                                </div>
                                  {{Form::close()}}
                            </div>
                    </div>                     
            </div>
          <!--   end first tab -->
          @stop 