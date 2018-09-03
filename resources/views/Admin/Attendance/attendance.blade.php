@extends('Admin.index')
@section('title','Attendance')
@section('breadcrumbs','Attendance')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center" style="width: 734px;
    margin-left: 431px;">
    <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif   
<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;ADD ATTENDANCE</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Add ATTENDANCE Details</p> <!-- Transport Details -->

     </div>


         <br>
     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD ATTENDANCE</a>
                                            </li>
                                          
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>    ADD ATTENDANCE FROM</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                         
{{Form::open(['url'=>'/attendance','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}


<div class="container">

    


  <!-- Transport Details -->
              <div class="widget-box">
                <div class="widget-title">
                  <span class="icon">
                    <i class="icon-info-sign">
                    </i>
                  </span>
                  <h3 style="margin-left: 397px;">Add Daily Attendance
                  </h3>
                  <hr>
                </div>
                      
                       <!-- job -->
      <div style="margin-top: 35px;margin-left: 306px;">
              <div>
               <div style="display: inline-flex;">
                      <div class="view" style="height: 39px;">DEPARTMENT  NAME</div>
                   
                      <div class="view" style="height: 39px;">DATE</div>
                    
                      
                </div>
                <br>
                <table>
                  <tr>
                   <td>
                   @php
                     $department_name_array=[];
                   @endphp
                   @foreach($department_all as $department_data_fetch)
                     @php
                      $department_name_array[$department_data_fetch->department_name]=$department_data_fetch->department_name;
                     @endphp
                   @endforeach
                    {{Form::select('department_name',$department_name_array,null,['id'=>'department_name','title'=>'department_name','class'=>'form-control','style'=>'margin-left: 21px;width: 194px;'])}}
                 
                  </td>
                
                  <td>
                    <input type='date' class='form-control' name='date'  class="date" id="date" style='margin-left: 21px;width: 194px;'/> 

                  </td>
              
                 
                 </tr>
                </table>
                <div class="input_fields_wrap"></div>

              </div>
  </div>
                              
                     
</div>



<div id="table_show_trigger_forsubject"  hidden="hidden" class="col-xs-12">
      <table style="width: 25%;" class="table">
          

          <tr>
              <td><b>Department Name</b></td>
              <td class="dep_name_in_view"></td>
              
          </tr>
           <tr>
              <td><b>Date</b></td>
              <td ><?php echo date('d-m-Y')?></td>
              
          </tr>
          
      </table>
</div>

 
<br>
<div class="container">
 
  <div class="row" style="text-align: center;">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" >
      <div class="tile-stats tile-gray">
        <div class="icon"><i class="entypo-chart-area"></i></div>
        <h3 style="color: #34495e;">Attendance For Employee</h3>
        <h4 style="color: #34495e;">Section</h4>
        <h4 style="color:#34495e;"></h4>
      </div>
    </div>
    <div class="col-sm-4"></div>
  </div>

  <br></br>


  <center>
    <a class="btn btn-default"><i class="fa fa-check-square-o" aria-hidden="true"></i> Mark All Present</a>
    <a class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i> Mark All Absent</a>
  </center>
  <br></br>



  <div id="attendance_update">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Employee Code</th>
          <th>Date</th>
        
        </tr>
      </thead>
      <tbody id="student_data">
       
      </tbody>
    </table>
  </div>


  <center>
    {{Form::submit('Save Attendance',['class'=>'btn btn-success'])}}
   
  </center>
 
</div>
      



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript">

      $(document).ready(function(){
        


          $("#date").unbind().change(function(){
                var department_name=$("#department_name").val();
                // var date=$("#date").val();
           
              
                $.ajax({
                url:'/attendance_employee_data',
                type:"POST",
                data:{'department_name':department_name,'_token': $('input[name=_token]').val()},
                success:function(r)
                {
              
                console.log(r);
                    $("#student_data").html("");
                    for(i=0;i<r.length;i++)
                    {
                      $("#student_data").append("<tr>\
                        <td>"+r[i].employee_code+"</td>\
                        <td><input type=\"checkbox\" value="+r[i].employee_code+" name=\"employee_code[]\"></td>\
                      </tr>");
                    }   
                
                }
      
          
            });

         });
           

         
 });



      </script>

@stop