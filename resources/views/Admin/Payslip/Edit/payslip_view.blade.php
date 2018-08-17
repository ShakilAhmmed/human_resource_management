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
    <div class="col-lg-12"  style=" border:6px solid #0b1548;margin-top: 81px;width: 1412px;margin-left: 146px;">
     <div class="col-lg-12" style="width: 1375px;margin-left: 5px;margin-top: 63px;">
      <div class="col-lg-12" >
        
 
        <div style="display: -webkit-box;">
        
  <div class="col-sm-12" style="height: 153px;
; ">
  <div class="col-sm-3"><img src="{{asset('admin_asset/images/admin.jpg')}}" style="height: 150px;    margin-top: -32px;
    margin-left: 146px;"></div>
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
     <h3>HUMAN RESOURCE AND PAYROLL MANAGEMENT</h3>
      <p>Address: Ukil Para Feni </p>

  </div>
</div>
    
</div>
</div>

    <div class="col-lg-12" >
        
 
        <div style="display: -webkit-box;">
   
  <div class="col-sm-12" style="border: 1px solid black;height: 151px; ">

<br>
  	<div class="col-sm-3">Employee Name  <span style="margin-left: 32px;">:</span></div>
<div class="col-sm-3" style="margin-left: -142px;">{{$basic_data->employee_name}}</div>
 <br>
	<div class="col-sm-3">Department Name <span style="    margin-left: 20px;">:</span></div>
<div class="col-sm-3" style="margin-left: -142px;">{{$basic_data->department}}</div>
<br>
	<div class="col-sm-3">Payslip Month <span style="    margin-left: 49px;">:</span></div>
<div class="col-sm-3" style="margin-left: -142px;">{{$basic_data->month}}</div>
<br>
<div class="col-sm-3">Payslip Year <span style="    margin-left: 61px;">:</span></div>
<div class="col-sm-3" style="margin-left: -142px;">{{$basic_data->year}}</div>
<br>
  </div>

   
</div>
</div>
</br>
</br>
<div class="col-lg-12" >
        
 
        <div style="display: -webkit-box;">
        
  <div class="col-sm-6" style="border: 1px solid black;margin-top: 21px;">
 <div class="col-sm-3" >Earnings</div>
  <div class="col-sm-3" >
  	  <div class="col-sm-2" ></div>
  	    <div class="col-sm-1" ><span style="    margin-left: 323px;">Amount(Rs)</span></div>
  </div>
  </div>
    <div class="col-sm-6" style="border: 1px solid black;margin-top: 21px;">
 <div class="col-sm-3" >Deductions</div>
  <div class="col-sm-3" ><span style="    margin-left: 361px;">Amount(Rs)</span></div>
    </div>
    
</div>
</div>
    <div class="col-lg-12" >
        
 
        <div style="display: -webkit-box;">
        
  <div class="col-sm-6" style="border: 1px solid black; height: 341px; ">
        </br>

    <div class="col-sm-4">Basic</div>
<div class="col-sm-2" "><span style="    margin-left: 318px;">{{$basic_data->basic}}</span></div>
  
  	@foreach($allowance_data as $allowance_fetch)
  	</br>

  	<div class="col-sm-4">{{$allowance_fetch->allowances_type}}</div>
<div class="col-sm-2" "><span style="    margin-left: 318px;">{{$allowance_fetch->allowances_amount}}</span></div>
   @endforeach
</div>




    <div class="col-sm-6" style="border: 1px solid black;height: 341px;">
    	@foreach($deductions_data as $deductions_fetch)
    	</br>

 	<div class="col-sm-4">{{$deductions_fetch->deductions_type}}</div>
<div class="col-sm-2" "><span style="    margin-left: 315px;">{{$deductions_fetch->deductions_amount}}</span></div>

 @endforeach
    </div>

   
</div>
</div>
<div class="col-lg-12" >
        
 
        <div style="display: -webkit-box;">
        
  <div class="col-sm-6" style="border: 1px solid black;">
    @php 
       $allowances_total=0;

      @endphp
  	@foreach($allowance_data as $fetch_data)
 
      @php
         $amount=$fetch_data->allowances_amount;
         $basic=$basic_data->basic;
          $allowances_total+=$amount;
          $total=$allowances_total+$basic;
       @endphp
    
        
    @endforeach
  	<div class="col-sm-2" "><span style="margin-left: 528px;">{{$total}}</span></div>
</div>
    <div class="col-sm-6" style="border: 1px solid black;">
       @php 
       $deductions_total=0;

      @endphp
    @foreach($deductions_data as $fetch_data)
  
      @php
         $amount=$fetch_data->deductions_amount;
          $deductions_total+=$amount;
       @endphp
    
        
    @endforeach
  <div class="col-sm-2" "><span style="margin-left: 532px;">{{$deductions_total}}</span></div>
    </div>
    
</div>
</div>
<div class="col-lg-12" >
        
 
        <div style="display: -webkit-box;" >
        
  <div class="col-sm-12" style="border: 1px solid black;margin-bottom: 73px;height: 101px;">

  	<div class="col-sm-3">Net Pay<span style="margin-left: 35px;">:</span></div>
<div class="col-sm-3" style="margin-left: -142px;">{{$basic_data->net_salary}}</div>
 <br>
	<div class="col-sm-3">Status<span style="margin-left: 23px;">:</span></div>
<div class="col-sm-3" style="margin-left: -142px;">{{$basic_data->status}}</div>



  </div>

    </div>
</div>

</div>
</div>



@stop