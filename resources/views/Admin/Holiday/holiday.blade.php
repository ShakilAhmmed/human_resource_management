@extends('Admin.index')
@section('title','Holiday')
@section('breadcrumbs','Holiday')
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
                                    <h4>Holiday</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ADD Holiday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Holiday LIST</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                             <div class="col-xs-12 col-sm-12">
                      {{Form::open(['url'=>"/holiday" ,'method'=>'post'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Occassion','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('occassion','',['class'=>'form-control','title'=>'occassion','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('occassion')}}</div>
                                <div class="form-group">
                                    {{Form::label('description','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('description','',['class'=>'form-control','col'=>'20','rows'=>'4','title'=>'description'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('description')}}</div>
                                  <div class="form-group">                                    
                                {{Form::label('Date','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::date('date','',['class'=>'form-control','title'=>'date','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('date')}}</div>
                                <div class="form-group">
                                {{Form::label('Status','',['class'=>'control-label'])}}
                                 <div class="input-group">
                               <div class="radio-inline">{{Form::radio('status','Active')}}{{Form::label('status','Active')}}</div> &nbsp;
                                <div class="radio-inline">{{Form::radio('status','Inactive')}}{{Form::label('status','Inactive')}}</div>
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
                                                        <th>Occassion</th>
                                                        <th>Description</th>
                                                        <th>Date</th>
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