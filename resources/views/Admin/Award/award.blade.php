@extends('Admin.index')
@section('title','Award')
@section('breadcrumbs','Award')
@section('main_content')


    <div class="col-lg-12">
        <div style="    margin-left: 67px;     margin-top: 34px;" >
            <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;ADD AWARD</h2> <!-- Tab Heading  -->
            <p title="Transport Details"> AWARD DETAILS</p> <!-- Transport Details -->
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
                <h4>AWARD</h4>
            </div>
            <div class="card-body">
                <!-- tab -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a style="background: #6c5ce7;color: white;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">AWARD LIST</a>
                    </li>
                    <li class="nav-item">
                        <a style="background: #0984e3;color: white;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">NEW AWARD</a>
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
                                    <th>Award Name</th>
                                    <th>Employee Name</th>
                                    <th>Gift</th>
                                    <th>Amount</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($award_data as $key=>$award_data_value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$award_data_value->award_name}}</td>
                                        <td>{{$award_data_value->name}}</td>
                                        <td>{{$award_data_value->gift}}</td>
                                        <td>{{$award_data_value->amount}}</td>

                                        <td style="display: inline-flex;">
                                            {{Form::open(['url'=>"/award/$award_data_value->award_id",'method'=>'DELETE'])}}
                                            {{Form::submit('DELETE',['class'=>'btn btn-danger','onclick'=>'checkdelete()'])}}
                                            {{Form::close()}}

                                            {{Form::open(['url'=>"",'method'=>'GET'])}}
                                            {{Form::submit('EDIT',['class'=>'btn btn-primary'])}}
                                            {{Form::close()}}

                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--   end first tab -->
                    <!-- second-tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        {{Form::open(['url'=>"/award"])}}
                        <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    {{Form::label('award_name','Award Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('award_name','',['class'=>'form-control','title'=>'award_name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('award_name')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('gift','Gift',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('gift','',['class'=>'form-control','title'=>'gift'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('gift')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('amount','Amount',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('amount','',['class'=>'form-control','title'=>'amount'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('amount')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('employee','Employee',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        @php $employee_data_array=['--select--'=>'--select--'] @endphp
                                        @foreach($employee_data as $employee_data_value)
                                            @php
                                                $employee_data_array[$employee_data_value->employee_personal_details_id]=$employee_data_value->name;
                                            @endphp
                                        @endforeach
                                        {{Form::select('employee',$employee_data_array,null,['class'=>'form-control','title'=>'designation_status'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('employee')}}</div>
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