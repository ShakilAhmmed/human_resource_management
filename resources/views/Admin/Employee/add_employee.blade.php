@extends('Admin.index')
@section('title','Employee')
@section('breadcrumbs','Employee')
@section('main_content')


     <div class="col-lg-12">
     <div style="    margin-left: 67px;     margin-top: 34px;" >
      <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;ADD EMPLOYEE</h2> <!-- Tab Heading  -->
         <p title="Transport Details">  ADD EMPLOYEE DETAILS</p> <!-- Transport Details -->
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
                                    <h4>EMPLOYEE</h4>
                                </div>
                                <div class="card-body">
                                     <!-- tab -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a style="background: #6c5ce7;color: white;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">PERSONAL DETAILS</a>
                                            </li>
                                            <li class="nav-item">
                                                <a style="background: #0984e3;color: white;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">COMPANY DETAILS</a>
                                            </li>&nbsp;
                                             <li class="nav-item">
                                                <a style="background: #00b894;color: white;" class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false">BANK ACCOUNT  DETAILS</a>
                                            </li>
                                            &nbsp;
                                             <li class="nav-item">
                                                <a style="background: #487eb0;color: white;" class="nav-link" id="bank-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">LOGIN INFORMATION</a>
                                            </li>
                                              &nbsp;
                                             <li class="nav-item">
                                                <a style="background: #273c75;color: white;" class="nav-link" id="job-tab" data-toggle="tab" href="#job" role="tab" aria-controls="job" aria-selected="false">JOB HISTORY</a>
                                            </li>
                                              &nbsp;
                                             <li class="nav-item">
                                                <a style="background: #487eb0;color: white;" class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">DOCUMENTS</a>
                                            </li>&nbsp;
                                              <li class="nav-item">
                                                <a style="background: #2ecc71;color: white;" class="nav-link" id="save-tab" data-toggle="tab" href="#save" role="tab" aria-controls="documents" aria-selected="false">SAVE</a>
                                            </li>
                                        </ul>
          {{Form::open(['url'=>'/employee','files'=>true])}}
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('name','Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                   {{Form::text('name','',['class'=>'form-control','title'=>'name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('name')}}</div>
                                </div>
                                <div class="form-group">
                         {{Form::label('father_name','Father Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('father_name','',['class'=>'form-control','title'=>'father_name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('father_name')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_bith','Date Of Bith',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                     {{Form::date('date_of_bith','',['class'=>'form-control','title'=>'date_of_bith'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('date_of_bith')}}</div>
                                </div>
                                <div class="form-group">
                                {{Form::label('gender','Gender',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::select('gender',['Male'=>'Male','Female'=>'Female'],null,['class'=>'form-control','title'=>'gender'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('gender')}}</div>
                                </div>

                                <div class="form-group">
                                {{Form::label('phone','Phone',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::text('phone','',['class'=>'form-control','title'=>'phone'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('phone')}}</div>
                                </div>

                                <div class="form-group">
                                {{Form::label('present_address','Present Address',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                           {{Form::textarea('present_address','',['class'=>'form-control','title'=>'present_address','rows'=>'4','cols'=>'4'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('present_address')}}</div>
                                </div>

                                  <div class="form-group">
                                {{Form::label('permanent_address','Permanent Address',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                           {{Form::textarea('permanent_address','',['class'=>'form-control','title'=>'permanent_address','rows'=>'4','cols'=>'4'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('permanent_address')}}</div>
                                </div>


                              <div class="form-group">
                                {{Form::label('nationality','Nationality',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::text('nationality','',['class'=>'form-control','title'=>'nationality'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('nationality')}}</div>
                                </div>

                                  <div class="form-group">
                                {{Form::label('marital_status','Marital Status',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::select('marital_status',['Married'=>'Married','Single'=>'Single'],null,['class'=>'form-control','title'=>'marital_status'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('marital_status')}}</div>
                                </div>


                <div class="form-group">
                {{Form::label('','',['class'=>'control-label','title'=>''])}}
                  <div class="input-group">
                   {{Form::image('admin_asset/images/blankavatar.png','Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle','id'=>'blah','style'=>'width:19%;height:19%;'])}}
                  </div>
                </div>
                <div class="form-group">
                {{Form::label('profile_image','Photo',['class'=>'control-label','title'=>'Photo'])}}
                   <div class="input-group">
                  {{Form::file('profile_image',['onchange'=>'readURL(this);'])}}
                  </div>
                </div>


                            </div>
                    </div>                
            </div>
          <!--   end first tab -->
            <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <!--   COMPANY DETAILS -->
                          <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('employee_code','Employee Code',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                         {{Form::text('employee_code','',['class'=>'form-control','title'=>'employee_code'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('employee_code')}}</div>
                                </div>

                                 <div class="form-group">
                                    {{Form::label('department','Department',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('department','',['class'=>'form-control','title'=>'department'])}}
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
                                    {{Form::label('date_of_joining','Date Of Joining',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::date('date_of_joining','',['class'=>'form-control','title'=>'date_of_joining'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('date_of_joining')}}</div>
                                </div>

                                  <div class="form-group">
                                    {{Form::label('joining_sallary','Joining Sallary',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('joining_sallary','',['class'=>'form-control','title'=>'joining_sallary'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('joining_sallary')}}</div>
                                </div>

                                   <div class="form-group">
                                    {{Form::label('shift','Shift',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('shift','',['class'=>'form-control','title'=>'shift'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('shift')}}</div>
                                </div>
   
                                <div class="form-group">
                                {{Form::label('status','Status',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'status'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('status')}}</div>
                                </div>
                            </div>
                    </div>  

             
                            <!-- table-end -->
                          </div>
                          <!-- end second tab -->

                    <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                                  <!-- bank DETAILS -->
                          <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('account_holder_name','Account Holder Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                         {{Form::text('account_holder_name','',['class'=>'form-control','title'=>'account_holder_name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('account_holder_name')}}</div>
                                </div>

                                 <div class="form-group">
                                    {{Form::label('account_number','Account Number',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('account_number','',['class'=>'form-control','title'=>'account_number'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('account_number')}}</div>
                                </div>

                                <div class="form-group">
                                    {{Form::label('bank_name','Bank Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('bank_name','',['class'=>'form-control','title'=>'bank_name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('bank_name')}}</div>
                                </div>

                                  <div class="form-group">
                                    {{Form::label('branch_name','Branch Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('branch_name','',['class'=>'form-control','title'=>'branch_name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('branch_name')}}</div>
                                </div>
                            </div>
                    </div> 
                              
                     </div>

                     <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                                 <!--  LOGIN DETAILS -->
                          <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('email','Email',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                         {{Form::email('email','',['class'=>'form-control','title'=>'email'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('email')}}</div>
                                </div>

                                 <div class="form-group">
                                    {{Form::label('password','Password',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('password','',['class'=>'form-control','title'=>'password','id'=>'pass'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('password')}}</div>
                                    <span id="msg"></span>
                                </div>

                                <div class="form-group">
                                    {{Form::label('confirm_password','Confirm Password',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('confirm_password','',['class'=>'form-control','title'=>'confirm_password','id'=>'cpass'])}}
                                    </div>
                                     <span id="msg_err"></span>
                                </div>

                                  <div class="form-group">
                                    {{Form::label('role','Role',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('role','',['class'=>'form-control','title'=>'role'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('role')}}</div>
                                </div>
                            </div>
                    </div>
                              
                     </div>

                       <div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="job-tab">
                       <!-- job -->
      <div style="margin-top: 30px;">
              <div>
               <div style="display: inline-flex;">
                      <div class="view" style="height: 39px;">COMPANY  NAME</div>
                      <div class="view" style="height: 39px;">DEPARTMENT</div>
                      <div class="view" style="height: 39px;">DESIGNATION</div>
                      <div class="view" style="height: 39px;">START DATE</div>
                      <div class="view" style="height: 39px;">END DATE</div>
                      <div class="view" style="height: 39px;">ADD MORE FILEDS</div>
                </div>
                <br>
                <table>
                  <tr>
                   <td>
                   <input type='text' class='form-control' name='company_name[]' style='margin-left: 21px;width: 194px;'/>
                  </td>
                  <td>
                 <input type='text' class='form-control' name='job_department[]' style='margin-left: 21px;width: 194px;'/>
                  </td>
                  <td>
                   <input type='text' class='form-control' name='designation[]'  style='margin-left: 21px;width: 194px;'/>
                  </td>
                  <td>
                    <input type='date' class='form-control' name='start_date[]'  style='margin-left: 21px;width: 194px;'/>
                  </td>
                  <td>
                   <input type='date' class='form-control' name='end_date[]' style='margin-left: 21px;width: 194px;'/>
                  </td>
                  <td>
                  <button class="btn btn-success add_field_button" style="width: 196px;margin-left: 21px;">Add More Filed</button>
                  </td>
                 </tr>
                </table>
                <div class="input_fields_wrap"></div>

              </div>
  </div>
                              
                     </div>

                    <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                                 <!--  DOCUMENTS -->
                                     <div style="margin-top: 30px;">
              <div>
               <div style="display: inline-flex;">
                      <div class="view" style="height: 39px;">DOCUMENT FILE NAME</div>
                      <div class="view" style="height: 39px;">FILE </div>
                      <div class="view" style="height: 39px;">ADD MORE FILEDS</div>
                </div>
                <br>
                <table>
                  <tr>
                  <td>

                  {{Form::text('document_file_name[]','',['class'=>'form-control','style'=>'margin-left:21px;width:194px;'])}}
                  </td>
                  <td>
                    <input type='file' class='form-control' name="document[]"  style='margin-left: 21px;width: 194px;'/>
                  </td>
                  <td>
                  <button class="btn btn-success add_field_button_documents" style="width: 196px;margin-left: 21px;">Add More Filed</button>
                  </td>
                 </tr>
                </table>
                <div class="input_fields_wrap_documents"></div>

              </div>
  </div>
                              
                     </div>
                     <hr>

         <div class="tab-pane fade" id="save" role="tabpanel" aria-labelledby="save-tab">
             {{Form::submit('Save',['class'=>'btn btn-success'])}}
        </div>

 
 
        <script src="http://cdnjs.cloudflare.com/…/li…/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


                      </div>
              </div>
          </div>
      </div>


      {{Form::close()}}
@stop