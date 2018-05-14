@extends('Admin.index')
@section('title','Notice')
@section('breadcrumbs','Notice')
@section('main_content')


     <div class="col-lg-12">
     <div style="    margin-left: 67px;     margin-top: 34px;" >
      <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;ADD NOTICE</h2> <!-- Tab Heading  -->
         <p title="Transport Details">  ADD NOTICE DETAILS</p> <!-- Transport Details -->
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
                                    <h4>NOTICE</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a style="background: #6c5ce7;color: white;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">NOTICE LIST</a>
                                            </li>
                                            <li class="nav-item">
                                                <a style="background: #0984e3;color: white;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">NEW NOTICE</a>
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
                                   <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td>
                                      
                                       <span style="color: red;">
                                       <i class="fa fa-circle"></i>

                            
                                      </td>
                                      <td style="display: inline-flex;">
                                      {{Form::open(['url'=>"",'method'=>'DELETE'])}}
                                        {{Form::submit('DELETE',['class'=>'btn btn-danger','onclick'=>'checkdelete()'])}}
                                      {{Form::close()}}

                                     {{Form::open(['url'=>"/",'method'=>'GET'])}}
                                        {{Form::submit('EDIT',['class'=>'btn btn-primary'])}}
                                      {{Form::close()}}

                                    {{Form::open(['url'=>"",'method'=>'GET'])}}

                                        {{Form::submit('ACTIVE',['class'=>'btn btn-success'])}}
                                    {{Form::close()}}

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              
            </div>
          <!--   end first tab -->
            <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                               {{Form::open(['url'=>"/notice"])}}
                          <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('title','Title',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('title','',['class'=>'form-control','title'=>'title'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('title')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('subject','Subject',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('subject','',['class'=>'form-control','title'=>'subject'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('subject')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('author','Author',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                     {{Form::text('author','',['class'=>'form-control','title'=>'author'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('author')}}</div>
                                </div>

                                <div class="form-group">
                                {{Form::label('to','To',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        @php 
                                         $personal_details_array=['--select--'=>'--select--']
                                        @endphp
                                        @foreach($personal_details as $personal_details_value)
                                          @php
                                              $personal_details_array[$personal_details_value->employee_personal_details_id]=$personal_details_value->name 
                                          @endphp
                                        @endforeach

                                       {{Form::select('to',$personal_details_array,null,['class'=>'form-control to','title'=>'to'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('to')}}</div>
                                </div>

                                  <div class="form-group">
                                    {{Form::label('email','Email',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('email','',['class'=>'form-control email','title'=>'email','readonly'=>'readonly'])}}
                                    </div>
                                </div>

                                  <div class="form-group">
                                    {{Form::label('phone','Phone',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('phone','',['class'=>'form-control phone','title'=>'phone','readonly'=>'readonly'])}}
                                    </div>
                                </div>

                             <div class="form-group">
                              {{Form::label('photo','Photo',['class'=>'control-label','title'=>''])}}
                                <div class="input-group">
                                 {{Form::image('admin_asset/images/blankavatar.png','Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle profile','id'=>'blah','style'=>'width:19%;height:19%;'])}}
                                </div>
                              </div>



                                 <div class="form-group">
                                {{Form::label('notice','Notice',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::textarea('notice','',['class'=>'form-control','title'=>'notice'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('notice')}}</div>
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

        <script src="http://cdnjs.cloudflare.com/…/li…/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@stop