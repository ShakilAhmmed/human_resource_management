@extends('Admin.index')
@section('title','Designation')
@section('breadcrumbs','Designation')
@section('main_content')


     <div class="col-lg-12">
     <div style="    margin-left: 67px;     margin-top: 34px;" >
      <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;ADD DESIGNATION</h2> <!-- Tab Heading  -->
         <p title="Transport Details">  ADD DESIGNATION DETAILS</p> <!-- Transport Details -->
     </div>
     <hr>

@if(session('success'))
   <div class="alert alert-success alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Success!</strong> {{session('success')}}
</div>
 @endif
<div>
         <div class="panel-body text-left">
           <ul class='dropdown_test'>

         <li><a href='/admin'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
         <li><a href='/company'><i class="ti-pencil-alt2" aria-hidden="true"></i>Company</a></li>&nbsp;
         <li><a href='/desk'><i class="ti-pencil-alt2" aria-hidden="true"></i>Desk</a></li>&nbsp;
         <li><a href='/medicine'><i class="ti-pencil-alt2" aria-hidden="true"></i>Medcine</a></li>&nbsp;
         <div style="float: right;">
         <li><a href='/catagory_pdf' target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></li>&nbsp;
         <li><a href='/'><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;</a></li>&nbsp;
         <li><a href='/'><i class="fa fa-print" aria-hidden="true"></i></a></li>&nbsp;
         <li><a href='/'><i class="fa fa-street-view" aria-hidden="true"></i></a></li>&nbsp;
         </div>
      </ul>
         </div>
  </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>DESIGNATION</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a style="background: #6c5ce7;color: white;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DESIGNATION LIST</a>
                                            </li>
                                            <li class="nav-item">
                                                <a style="background: #0984e3;color: white;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">NEW DESIGNATION</a>
                                            </li>
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                       <div class="col-md-12">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Sl No</th>
                                      <th>DEPARTMENT</th>
                                      <th>DESIGNATION NAME</th>
                                      <th>DESIGNATION DESCRIPTION</th>
                                      <th>DESIGNATION STATUS</th>
                                      <th>ACTION</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                                      
                              @foreach($designation_list as $key=>$designation_list_value)
                                   <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$designation_list_value->department}}</td>
                                      <td>{{$designation_list_value->designation_name}}</td>
                                      <td>{{$designation_list_value->designation_description}}</td>
                                      <td>
                                      @if($designation_list_value->designation_status=='Active')
                                      <span style="color: green;">
                                      <i class="fa fa-circle"></i>
                                      {{$designation_list_value->designation_status}}
                                      </span>
                                      @else
                                       <span style="color: red;">
                                       <i class="fa fa-circle"></i>
                                      {{$designation_list_value->designation_status}}
                                      @endif
                                        


                                      </td>
                                      <td style="display: inline-flex;">
                                      {{Form::open(['url'=>"/designation/$designation_list_value->designation_id",'method'=>'DELETE'])}}
                                        {{Form::submit('DELETE',['class'=>'btn btn-danger','onclick'=>'checkdelete()'])}}
                                      {{Form::close()}}

                                     {{Form::open(['url'=>"/designation/$designation_list_value->designation_id/edit",'method'=>'GET'])}}
                                        {{Form::submit('EDIT',['class'=>'btn btn-primary'])}}
                                      {{Form::close()}}

                                    {{Form::open(['url'=>"/designation/$designation_list_value->designation_id",'method'=>'GET'])}}
                                        @if($designation_list_value->designation_status=='Active')
                                        {{Form::submit('INACTIVE',['class'=>'btn btn-warning'])}}
                                        @else
                                        {{Form::submit('ACTIVE',['class'=>'btn btn-success'])}}
                                        @endif
                                    {{Form::close()}}

                                      </td>
                                          


                                      @endforeach
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              
            </div>
          <!--   end first tab -->
            <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                               {{Form::open(['url'=>"/designation"])}}
                          <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('department','Department',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::select('department',['Test'=>'Test','Department'=>'Department'],null,['class'=>'form-control','title'=>'department'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('department')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('designation_name','Designation Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('designation_name','',['class'=>'form-control','title'=>'designation_name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('designation_name')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('designation_description','Designation Description',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                     {{Form::textarea('designation_description','',['class'=>'form-control','title'=>'designation_description','rows'=>'4','cols'=>'4'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('designation_description')}}</div>
                                </div>
                                <div class="form-group">
                                {{Form::label('designation_status','Designation Status',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::select('designation_status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'designation_status'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('designation_status')}}</div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                       {{Form::submit('Save',['class'=>'btn btn-success'])}}
                                    </div>
                                </div>
                            </div>
                    </div>  
                    {{Form::close()}}  
             
                            <!-- table-end -->
                          </div>
                          <!-- end second tab -->
                      </div>
              </div>
          </div>
      </div>
@stop