<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentModel;
use App\CompanyDetailsModel;
use App\AttendanceModel;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department_all=DepartmentModel::all();
        return view('Admin.Attendance.attendance',['department_all'=>$department_all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $department_all=DepartmentModel::all();
       return view('Admin.Attendance.attendance_report',['department_all'=>$department_all]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $present_code=CompanyDetailsModel::where('department',$request->department_name)->where('status','Active')->whereIn('employee_code',$request->employee_code)->get();
       $absent_code=CompanyDetailsModel::where('department',$request->department_name)->where('status','Active')->whereNotIn('employee_code',$request->employee_code)->get();


           $time=date('H:i:s');
           
              foreach ($request->employee_code as $fetch_code) 
              {
                   $attendance=new AttendanceModel;
                    $attendance->department_name=$request->department_name;
                    $attendance->date=$request->date;
                    $attendance->time=$time;
                    $attendance->employee_code=$fetch_code;
                    $attendance->status="Present";
                    $attendance->save();
                    
              }
              foreach ($absent_code as $fetch_code) 
              {
                   $attendance=new AttendanceModel;
                    $attendance->department_name=$request->department_name;
                    $attendance->date=$request->date;
                    $attendance->time=$time;
                    $attendance->employee_code=$fetch_code->employee_code;
                    $attendance->status="Absent";
                    $attendance->save();
              }


             session()->flash('success','successfully Submited Your Record');
             return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function attendance_employee_data(Request $request)
    {  
        $department=$request->department_name;
        $employee_data=CompanyDetailsModel::where('department',$department)->get();

        return $employee_data;
       
    }
    public function attendance_data(Request $request)
    {
        $department=$request->department_name;
        $date1=date_create($request->from_date);
        $date2=date_create($request->to_date);
         $diff=date_diff($date1,$date2);
         $total_date=$diff->format("%a");
         $from_date=date('d-m-Y',strtotime($request->from_date));
         $date_start=date('Y-m-d',strtotime($request->from_date));
        // for($i=0;$i<$total_date;$i++)
        // {
             
        // }
        $table="<table class=\"table table-bordered data-table\" style=\"border: 1px solid silver;
    border-radius: 110px;     width: 1173px;
    margin-left: 114px;\">";

                   $table.="<thead>";
                       $table.="<tr >";
                         $table.="<th style=\"width: 78px;\">Employee Name</th>";
                         $table.="<th style=\"width: 78px;\">Employee Code</th>";
                          $table.="<th style=\"width: 78px;\">$from_date</th>";
                         for($i=0;$i<$total_date;$i++)
                         {
                            $calculate_date = strtotime($from_date . ' +1 day');
                              $from_date=date('d-m-Y',$calculate_date);
                            $table.="<th  style=\"width: 78px;\"class=\"date\">$from_date</th>"; 
                         }

                       $table.="</tr>";
                     $table.="</thead>";

                         

                          
                             $employee_code=CompanyDetailsModel::where('department',$request->department_name)->where('status','Active')->get();
                             foreach ($employee_code as $fetch_data) {
                               
                            
                        $table.="<tr>";
                          
                               $table.="<td> $fetch_data->employee_code</td>";
                               $table.="<td> $fetch_data->employee_code</td>";
                          
                         
                          $attendance_data=AttendanceModel::where('department_name',$department)->where('employee_code',$fetch_data->employee_code)->whereBetween('date', [$request->from_date,$request->to_date])->get();
                         $count_date=$total_date-count($attendance_data);
                    
                          foreach ($attendance_data as $value) 
                          {
                          
                              // $data_find=($value->status != 0 ? $value->status :'--');
                              // $table.="<td style=\"color:green\">$data_find</td>";  
                            if($value->status=='Present')
                            {
                               $table.="<td style=\"color:green\">Present</td>";  
                            }
                            else
                            {
                         
                               $table.="<td style=\"color:red\">Absent</td>";
                            }

                       
                         }
                         for($j=0;$j<=$count_date;$j++)
                         {
                            $table.="<td style=\"color:orange\">No Attendance</td>";
                         }
                        
                         
                       $table.="</tr>";
                       }
                      $table.="<tbody>";
                     $table.="</tbody>";
                   $table.="</table>";
  echo $table;
    }
}
