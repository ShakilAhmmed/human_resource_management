@extends('Admin.index')
@section('title','Leave Type')
@section('breadcrumbs','Leave Type')
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
                                    <h4>Leave Type</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Leave Type</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                             <div class="col-xs-12 col-sm-12">
                      {{Form::open(['url'=>"/leave_type/$edit_data->id" ,'method'=>'put'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Leave Type Name','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('leave_type_name',$edit_data->leave_type_name,['class'=>'form-control','title'=>'leave_type_name','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('leave_type_name')}}</div>
                                <div class="form-group">
                                    {{Form::label('description','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('description',$edit_data->description,['class'=>'form-control','col'=>'20','rows'=>'4','title'=>'description','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('description')}}</div>
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