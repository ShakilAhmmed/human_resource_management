@extends('Admin.index')
@section('title','Task')
@section('breadcrumbs','Task Edit')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;EDIT TASK</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Edit Task Details</p> <!-- Transport Details -->

     </div>
     <div>
         <div class="panel-body text-left">
           <ul class='dropdown_test'>

         <li><a href='/task/create' style="margin-left: 69px;"><i class="fa fa-fast-backward" aria-hidden="true"></i><i class="fa fa-fast-backward" aria-hidden="true"></i></a></li>
         <li><a href='/company'><i class="ti-pencil-alt2" aria-hidden="true"></i>Company</a></li>&nbsp;
         <li><a href='/desk'><i class="ti-pencil-alt2" aria-hidden="true"></i>Desk</a></li>&nbsp;
         <li><a href='/medicine'><i class="ti-pencil-alt2" aria-hidden="true"></i>Medcine</a></li>&nbsp;
         <div style="float: right; margin-right: 20px;" >
         <li><a href='/catagory_pdf' target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></li>&nbsp;
         <li><a href='/'><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;</a></li>&nbsp;
         <li><a href='/'><i class="fa fa-print" aria-hidden="true"></i></a></li>&nbsp;
         <li><a href='/'><i class="fa fa-street-view" aria-hidden="true"></i></a></li>&nbsp;
         </div>
      </ul>
         </div>
  </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                            <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-check-square" aria-hidden="true"></i> TASK DATA EDIT</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                       
                                    <!-- tab end -->
                     
                                             <div class="col-xs-12 col-sm-12">
                       {{Form::open(['url'=>"/task/$edit_data->id" ,'method'=>'put'])}}

                            
                            <div class="card-body card-block">
                                <div class="form-group">
                                     {{Form::label('title','Title ',['class'=>'control-label','title'=>'title'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                         {{Form::text('title',$edit_data->title,['id'=>'required','placeholder'=>'Title','title'=>'title','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text" style="color: red;">{{$errors->first('title')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('description','Description ',['class'=>'control-label','title'=>'description'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-info" aria-hidden="true"></i></div>
                                       {{Form::textarea('description',$edit_data->description,['id'=>'required','placeholder'=>'Details','title'=>'details','class'=>'form-control','col'=>'10','rows'=>'2'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('description')}}</small>
                                </div>
                                <div class="form-group">
                                {{Form::label('assign_to',' Assign To',['class'=>'control-label','title'=>'assign_to'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-share" aria-hidden="true"></i></div>
                                          {{Form::text('assign_to',$edit_data->assign_to,['id'=>'required','placeholder'=>'Assign To','title'=>'assign_to','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('assign_to')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('start_date',' Start Date',['class'=>'control-label','title'=>'start_date'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                        {{Form::date('start_date',$edit_data->start_date,['id'=>'required','placeholder'=>'End Date','title'=>'start_date','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text text-muted" style="color: red;">{{$errors->first('start_date')}}</small>
                                </div>
                                <div class="form-group">
                                          {{Form::label('end_date','End Date',['class'=>'control-label','title'=>'end_date'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                             {{Form::date('end_date',$edit_data->end_date,['id'=>'required','placeholder'=>'End DAte','title'=>'end_date','class'=>'form-control'])}}
                                    </div>
                                      <small class="form-text" style="color: red;">{{$errors->first('end_date')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('estimated_hour','Estimated Hour',['class'=>'control-label','title'=>'estimated_hour'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-hourglass-half" aria-hidden="true"></i></div>
                                       {{Form::text('estimated_hour',$edit_data->estimated_hour,['id'=>'required','placeholder'=>'Estimated Hour','title'=>'estimated_hour','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('estimated_hour')}}</small>
                                </div>
                                  <div class="form-group">
                                    {{Form::label('progress','Progress',['class'=>'control-label','title'=>'progress'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                                       {{Form::text('progress',$edit_data->progress,['id'=>'required','placeholder'=>'Progress','title'=>'progress','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('progress')}}</small>
                                </div>
                                 <div class="form-group">
                                   {{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
                                    <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                   {{Form::select('status',[$edit_data->status=>$edit_data->status,'Active'=>'Active','Inactive'=>'Inactive'],null,['id'=>'required','title'=>'status','class'=>'form-control'])}} 
                               </div>
                                 <small class="form-text" style="color: red;">{{$errors->first('status')}}</small>
                                </div>
                                   <div class="input-group input-icon right">
                                 {{Form::submit('Update',['class'=>'btn btn-success submit','style'=>'margin-bottom: 55px;margin-left: 101px;'])}}
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