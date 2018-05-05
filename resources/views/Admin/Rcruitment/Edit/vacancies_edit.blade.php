@extends('Admin.index')
@section('title','Vacancies')
@section('breadcrumbs','Vacancies Edit')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;EDIT VACANCIES</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Edit Vacancies Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                            <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-check-square" aria-hidden="true"></i> VACANCIES DATA EDIT</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                       
                                    <!-- tab end -->
                     
                                             <div class="col-xs-12 col-sm-12">
                       {{Form::open(['url'=>"/vacancies/$edit_data->id" ,'method'=>'put'])}}

                            <div class="card-body card-block">
                                <div class="form-group">
                                     {{Form::label('department_name','Department Name',['class'=>'control-label','title'=>'department_name'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                         @php 
                                           $department_array=[$edit_data->department_name=>$edit_data->department_nam];
                                         @endphp
                                         @foreach($department_data as $department_fetch_data)
                                           @php 
                                              $department_array[$department_fetch_data->department_name]=$department_fetch_data->department_name;
                                           @endphp
                                         @endforeach
                                        {{Form::select('department_name',$department_array,null,['id'=>'required','title'=>'department_name','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text" style="color: red;">{{$errors->first('department_name')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('position_name','Position Name',['class'=>'control-label','title'=>'position_name'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::text('position_name',$edit_data->position_name,['id'=>'required','placeholder'=>'Position Name','title'=>'position_name','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('position_name')}}</small>
                                </div>
                                <div class="form-group">
                                {{Form::label('job_title','Job Title',['class'=>'control-label','title'=>'job_title'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                          {{Form::text('job_title',$edit_data->job_title,['id'=>'required','placeholder'=>'Job Title','title'=>'job_title','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('job_title')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('number_of_vacation','Number Of Vacation',['class'=>'control-label','title'=>'number_of_vacation'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::number('number_of_vacation',$edit_data->number_of_vacation,['id'=>'required','placeholder'=>'Number Of Vacation','title'=>'number_of_vacation','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text text-muted" style="color: red;">{{$errors->first('number_of_vacation')}}</small>
                                </div>
                                <div class="form-group">
                                          {{Form::label('details','Details',['class'=>'control-label','title'=>'details'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-info" aria-hidden="true"></i></div>
                                           {{Form::textarea('details',$edit_data->details,['id'=>'required','placeholder'=>'Details','title'=>'details','class'=>'form-control','col'=>'10','rows'=>'2'])}}
                                    </div>
                                      <small class="form-text" style="color: red;">{{$errors->first('details')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('last_date_of','Last Date Of Application',['class'=>'control-label','title'=>'last_date_of'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                       {{Form::date('last_date_of',$edit_data->last_date_of,['id'=>'required','placeholder'=>'Details','title'=>'last_date_of','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('last_date_of')}}</small>
                                </div>
                                 <div class="form-group">
                                   {{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
                                   @if($edit_data->status=='Open')
                                    <div class="input-group">
                                    <div class="radio-inline">{{Form::radio('status','Open',['checked'=>'checked'])}}{{Form::label('status','Open')}}</div> &nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Close')}}{{Form::label('status','Close')}}</div>
                                    </div>
                               @else
                                    <div class="input-group">
                                    <div class="radio-inline">{{Form::radio('status','Open')}}{{Form::label('status','Open')}}</div> &nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Close',['checked'=>'checked'])}}{{Form::label('status','Close')}}</div>
                                    </div>
                               @endif
                                 <small class="form-text" style="color: red;">{{$errors->first('status')}}</small>
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
            </div>

          <!--   end first tab -->
          @stop