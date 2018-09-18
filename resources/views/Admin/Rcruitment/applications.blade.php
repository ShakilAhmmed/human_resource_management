@extends('Admin.index')
@section('title','Applications')
@section('breadcrumbs','Applications')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;ADD APPLICATIONS</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Add APPLICATIONS Details</p> <!-- Transport Details -->

     </div>



         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                          @permission('INSERT')
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD APPLICATIONS</a>
                                            </li>
                                            @endpermission
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-table" aria-hidden="true"></i> APPLICATIONS LIST</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  ADD APPLICATIONS FROM</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                              {{Form::open(['url'=>"/applications" ,'method'=>'post'])}}

                            <div class="card-body card-block">

                             <div class="form-group">
                                    {{Form::label('application_name','Application Name',['class'=>'control-label','title'=>'application_name'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::text('application_name','',['id'=>'required','placeholder'=>'Application Name','title'=>'application_name','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('application_name')}}</small>
                                </div>

                                  <div class="form-group">
                                    {{Form::label('email','Email',['class'=>'control-label','title'=>'email'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::email('email','',['id'=>'required','placeholder'=>'Email','title'=>'email','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('email')}}</small>
                                </div>

                                 <div class="form-group">
                                    {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                        {{Form::text('phone','',['id'=>'required','placeholder'=>'Phone','title'=>'phone','class'=>'form-control'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('phone')}}</small>
                                </div>

                                  <div class="form-group">
                                    {{Form::label('address','Address',['class'=>'control-label','title'=>'address'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                        {{Form::textarea('address','',['id'=>'required','placeholder'=>'Address','title'=>'address','class'=>'form-control','col'=>'10','rows'=>'2'])}}
                                    </div>
                                     <small class="form-text " style="color: red;">{{$errors->first('address')}}</small>
                                </div>


                                <div class="form-group">
                                     {{Form::label('department_name','Department Name',['class'=>'control-label','title'=>'department_name'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-mouse-pointer" aria-hidden="true"></i></div>
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
                                {{Form::label('date','Date',['class'=>'control-label','title'=>'date'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                          {{Form::date('date','',['id'=>'required','placeholder'=>'Date','title'=>'date','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text " style="color: red;">{{$errors->first('date')}}</small>
                                </div>
                              
                             
                              
                                 <div class="form-group">
                                   {{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
                                    <div class="input-group">
                                    <div class="radio-inline">{{Form::radio('status','Pending')}}{{Form::label('status','Pending')}}</div> &nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Interview')}}{{Form::label('status','Interview')}}</div>&nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Hired')}}{{Form::label('status','Hired')}}</div>&nbsp;
                                    <div class="radio-inline">{{Form::radio('status','Unqualified')}}{{Form::label('status','Unqualified')}}</div>  &nbsp;  
                                    <div class="radio-inline">{{Form::radio('status','Temporary')}}{{Form::label('status','Temporary')}}</div>              
  
                               </div>
                                 <small class="form-text" style="color: red;">{{$errors->first('status')}}</small>
                                </div>
                                   <div class="input-group input-icon right">
                                    @permission('INSERT')
                                 {{Form::submit('Save',['class'=>'btn btn-success submit','style'=>'margin-bottom: 55px;margin-left: 101px;'])}}
                                 @endpermission
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
                                    <h4><i class="fa fa-th-list" aria-hidden="true"></i> APPLICATIONS DETAILS LIST</h4>
                                </div>
                                <div class="card-body">
                                
                                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                                             <li class="nav-item">
                                                <a style="background: #01a3a4;color: white;" class="nav-link" id="all-tab" data-toggle="tab" href="#all" role="all" aria-controls="all" aria-selected="false">ALL</a>
                                            </li>&nbsp;
                                           
                                            <li class="nav-item">
                                                <a style="background: #303952;color: white;" class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
                                            </li>&nbsp;
                                            <li class="nav-item">
                                                <a style="background: #01a3a4;color: white;" class="nav-link" id="Interview-tab" data-toggle="tab" href="#Interview" role="tab" aria-controls="Interview" aria-selected="false">Interview</a>
                                            </li>
                                            &nbsp;
                                             <li class="nav-item">
                                                <a style="background: #00b894;color: white;" class="nav-link" id="Hired-tab" data-toggle="tab" href="#Hired" role="tab" aria-controls="Hired" aria-selected="false">Hired</a>
                                            </li>
                                            &nbsp;
                                             <li class="nav-item">
                                                <a style="background: #e77f67;color: white;" class="nav-link" id="Unqualified-tab" data-toggle="tab" href="#Unqualified" role="tab" aria-controls="Unqualified" aria-selected="false">Unqualified</a>
                                            </li>
                                              &nbsp;
                                             <li class="nav-item">
                                                <a style="background: #273c75;color: white;" class="nav-link" id="Temporary-tab" data-toggle="tab" href="#Temporary" role="tab" aria-controls="Temporary" aria-selected="false">Temporary</a>
                                            </li>
                                              &nbsp;
                                            
                                        </ul>
                                   
                                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                        
                                         <!--  <div class="col-md-12">
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Application Name</th>
                                                        <th>Email </th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Department Name</th>
                                                        <th>Position Name</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                     @foreach($all_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->application_name}}</td>
                                                        <td>{{$all_data_fetch->email}}</td>
                                                        <td>{{$all_data_fetch->phone}}</td>
                                                        <td>{{$all_data_fetch->address}}</td>
                                                        <td>{{$all_data_fetch->department_name}}</td>
                                                        <td>{{$all_data_fetch->position_name}}</td>
                                                        <td>{{$all_data_fetch->date}}</td>
                                                        <td>
                                                        @if($all_data_fetch->status=='Pending')
                                                        <span style="color:#303952; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Interview')
                                                           <span style="color:#01a3a4; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Hired')
                                                        <span style="color:#00b894; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Unqualified')
                                                        <span style="color:#e77f67; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @else
                                                           <span style="color:#273c75; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @endif
                                                        </td>
                                                         
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}

                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                          
                                                         
                                                          </div>
                                                          </td>
                                                      </tr>
                                                     @endforeach

                                                    </tbody>
                                                  </table>
                                                </div> -->

                                                all
                                             
                                            
                                        </div>
                                     

                                     <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                              <!-- <div class="col-md-12">
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Application Name</th>
                                                        <th>Email </th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Department Name</th>
                                                        <th>Position Name</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                     @foreach($peding_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->application_name}}</td>
                                                        <td>{{$all_data_fetch->email}}</td>
                                                        <td>{{$all_data_fetch->phone}}</td>
                                                        <td>{{$all_data_fetch->address}}</td>
                                                        <td>{{$all_data_fetch->department_name}}</td>
                                                        <td>{{$all_data_fetch->position_name}}</td>
                                                        <td>{{$all_data_fetch->date}}</td>
                                                        <td>
                                                        @if($all_data_fetch->status=='Pending')
                                                        <span style="color:#303952; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Interview')
                                                           <span style="color:#01a3a4; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Hired')
                                                        <span style="color:#00b894; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Unqualified')
                                                        <span style="color:#e77f67; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @else
                                                           <span style="color:#273c75; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @endif
                                                        </td>
                                                         
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}

                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                          
                                                         
                                                          </div>
                                                          </td>
                                                      </tr>
                                                     @endforeach

                                                    </tbody>
                                                  </table>
                                                </div> -->
                                                pending
                                      </div>
                                       <div class="tab-pane fade" id="Interview" role="tabpanel" aria-labelledby="Interview-tab">
                                              <div class="col-md-12">
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Application Name</th>
                                                        <th>Email </th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Department Name</th>
                                                        <th>Position Name</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                     @foreach($interview_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->application_name}}</td>
                                                        <td>{{$all_data_fetch->email}}</td>
                                                        <td>{{$all_data_fetch->phone}}</td>
                                                        <td>{{$all_data_fetch->address}}</td>
                                                        <td>{{$all_data_fetch->department_name}}</td>
                                                        <td>{{$all_data_fetch->position_name}}</td>
                                                        <td>{{$all_data_fetch->date}}</td>
                                                        <td>
                                                        @if($all_data_fetch->status=='Pending')
                                                        <span style="color:#303952; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Interview')
                                                           <span style="color:#01a3a4; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Hired')
                                                        <span style="color:#00b894; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Unqualified')
                                                        <span style="color:#e77f67; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @else
                                                           <span style="color:#273c75; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @endif
                                                        </td>
                                                         
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            @permission('EDIT')
                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}
                                                            @endpermission
                                                            @permission('DELETE')
                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id",'method'=>'DELETE'])}}

                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                          @endpermission
                                                         
                                                          </div>
                                                          </td>
                                                      </tr>
                                                     @endforeach

                                                    </tbody>
                                                  </table>
                                                  </div>
                                              
                                      </div>
                                        <div class="tab-pane fade" id="Hired" role="tabpanel" aria-labelledby="Hired-tab">
                                                       
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Application Name</th>
                                                        <th>Email </th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Department Name</th>
                                                        <th>Position Name</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                     @foreach($hired_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->application_name}}</td>
                                                        <td>{{$all_data_fetch->email}}</td>
                                                        <td>{{$all_data_fetch->phone}}</td>
                                                        <td>{{$all_data_fetch->address}}</td>
                                                        <td>{{$all_data_fetch->department_name}}</td>
                                                        <td>{{$all_data_fetch->position_name}}</td>
                                                        <td>{{$all_data_fetch->date}}</td>
                                                        <td>
                                                        @if($all_data_fetch->status=='Pending')
                                                        <span style="color:#303952; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Interview')
                                                           <span style="color:#01a3a4; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Hired')
                                                        <span style="color:#00b894; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Unqualified')
                                                        <span style="color:#e77f67; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @else
                                                           <span style="color:#273c75; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @endif
                                                        </td>
                                                         
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            @permission('INSERT')
                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}
                                                            @endpermission
                                                            @permission('DELETE')
                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                            @endpermission
                                                          
                                                         
                                                          </div>
                                                          </td>
                                                      </tr>
                                                     @endforeach

                                                    </tbody>
                                                  </table>
                                               
                                      </div>
                                        <div class="tab-pane fade" id="Unqualified" role="tabpanel" aria-labelledby="Unqualified-tab">
                                                       
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Application Name</th>
                                                        <th>Email </th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Department Name</th>
                                                        <th>Position Name</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                     @foreach($unqualified_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->application_name}}</td>
                                                        <td>{{$all_data_fetch->email}}</td>
                                                        <td>{{$all_data_fetch->phone}}</td>
                                                        <td>{{$all_data_fetch->address}}</td>
                                                        <td>{{$all_data_fetch->department_name}}</td>
                                                        <td>{{$all_data_fetch->position_name}}</td>
                                                        <td>{{$all_data_fetch->date}}</td>
                                                        <td>
                                                        @if($all_data_fetch->status=='Pending')
                                                        <span style="color:#303952; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Interview')
                                                           <span style="color:#01a3a4; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Hired')
                                                        <span style="color:#00b894; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Unqualified')
                                                        <span style="color:#e77f67; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @else
                                                           <span style="color:#273c75; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @endif
                                                        </td>
                                                         
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            @permission('EDIT')
                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}
                                                            @endpermission
                                                            @permission('DELETE')
                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                            @endpermission
                                                          
                                                         
                                                          </div>
                                                          </td>
                                                      </tr>
                                                     @endforeach

                                                    </tbody>
                                                  </table>
                                                
                                      </div>
                                          <div class="tab-pane fade" id="Temporary" role="tabpanel" aria-labelledby="Temporary-tab">
                                             
                                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Serial No</th>
                                                        <th>Application Name</th>
                                                        <th>Email </th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Department Name</th>
                                                        <th>Position Name</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                     @foreach($temporary_data as $key=>$all_data_fetch)
                                                      <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$all_data_fetch->application_name}}</td>
                                                        <td>{{$all_data_fetch->email}}</td>
                                                        <td>{{$all_data_fetch->phone}}</td>
                                                        <td>{{$all_data_fetch->address}}</td>
                                                        <td>{{$all_data_fetch->department_name}}</td>
                                                        <td>{{$all_data_fetch->position_name}}</td>
                                                        <td>{{$all_data_fetch->date}}</td>
                                                        <td>
                                                        @if($all_data_fetch->status=='Pending')
                                                        <span style="color:#303952; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Interview')
                                                           <span style="color:#01a3a4; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Hired')
                                                        <span style="color:#00b894; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @elseif($all_data_fetch->status=='Unqualified')
                                                        <span style="color:#e77f67; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @else
                                                           <span style="color:#273c75; "><b>{{$all_data_fetch->status}}</b></span>
                                                        @endif
                                                        </td>
                                                         
                                                          <td id="my_align" class="display_status">
                                                          <div style="display:inline-flex">
                                                            @permission('EDIT')
                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id/edit" ,'method'=>'GET'])}}
                                                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                                            {{Form::close()}}
                                                            @endpermission
                                                            @permission('DELETE')

                                                            {{Form::open(['url'=>"/applications/$all_data_fetch->id",'method'=>'DELETE'])}}
                                                           {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                            {{Form::close()}}
                                                          @endpermission
                                                         
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