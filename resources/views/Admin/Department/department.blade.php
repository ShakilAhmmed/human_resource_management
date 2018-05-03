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
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ADD DEPARTMENT</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">DEPARTMENT LIST</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                             <div class="col-xs-12 col-sm-12">
                      {{Form::open(['url'=>"/department" ,'method'=>'post'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Department Name','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('department_name','',['class'=>'form-control','title'=>'department_name','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('department_name')}}</div>
                                <div class="form-group">
                                    {{Form::label('description','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('description','',['class'=>'form-control','col'=>'20','rows'=>'4','title'=>'description'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('description')}}</div>
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
                                                        <th>Department Name</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                      @foreach($dept_data as $key=>$dept_data_value)
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$dept_data_value->department_name}}</td>
                                                        <td>{{$dept_data_value->description}}</td>
                                                        <td>
                                                          @if($dept_data_value->status=='Active')
                                                           <span style="color: green"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$dept_data_value->status}}</span>
                                                              @else
                                                           <span style="color: red"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$dept_data_value->status}}</span>
                                                          @endif
                                                        </td>
                                                         <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            {{Form::open(['url'=>"/department/$dept_data_value->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}

                                                            {{Form::open(['url'=>"/department/$dept_data_value->id",'method'=>'DELETE'])}}
                                                            {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'checkdelete()'])}}
                                                            {{Form::close()}}

                                                            @if($dept_data_value->status=='Active')
                                                            {{Form::open(['url'=>"/department/$dept_data_value->id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Inactive',['class'=>'btn btn-warning'])}}
                                                            {{Form::close()}}
                                                            @else
                                                            {{Form::open(['url'=>"/department/$dept_data_value->id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Active',['class'=>'btn btn-success'])}}
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