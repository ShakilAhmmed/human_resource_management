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
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;ADD LEAVE</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Add Leave Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD LEAVE</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-table" aria-hidden="true"></i> LEAVE LIST</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>    ADD LEAVE FROM</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                            {{Form::open(['url'=>"/leave" ,'method'=>'post'])}}

                            <div class="card-body card-block">
                             <div class="form-group">                                    
                                {{Form::label('Employee Code','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::text('employee_code','',['class'=>'form-control','title'=>'employee_code','id'=>'employee_code','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('employee_code')}}</div>
                                <div class="form-group">
                                    {{Form::label('Employee Name','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::text('employee_name','',['class'=>'form-control','title'=>'employee_name','id'=>'employee_name','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('employee_name')}}</div>
                                   <div class="form-group">
                                    {{Form::label('Phone Number','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::text('phone_number','',['class'=>'form-control','title'=>'phone_number','id'=>'phone_number','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('phone_number')}}</div>
                                   <div class="form-group">
                                    {{Form::label('Address','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::text('address','',['class'=>'form-control','title'=>'address','id'=>'address','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('phone_number')}}</div>
                                  <div class="form-group">
                                    {{Form::label('Leave Type','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                    @php
                                     $leave_array=[''=>'--select--'];
                                    @endphp
                                    @foreach($leave_type as $leave_fetch_data)
                                    @php
                                    $leave_array[$leave_fetch_data->leave_type_name]=$leave_fetch_data->leave_type_name;
                                    @endphp
                                    @endforeach
                                       {{Form::select('leave_type',$leave_array,null,['class'=>'form-control','title'=>'leave_type'])}}
                                    </div>
                                </div>

                                 <div style="color: red;">{{$errors->first('all_information')}}</div>
                                 <div class="form-group">                                    
                                {{Form::label('From Date','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::date('from_date','',['class'=>'form-control','title'=>'from_date','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('from_date')}}</div>
                                 <div class="form-group">                                    
                                {{Form::label('To Date','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       {{Form::date('to_date','',['class'=>'form-control','title'=>'to_date','required'=>'required'])}}
                                    </div>
                                </div>
                                <div style="color: red;">{{$errors->first('to_date')}}</div>
                                <div class="form-group">
                                    {{Form::label('Reason','',['class'=>'control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        {{Form::textarea('reason','',['class'=>'form-control','col'=>'20','rows'=>'4','title'=>'reason','required'=>'required'])}}
                                    </div>
                                </div>
                                 <div style="color: red;">{{$errors->first('reason')}}</div>
                                <div class="form-group">
                                {{Form::label('Status','',['class'=>'control-label'])}}
                                 <div class="input-group">
                               <div class="radio-inline">{{Form::radio('status','Pending')}}{{Form::label('status','Pending')}}</div> &nbsp;
                                <div class="radio-inline">{{Form::radio('status','Approve')}}{{Form::label('status','Approve')}}</div>
                               </div>
                              
                               </div>
                                </div>

                                 <div class="input-group input-icon right">
                                 {{Form::submit('Save',['class'=>'btn btn-success submit','style'=>'margin-bottom: 55px;margin-left: 101px;'])}}
                                </div>
                                  {{Form::close()}}                  
            </div>
            </div>
            </div>
            </div>
          <!--   end first tab -->
            <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-th-list" aria-hidden="true"></i> LEAVE DETAILS LIST</h4>
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
                                                        
                                                           <span style="color: red"><i  class="fa fa-circle" aria-hidden="true"></i>&nbsp;{{$all_data_fetch->status}}</span>
                                                         
                                                        </td>
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            {{Form::open(['url'=>"/leave/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}

                                                            {{Form::open(['url'=>"/leave/$all_data_fetch->id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                           
                                                           
                                                            {{Form::open(['url'=>"/leave/$all_data_fetch->id" ,'method'=>'GET'])}}
                                                            {{Form::submit('Approve',['class'=>'btn btn-success'])}}
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
                   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript">

      $(document).ready(function(){
        


          $("#employee_code").keyup().change(function(){

                var employee_code=$("#employee_code").val();         
                // alert(employee_code);
                $.ajax({
                url:'/get_employee_details',
                type:"post",
                data:{'employee_code':employee_code,'_token': $('input[name=_token]').val()},
                success:function(r)
                {
                   $("#employee_name").val(r.name);
                   $("#phone_number").val(r.phone);
                   $("#address").val(r.present_address);
                
                }
      
          
            });
              
              

         });
           

         
 });



      </script>    

@stop

