@extends('Admin.index')
@section('title','Payslip')
@section('breadcrumbs','Payslip')
@section('main_content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
            <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Success !</strong> {{session('success')}}
        </div>
    @endif
    <div style="    margin-left: 67px;     margin-top: 34px;" >
        <h2><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;CREATE PAYSLIP</h2> <!-- Tab Heading  -->
        <p title="Transport Details">  CREATE PAYSLIP</p> <!-- Transport Details -->

    </div>
    <div>
        <div class="panel-body text-left">
            <ul class='dropdown_test'>

                <li><a href='/task/create' style="margin-left: 69px;"><i class="ti-pencil-alt2" aria-hidden="true"></i> Task List</a></li>&nbsp;
                <li><a href='/company'><i class="ti-pencil-alt2" aria-hidden="true"></i>Company</a></li>&nbsp;
                <li><a href='/desk'><i class="ti-pencil-alt2" aria-hidden="true"></i>Desk</a></li>&nbsp;
                <li><a href='/medicine'><i class="ti-pencil-alt2" aria-hidden="true"></i>Medcine</a></li>&nbsp;
                <div style="float: right; margin-right: 26px;" >
                    <li><a href='/catagory_pdf' target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></li>&nbsp;
                    <li><a href='/'><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;</a></li>&nbsp;
                    <li><a href='/'><i class="fa fa-print" aria-hidden="true"></i></a></li>&nbsp;
                    <li><a href='/'><i class="fa fa-street-view" aria-hidden="true"></i></a></li>&nbsp;
                </div>
            </ul>
        </div>
    </div>
    <div class="col-lg-12">
        <div style="display: inline-flex;">
            <div class="view" style="height: 34px;margin-left: 50px;">DEPARTMENT</div>
            <div class="view" style="height: 34px;margin-left: 50px;">EMPLOYEE</div>
            <div class="view" style="height: 34px;margin-left: 50px;">MONTH</div>
            <div class="view" style="height: 34px;margin-left: 50px;">YEAR</div>
            <div class="view" style="height: 34px;margin-left: 50px;">SUBMIT</div>
        </div>
        {{Form::open(['url'=>'/payslip'])}}
        <div style="display: -webkit-box;">
            <div class="form-group">
                <div class="col-sm-2">
                 @php
                    $department_array=['--select--'=>'--select--']
                 @endphp
                    @foreach($department as $department_data)
                        @php
                          $department_array[$department_data->department_name]=$department_data->department_name
                        @endphp
                    @endforeach
                    {{Form::select('department',$department_array,null,['class'=>'form-control department','style'=>'width: 200px;margin-left:32px;'])}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">

                    {{Form::select('employee_name',[''=>'--select department--'],null,['class'=>'form-control employee_name','style'=>'width: 200px;margin-left:19px;'])}}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    {{Form::select('month',['--month--'=>'--month--','January'=>'January','February'=>'February','March'=>'March','April'=>'April','May'=>'May','June'=>'June','July'=>'July','August'=>'August','September'=>'September','October'=>'October','November'=>'November','December'=>'December'],null,['class'=>'form-control','style'=>'width: 200px;margin-left:19px;'])}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    {{Form::text('medicine_name','',['class'=>'form-control medicine_name','style'=>'width: 200px;margin-left:19px;'])}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    <input  type="button" class="btn btn-success show" value="Submit" style="width: 200px;margin-left:19px;"/>
                </div>
            </div>
        </div>
    </div>
<div style="display: none;" class="show_form">
    <div class="col-sm-3" style="margin-left: 3.5%;">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center"> Allowances</h4>
            </div>
        </div>
    </div>
    <div style="margin-top: 30px;">
        <div>
            <div style="display: inline-flex;">
                <div class="view" style="height: 39px;">TYPE</div>
                <div class="view" style="height: 39px;">AMOUNT</div>
                <div class="view" style="height: 39px;">ADD MORE FIELDS</div>
                <div class="view" style="height: 39px;">CALCULATE</div>
            </div>
            <br>
            <table>
                <tr>
                    <td>
                        <input type='text' class='form-control' name='allowances_type[]' style='margin-left: 21px;width: 194px;'/>
                    </td>
                    <td>
                        <input type='text' class='form-control allowances_amount' id="allowances_amount" name='allowances_amount[]' style='margin-left: 21px;width: 194px;'/>
                    </td>
                    <td>
                        <button class="btn btn-success allowances_button" style="width: 196px;margin-left: 21px;">Add More Filed</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary allowances_calculate" id="allowances_calculate" style="width: 196px;margin-left: 21px;">Calculate</button>
                    </td>
                </tr>
            </table>
            <div class="allowances"></div>

        </div>
    </div>
    <div class="col-sm-3" style="margin-left: 3.5%;">
        <div class="card" style="margin-top: 10%;">
            <div class="card-header">
                <h4 class="text-center">Deductions</h4>
            </div>
        </div>
    </div>
    <div style="margin-top: 30px;">
        <div>
            <div style="display: inline-flex;">
                <div class="view" style="height: 39px;">TYPE</div>
                <div class="view" style="height: 39px;">AMOUNT</div>
                <div class="view" style="height: 39px;">ADD MORE FIELDS</div>
                <div class="view" style="height: 39px;">CALCULATE</div>
            </div>
            <br>
            <table>
                <tr>
                    <td>
                        <input type='text' class='form-control' name='deductions_type[]' style='margin-left: 21px;width: 194px;'/>
                    </td>
                    <td>
                        <input type='text' class='form-control deductions_amount' name='deductions_amount[]' style='margin-left: 21px;width: 194px;'/>
                    </td>
                    <td>
                        <button class="btn btn-success deductions_button" style="width: 196px;margin-left: 21px;">Add More Filed</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary deductions_calculate" style="width: 196px;margin-left: 21px;">Calculate</button>
                    </td>
                </tr>
            </table>
            <div class="deductions"></div>

        </div>
    </div>
  <div class="col-sm-2"></div>
    <div class="col-sm-8" style="margin-top: 3%;">
        <div class="card">
            <div class="card-header">
                <h4>Summary</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {{Form::label('Basic','',['class'=>'control-label'])}}
                    <div class="input-group">
                        {{Form::text('basic','',['class'=>'form-control basic','title'=>'basic','readonly'=>'readonly','id'=>'basic'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('Allowances','',['class'=>'control-label'])}}
                    <div class="input-group">
                        {{Form::text('allowances','0',['class'=>'form-control allowances_total','title'=>'allowances','readonly'=>'readonly'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('Deductions','',['class'=>'control-label'])}}
                    <div class="input-group">
                        {{Form::text('deductions','0',['class'=>'form-control deductions_total','title'=>'deductions','readonly'=>'readonly'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('Net Salary','',['class'=>'control-label'])}}
                    <div class="input-group">
                        {{Form::text('net_salary','',['class'=>'form-control net_salary','title'=>'net_salary','readonly'=>'readonly','id'=>'net_salary'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('Status','',['class'=>'control-label'])}}
                    <div class="input-group">
                        {{Form::select('status',['Paid'=>'Paid','Unpaid'=>'Unpaid'],null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="input-group text-center">
                    {{Form::submit('Create Payslip',['class'=>'btn btn-success'])}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
    {{Form::close()}}
    <script src="http://cdnjs.cloudflare.com/…/li…/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">

    </script>
@stop