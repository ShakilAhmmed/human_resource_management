@extends('Admin.index')
@section('title','Leave ')
@section('breadcrumbs','Leave ')
@section('main_content')



@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;APPROVE LEAVE LIST</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Approve Leave List Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> APPROVE LEAVE LIST</a>
                                            </li>
                                         
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
          <!--   end first tab -->
            <!-- second-tab -->
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-th-list" aria-hidden="true"></i>APPROVE LEAVE DETAILS LIST</h4>
                                </div>
                                <div class="card-body">
                                              <div class="col-md-12">
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Employee Codeth>
                                                        <th>Employee Name</th>
                                                        <th>Phone Number</th>
                                                        <th>From Date</th>
                                                        <th>To Date</th>
                                                        <th>Reason</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($leave_all_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->employee_code}}</td>
                                                        <td>{{$all_data_fetch->employee_name}}</td>
                                                        <td>{{$all_data_fetch->phone_number}}</td>
                                                        <td>{{$all_data_fetch->from_date}}</td>
                                                        <td>{{$all_data_fetch->to_date}}</td>
                                                        <td>{{$all_data_fetch->reason}}</td>

                                                          <td>
                                                        
                                                           <span style="color: green"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$all_data_fetch->status}}</span>
                                                         
                                                        </td>
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            {{Form::open(['url'=>"/leave/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}

                                                            {{Form::open(['url'=>"/leave/$all_data_fetch->id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Decline',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                           
                                                           
                                                            {{Form::open(['url'=>"/leave/$all_data_fetch->id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Pending',['class'=>'btn btn-warning'])}}
                                                            {{Form::close()}}
                                             

                                                         
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

