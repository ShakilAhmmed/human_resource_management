@extends('Admin.index')
@section('title','Task')
@section('breadcrumbs','Task')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-th-list" aria-hidden="true"></i>&nbsp;ADD TASK LIST</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Task List Details</p> <!-- Transport Details -->

     </div>

 <div>
         <div class="panel-body text-left">
           <ul class='dropdown_test'>

         <li><a href='/task' style="margin-left: 69px;"><i class="ti-pencil-alt2" aria-hidden="true"></i> New Task</a></li>&nbsp;
         <li><a href='/company'><i class="ti-pencil-alt2" aria-hidden="true"></i>Company</a></li>&nbsp;
         <li><a href='/desk'><i class="ti-pencil-alt2" aria-hidden="true"></i>Desk</a></li>&nbsp;
         <li><a href='/medicine'><i class="ti-pencil-alt2" aria-hidden="true"></i>Medcine</a></li>&nbsp;
         <div style="float: right; margin-right: 27px;" >
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
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-table" aria-hidden="true"></i> TASK LIST</a>
                                            </li>
                                          
                                        </ul>
                                        <hr/>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-th-list" aria-hidden="true"></i> TASK DETAILS LIST</h4>
                                </div>
                                <div class="card-body">
                                              <div class="col-md-12">
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Title</th>
                                                        <th>Assign To</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Estimated Hour</th>
                                                        <th>Progress</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($all_report_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->title}}</td>
                                                        <td>{{$all_data_fetch->assign_to}}</td>
                                                        <td>{{$all_data_fetch->start_date}}</td>
                                                        <td>{{$all_data_fetch->end_date}}</td>
                                                        <td>{{$all_data_fetch->estimated_hour}}</td>
                                                        <td>{{$all_data_fetch->progress}}</td>
                                                          <td>
                                                          @if($all_data_fetch->status=='Active')
                                                           <span style="color: green"><i  class="fa fa-circle" aria-hidden="true"></i> &nbsp;{{$all_data_fetch->status}}</span>
                                                              @else
                                                           <span style="color: red"><i  class="fa fa-circle" aria-hidden="true"></i> &nbsp;{{$all_data_fetch->status}}</span>
                                                          @endif
                                                        </td>
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            {{Form::open(['url'=>"/task/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}

                                                            {{Form::open(['url'=>"/task/$all_data_fetch->id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                           
                                                            @if($all_data_fetch->status=='Active')
                                                            {{Form::open(['url'=>"/task/$all_data_fetch->id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Inactive',['class'=>'btn btn-warning'])}}
                                                            {{Form::close()}}
                                                            @else
                                                            {{Form::open(['url'=>"/task/$all_data_fetch->id" ,'method'=>'GET'])}}
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
          <!--   end first tab -->
            <!-- second-tab -->
                
                                </div>
                            </div>
                       
@stop