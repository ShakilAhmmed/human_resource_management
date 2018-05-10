@extends('Admin.index')
@section('title','Employee List')
@section('breadcrumbs','Employee List')
@section('main_content')


@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center">
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
                                    <h4>EMPLOYEE</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->

                                    <!-- tab end -->
                        <!-- first tab -->
          <!--   end first tab -->
            <!-- second-tab -->
                      <table  class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>SL No</th>
                            <th>Employee Name</th>
                            <th>Employee Code</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Phone</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          @foreach($employee_data as $key=>$employee_data_value)
                          
                            <td>{{$key+1}}</td>
                            <td>{{$employee_data_value->name}}</td>
                            <td>{{$employee_data_value->employee_code}}</td>
                            <td>{{$employee_data_value->department}}</td>
                            <td>{{$employee_data_value->designation_name}}</td>
                            <td>{{$employee_data_value->phone}}</td>
                            <td style="width: 7%;">
                            <img  style="height: 12%; width: 104%;" class="img-responsive img-circle" src="{{asset("$employee_data_value->profile_image")}}"/>
                      
                             </td>
                            <td>{{$employee_data_value->email}}</td>
                            <td>
                              @if($employee_data_value->status=='Active')
                               <span style="color: green;"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$employee_data_value->status}}</span>
                              @else
                               <span style="color: red;"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$employee_data_value->status}}</span>
                              @endif
                            </td>
                             <td id="my_align" class="display_status">
                              <div style="display:inline-flex">

                                {{Form::open(['url'=>"/" ,'method'=>'GET'])}}
                                {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                {{Form::close()}}

                                {{Form::open(['url'=>"/employee/$employee_data_value->employee_personal_details_id",'method'=>'DELETE'])}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'checkdelete()'])}}
                                {{Form::close()}}

                     {{Form::open(['url'=>"/employee/$employee_data_value->employee_personal_details_id" ,'method'=>'GET'])}}
                              @if($employee_data_value->status=='Active')
                                {{Form::submit('Inactive',['class'=>'btn btn-warning'])}}
                             @else
                                {{Form::submit('Active',['class'=>'btn btn-success'])}}
                             @endif
                       {{Form::close()}}

                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                                              <!-- table-end -->
                                            <!-- end second tab -->
                                        </div>
                                </div>
                            </div>
                        </div>
@stop