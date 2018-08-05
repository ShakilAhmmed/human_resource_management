@extends('Admin.index')
@section('title','Holiday')
@section('breadcrumbs','Holiday')
@section('main_content')


    <div class="col-lg-12">
        <div style="    margin-left: 67px;     margin-top: 34px;" >
            <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;ADD HOLIDAY</h2> <!-- Tab Heading  -->
            <p title="Transport Details"> HOLIDAY DETAILS</p> <!-- Transport Details -->
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
                <h4>HOLIDAY</h4>
            </div>
            <div class="card-body">
                <!-- tab -->
                <!-- tab end -->
                    <!--   end first tab -->
                    <!-- second-tab -->

                        {{Form::open(['url'=>"/holiday"])}}
                        <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    {{Form::label('occassion','Occasion',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('occassion','',['class'=>'form-control','title'=>'occassion'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('occassion')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('description','Holiday Description',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::textarea('description','',['class'=>'form-control','title'=>'description','rows'=>'4','cols'=>'4'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('description')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('date','Date',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::date('date','',['class'=>'form-control','title'=>'date'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('date')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('status','Holiday Status',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'holiday_status'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('status')}}</div>
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