<?php

namespace Horsefly\Http\Controllers;

use Illuminate\Http\Request;
use Horsefly\LeaveTypeModel;
use Validator;
use Session;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leavetype_data=LeaveTypeModel::all();
        return view('Admin.Leave.leave_type',['leavetype_data'=>$leavetype_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leave=new LeaveTypeModel;
        $valid=Validator::make($request->all(),$leave->leavetype());
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }
        else
        {
            $leave->fill($request->all())->save();
            Session::flash('success','SuccessFully Inserted');
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
        $leave=LeaveTypeModel::where('id',$id)->first();
        if($leave->status=='Active')
        {
            $leave->update(['status'=>'Inactive']);
        }
        else
        {
            $leave->update(['status'=>'Active']);
        }

        Session::flash('success','Status Updated');
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
        $edit_data=LeaveTypeModel::find($id);
        return view('Admin.Leave.Edit.leavetype_edit',['edit_data'=>$edit_data]);
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
        LeaveTypeModel::where('id',$id)->first()->fill($request->all())->save();
        Session::flash('success','SuccessFully Updated');
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
        LeaveTypeModel::where('id',$id)->delete();
        Session::flash('success','SuccessFully Deleted');
        return back();
    }
}
