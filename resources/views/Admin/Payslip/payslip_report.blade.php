@extends('Admin.index')
@section('title','PAYSLIP REPORT')
@section('breadcrumbs','PAYSLIP REPORT')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;PAYSLIP REPORT</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Add Payslip Report Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> PAYSLIP REPORT</a>
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
                                    <h4><i class="fa fa-th-list" aria-hidden="true"></i> PAYSLIP DETAILS LIST</h4>
                                </div>
                                <div class="card-body">
                                              <div class="col-md-12">
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Department Name</th>
                                                        <th>Employee Name</th>
                                                        <th>Month</th>
                                                        <th>Year</th>
                                                        <th>Basic</th>
                                                        <th>Allowances</th>
                                                        <th>Deductions</th>
                                                          <th>Net Salary</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($all_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->department}}</td>
                                                        <td>{{$all_data_fetch->employee_name}}</td>
                                                        <td>{{$all_data_fetch->month}}</td>
                                                        <td>{{$all_data_fetch->year}}</td>
                                                        <td>{{$all_data_fetch->basic}}</td>
                                                        <td>{{$all_data_fetch->allowances}}</td>
                                                         <td>{{$all_data_fetch->deductions}}</td>
                                                          <td>{{$all_data_fetch->net_salary}}</td>
                                                   
                                                          <td>
                                                          @if($all_data_fetch->status=='Paid')
                                                           <span style="color: green"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$all_data_fetch->status}}</span>
                                                              @else
                                                           <span style="color: red"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$all_data_fetch->status}}</span>
                                                          @endif
                                                        </td>
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            {{Form::open(['url'=>"/payslip/$all_data_fetch->payslip_id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}

                                                            {{Form::open(['url'=>"/payslip/$all_data_fetch->payslip_id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                           
                                                            @if($all_data_fetch->status=='Paid')
                                                            {{Form::open(['url'=>"/payslip/$all_data_fetch->payslip_id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Unpaid',['class'=>'btn btn-warning'])}}
                                                            {{Form::close()}}
                                                            @else
                                                            {{Form::open(['url'=>"/payslip/$all_data_fetch->payslip_id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Paid',['class'=>'btn btn-success'])}}
                                                            {{Form::close()}}
                                                            @endif  
                                                             {{Form::open(['url'=>"/preview/$all_data_fetch->payslip_id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Preview',['class'=>'btn btn-primary'])}}
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