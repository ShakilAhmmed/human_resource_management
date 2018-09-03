@extends('Admin.index')
@section('title','Attendance Report')
@section('breadcrumbs','Attendance Report')
@section('main_content')

<div style="    margin-left: 67px;     margin-top: 34px;" >
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;ADD ATTENDANCE</h2> <!-- Tab Heading  -->
    <p title="Transport Details">  Add ATTENDANCE Details</p> <!-- Transport Details -->

     </div>


         <br>
         <div class='row' style="    margin-left: 72px;">


         <div class="panel panel-default" >
          <div class="panel-body text-left">
             <ul class='dropdown_test'>

            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
              <li><a href='/daily_attendance'><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Add Daily Attendance</a></li>
            <li><a href='/teacher_info'><i class="fa fa-street-view" aria-hidden="true"></i> Add Teacher</a></li>
            <li><a href='/staff_report'><i class="fa fa-address-book-o" aria-hidden="true"></i> Staff's Report </a></li>
             </ul>
          </div>
        </div>

    </div>
    <br>

     <div class="col-lg-12" style="width: 1509px;
    margin-left: 43px;
    margin-top:-6px;">
                          
                               
                                     <!-- tab -->
                                        <ul class="nav nav-pills" id="myTab" role="tablist" style="    margin-left: 16px;" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-table" aria-hidden="true"></i> ATTENDANCE REPORT</a>
                                            </li>
                                          
                                        </ul>
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>    ATTENDANCE REPORT</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                         
<div class="container">

    


  <!-- Transport Details -->
              <div class="widget-box">
                <div class="widget-title">
                  <span class="icon">
                    <i class="icon-info-sign">
                    </i>
                  </span>
                  <h3 style="margin-left: 397px;"> Attendance Report
                  </h3>
                  <hr>
                </div>
                      
                       <!-- job -->
<!--       <div style="margin-top: 35px;margin-left: 306px;"> -->

    <table style="margin-top: 5%; margin-left: 5%" class="">
        <thead style="background: #1F262D">
              <tr style="height: 41px;text-align: center;    border: 2px solid white;border-radius: 86px;color: #fff">

           
                <th style="border: 1px solid whitesmoke;">Department</th>
                <th style="border: 1px solid whitesmoke;">From Date </th>
                <th style="border: 1px solid whitesmoke;">To Date</th>
                <th style="border: 1px solid whitesmoke;">Submit</th>
              </tr>
        </thead>


            <tbody>
              <tr>
                  {{Form::open(['url'=>'/daily_attendance_report','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

                   @php
                     $department_name_array=[];
                   @endphp
                   @foreach($department_all as $department_data_fetch)
                     @php
                      $department_name_array[$department_data_fetch->department_name]=$department_data_fetch->department_name;
                     @endphp
                   @endforeach
           

            <td> {{Form::select('department_name',$department_name_array,null,['id'=>'department_name','title'=>'department_name','class'=>'form-control','style'=>'margin-left: 1px;width: 253px;'])}}</td>

            <td> <input type='date' class='form-control' name='date'  class="date" id="from_date" style='margin-left: -1px;width: 253px;'/></td>
            <td> <input type='date' class='form-control' name='date'  class="date" id="to_date" style='margin-left: -1px;width: 253px;'/></td>
             <td> {{Form::button('Show ',['class'=>'btn btn-success submit','style'=>'margin-left: 1px; width: 253px;'])}}</td>





          </tr>
                {{Form::close()}}
            </tbody>
        </table>



    <div id="table_show_trigger_forattendance" style="display: none;"  class="col-xs-12 details">
      <table style="margin-left: 34%; border: 1px solid silver;margin-top: 10px; "  class="table">
          <tr>
              <td><b>Department Name :</b></td>
              <td ><p class="department_name_in_view"></p></td>

          </tr>
           <tr>
              <td><b>From Date :</b></td>
              <td ><p class="from_date_view"></p></td>

          </tr>
           <tr>
              <td><b>To Date :</b></td>
              <td ><p class="to_date_view"></p></td>

          </tr>
          


      </table>
    </div>
  </div>

</div>

</div>
<div class="container">
    
                <div>
                  <span class="icon">
                    <i class="icon-info-sign">
                    </i>
                  </span>
                  <h3 style="margin-left: 397px;"> Attendance Report
                  </h3>
                  <hr>
                </div> 
                </div>  

                <div class="student_attendence_data_table" style="    overflow: scroll;" >
                 
                  </div>
            </div>
        </div>
      </div>
    </div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript">

      $(document).ready(function(){

         $('.submit').click(function(){
            var department_name=$('#department_name').val();
            var from_date=$('#from_date').val();
            var to_date=$('#to_date').val();
            
         
                $.ajax({
                url: '/attendance_data',
                type: "post",
                data: {'department_name':department_name,'from_date':from_date,'to_date':to_date,'_token': $('input[name=_token]').val()},
                success: function(data){


                  console.log(data);
                    $('.details').show();
                     $('.department_name_in_view').html(department_name);
                     $('.from_date_view').html(from_date);
                    $('.to_date_view').html(to_date);
                  $('.student_attendence_data_table').html(data);
                }
              });
             });
            });

      </script>
@stop