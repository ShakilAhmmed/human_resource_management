<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentModel;
use Validator;
use Session;
use Illuminate\Support\Facades\Cache;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept_data=Cache::get('dept_data',[]);
        if(empty($dept_data))
        {
            $dept_data=DepartmentModel::all();
            Cache::forever('dept_data',$dept_data);
        }

        return view('Admin.Department.department',['dept_data'=>$dept_data]);
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
        $data=new DepartmentModel;
        $valid=Validator::make($request->all(),$data->department());
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }
        else
        {
            $data->fill($request->all())->save();
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
        $dept_data=DepartmentModel::where('id',$id)->first();
        if($dept_data->status=='Active')
        {
            $dept_data->update(['status'=>'Inactive']);
        }
        else
        {
            $dept_data->update(['status'=>'Active']);
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
        $edit_data=DepartmentModel::find($id);
        return view('Admin.Department.Edit.department_edit',['edit_data'=>$edit_data]);
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
        DepartmentModel::where('id',$id)->first()->fill($request->all())->save();
        Session::flash('success','Updated SuccessFully');
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
        DepartmentModel::where('id',$id)->delete();
        Session::flash('success','Deleted SuccessFully');
        return back();
    }


}
