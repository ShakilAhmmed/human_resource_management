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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
                $time=date('H:i:s');
               foreach ($request->employee_code as $value)
                  {

                      $attendance=new AttendanceModel;
                      $attendance->employee_code=$value;
                      $attendance->department_name=$request->department_name;
                      $attendance->date=$request->date;
                      $attendance->time=$time;
                      $attendance->status="Present";
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
    public function get_employee_data(Request $request)
    {  
        $department=$request->department_name;
        $employee_data=CompanyDetailsModel::where('department',$department)->get();

        return $employee_data;
        
    }
}
