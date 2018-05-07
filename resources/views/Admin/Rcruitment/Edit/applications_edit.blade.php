@extends('Admin.index')
@section('title','Applications')
@section('breadcrumbs','Applications Edit')
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
    <p title="Transport Details">  Edit Applications Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                            <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-check-square" aria-hidden="true"></i> APPLICATIONS EDIT DATA</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                       
                                    <!-- tab end -->
                     
                                             <div class="col-xs-12 col-sm-12">
                       {{Form::open(['url'=>"/applications/$edit_data->id" ,'method'=>'put'])}}

                                                 

                            <div class="card-body card-block">

                             <div class="form-group">
                                    {{Form::label('application_name','Application Name',['class'=>'control-label','title'=>'application_name'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::text('application_name',$edit_data->application_name,['id'=>'required','placeholder'=>'Application Name','title'=>'application_name','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('application_name')}}</small>
                                </div>

                                  <div class="form-group">
                                    {{Form::label('email','Email',['class'=>'control-label','title'=>'email'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::email('email',$edit_data->email,['id'=>'required','placeholder'=>'Email','title'=>'email','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('email')}}</small>
                                </div>

                                 <div class="form-group">
                                    {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                        {{Form::text('phone',$edit_data->phone,['id'=>'required','placeholder'=>'Phone','title'=>'phone','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('phone')}}</small>
                                </div>

                                  <div class="form-group">
                                    {{Form::label('address','Address',['class'=>'control-label','title'=>'address'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::textarea('address',$edit_data->address,['id'=>'required','placeholder'=>'Address','title'=>'address','class'=>'form-control','col'=>'10','rows'=>'2'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('address')}}</small>
                                </div>


                                <div class="form-group">
                                     {{Form::label('department_name','Department Name',['class'=>'control-label','title'=>'department_name'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-mouse-pointer" aria-hidden="true"></i></div>
                                         @php 
                                           $department_array=[$edit_data->department_name=>$edit_data->department_name];
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
                                {{Form::label('date','Date',['class'=>'control-label','title'=>'date'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                          {{Form::date('date',$edit_data->date,['id'=>'required','placeholder'=>'Date','title'=>'date','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('date')}}</small>
                                </div>
                              
                             
                              
                                 <div class="form-group">
                                   {{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
                                   @if($edit_data->status=='Pending')
                                    <div class="input-group">
                                    <div class="radio-inline">{{Form::radio('status','Pending',['checked'=>'checked'])}}{{Form::label('status','Pending')}}</div> &nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Interview')}}{{Form::label('status','Interview')}}</div>&nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Hired')}}{{Form::label('status','Hired')}}</div>&nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Unqualified')}}{{Form::label('status','Unqualified')}}</div>  &nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Temporary')}}{{Form::label('status','Temporary')}}</div>              
  
                               </div>
                               @elseif($edit_data->status=='Interview')
                                  <div class="input-group">
                                    <div class="radio-inline">{{Form::radio('status','Pending')}}{{Form::label('status','Pending')}}</div> &nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Interview',['checked'=>'checked'])}}{{Form::label('status','Interview')}}</div>&nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Hired')}}{{Form::label('status','Hired')}}</div>&nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Unqualified')}}{{Form::label('status','Unqualified')}}</div>  &nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Temporary')}}{{Form::label('status','Temporary')}}</div>              
  
                               </div>
                               @elseif($edit_data->status=='Hired')
                                <div class="input-group">
                                    <div class="radio-inline">{{Form::radio('status','Pending')}}{{Form::label('status','Pending')}}</div> &nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Interview')}}{{Form::label('status','Interview')}}</div>&nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Hired',['checked'=>'checked'])}}{{Form::label('status','Hired')}}</div>&nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Unqualified')}}{{Form::label('status','Unqualified')}}</div>  &nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Temporary')}}{{Form::label('status','Temporary')}}</div>              
  
                               </div>
                               @elseif($edit_data->status=='Unqualified')

                                <div class="input-group">
                                    <div class="radio-inline">{{Form::radio('status','Pending')}}{{Form::label('status','Pending')}}</div> &nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Interview')}}{{Form::label('status','Interview')}}</div>&nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Hired')}}{{Form::label('status','Hired')}}</div>&nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Unqualified',['checked'=>'checked'])}}{{Form::label('status','Unqualified')}}</div>  &nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Temporary')}}{{Form::label('status','Temporary')}}</div>              
  
                               </div>
                               @else
                                   <div class="input-group">
                                    <div class="radio-inline">{{Form::radio('status','Pending')}}{{Form::label('status','Pending')}}</div> &nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Interview')}}{{Form::label('status','Interview')}}</div>&nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Hired')}}{{Form::label('status','Hired')}}</div>&nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Unqualified')}}{{Form::label('status','Unqualified')}}</div>  &nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Temporary',['checked'=>'checked'])}}{{Form::label('status','Temporary')}}</div>              
  
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