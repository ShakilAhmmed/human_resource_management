@extends('Admin.index')
@section('title','Department')
@section('breadcrumbs','Department')
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
                                    <h4>DEPARTMENT</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">DEPARTMENT Edit</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                             <div class="col-xs-12 col-sm-12">
                      {{Form::open(['url'=>"/department/$edit_data->id" ,'method'=>'put'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Department Name','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('department_name',$edit_data->department_name,['title'=>'department_name'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('department_name')}}</div>
                                <div class="form-group">
                                    {{Form::label('description','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('description',$edit_data->description,['col'=>'20','rows'=>'4','title'=>'description'])}}
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