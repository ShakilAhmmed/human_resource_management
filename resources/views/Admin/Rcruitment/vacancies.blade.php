@extends('Admin.index')
@section('title','Vacancies')
@section('breadcrumbs','Vacancies')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;ADD VACANCIES</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Add Vacancies Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD VACANCIES</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-table" aria-hidden="true"></i> VACANCIES LIST</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>    ADD VACANCIES FROM</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                              {{Form::open(['url'=>"/vacancies" ,'method'=>'post'])}}

                            <div class="card-body card-block">
                                <div class="form-group">
                                     {{Form::label('department_name','Department Name',['class'=>'control-label','title'=>'department_name'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                         @php 
                                           $department_array=[''=>'--select--'];
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
                                        {{Form::text('position_name','',['id'=>'required','placeholder'=>'Position Name','title'=>'position_name','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('position_name')}}</small>
                                </div>
                                <div class="form-group">
                                {{Form::label('job_title','Job Title',['class'=>'control-label','title'=>'job_title'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                          {{Form::text('job_title','',['id'=>'required','placeholder'=>'Job Title','title'=>'job_title','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('job_title')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('number_of_vacation','Number Of Vacation',['class'=>'control-label','title'=>'number_of_vacation'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::number('number_of_vacation','',['id'=>'required','placeholder'=>'Number Of Vacation','title'=>'number_of_vacation','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text text-muted" style="color: red;">{{$errors->first('number_of_vacation')}}</small>
                                </div>
                                <div class="form-group">
                                          {{Form::label('details','Details',['class'=>'control-label','title'=>'details'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-info" aria-hidden="true"></i></div>
                                           {{Form::textarea('details','',['id'=>'required','placeholder'=>'Details','title'=>'details','class'=>'form-control','col'=>'10','rows'=>'2'])}}
                                    </div>
                                      <small class="form-text" style="color: red;">{{$errors->first('details')}}</small>
                                </div>
                                <div class="form-group">
                                    {{Form::label('last_date_of','Last Date Of Application',['class'=>'control-label','title'=>'last_date_of'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                       {{Form::date('last_date_of','',['id'=>'required','placeholder'=>'Details','title'=>'last_date_of','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('last_date_of')}}</small>
                                </div>
                                 <div class="form-group">
                                   {{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
                                    <div class="input-group">
                                    <div class="radio-inline">{{Form::radio('status','Open')}}{{Form::label('status','Open')}}</div> &nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Close')}}{{Form::label('status','Close')}}</div>
                               </div>
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
          <!--   end first tab -->
            <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-th-list" aria-hidden="true"></i> VACANCIES DETAILS LIST</h4>
                                </div>
                                <div class="card-body">
                                              <div class="col-md-12">
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Department Name</th>
                                                        <th>Position Name</th>
                                                        <th>Job Title</th>
                                                        <th>Number Of Vacation</th>
                                                        <th>Details</th>
                                                        <th>Last Date Of Application</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($all_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->department_name}}</td>
                                                        <td>{{$all_data_fetch->position_name}}</td>
                                                        <td>{{$all_data_fetch->job_title}}</td>
                                                        <td>{{$all_data_fetch->number_of_vacation}}</td>
                                                        <td>{{$all_data_fetch->details}}</td>
                                                        <td>{{$all_data_fetch->last_date_of}}</td>
                                                          <td>
                                                          @if($all_data_fetch->status=='Open')
                                                           <span style="color: green"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$all_data_fetch->status}}</span>
                                                              @else
                                                           <span style="color: red"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$all_data_fetch->status}}</span>
                                                          @endif
                                                        </td>
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            {{Form::open(['url'=>"/vacancies/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}

                                                            {{Form::open(['url'=>"/vacancies/$all_data_fetch->id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                           
                                                            @if($all_data_fetch->status=='Open')
                                                            {{Form::open(['url'=>"/vacancies/$all_data_fetch->id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Close',['class'=>'btn btn-warning'])}}
                                                            {{Form::close()}}
                                                            @else
                                                            {{Form::open(['url'=>"/vacancies/$all_data_fetch->id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Open',['class'=>'btn btn-success'])}}
                                                            {{Form::close()}}
                                                            @endif  

                                                         
                                                          </div>
                                                          </td>
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
                       
@stop