<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveTypeModel;
use App\CompanyDetailsModel;
use App\PersonalDetailsModel;
use App\LeaveModel;
use Validator;
use Session;
class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_type=LeaveTypeModel::all();
        $leave_all_data=LeaveModel::where('status','Pending')->get();
       return view('Admin.Leave.leave',['leave_type'=>$leave_type,'leave_all_data'=>$leave_all_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $leave_all_data=LeaveModel::where('status','Approve')->get();
       return view('Admin.Leave.approve_list',['leave_all_data'=>$leave_all_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model_obj=new LeaveModel;
        $validation=Validator::make($request->all(),$model_obj->validate_data());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $model_obj->fill($request->all())->save();
            Session::flash('success','Inserted SuccessFully');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $get_data=LeaveModel::where('id',$id)->first();
       if($get_data->status=='Pending')
       {
         $get_data->update(['status'=>'Approve']);
       }
       else
       {
         $get_data->update(['status'=>'Pending']);
       }

           Session::flash('success','Status Update  SuccessFully');
            return back(); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
         $edit_data=LeaveModel::findOrFail($id);
         $leave_type=LeaveTypeModel::all();
        return view('Admin.Leave.Edit.leave_edit',['leave_type'=>$leave_type,'edit_data'=>$edit_data]);
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
       LeaveModel::where('id',$id)->first()->fill($request->all())->save();
        Session::flash('success','Updated Operation SuccessFully Completed');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $delete_data=LeaveModel::where('id',$id)->delete();
         Session::flash('success','Delete  SuccessFully Completed');
          return back();
    }
    public function get_employee_details(Request $request)
    {
        $employee_code=$request->employee_code;
        $company_details=CompanyDetailsModel::where('employee_code',$employee_code)->first();
        $id=$company_details->employee_personal_details_id;
        $personal_details=PersonalDetailsModel::where('employee_personal_details_id',$id)->first();
          return $personal_details;
    }

}
