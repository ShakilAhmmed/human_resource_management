<?php

namespace Horsefly\Http\Controllers;

use Illuminate\Http\Request;
use Horsefly\TaskModel;
use Validator;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Task.task');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $all_report_data=TaskModel::all();
       return view('Admin.Task.task_list',['all_report_data'=>$all_report_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $object_model=new TaskModel;
       $required_data=Validator::make($request->all(),$object_model->validate_data());
       if($required_data->fails())
       {
         return back()->withInput()->withErrors($required_data);
       }
       else
       {
           $request_data=$request->all();
           $request_data=array_add($request_data,'id',time());
           $new_task=$object_model->fill($request_data)->save();
           Session::flash('success','New Task Created Successfully');
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
       $get_data=TaskModel::where('id',$id)->first();
        if($get_data->status=='Active')
        {
            $get_data->update(['status'=>'Inactive']);
        }
        else
        {
           $get_data->update(['status'=>'Active']); 
        }
       Session::flash('success','Status Update Successfully');
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
         
         $edit_data=TaskModel::where('id',$id)->first();
        return view('Admin.Task.Edit.task_edit',['edit_data'=>$edit_data]);
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
        
        $edit_task=TaskModel::where('id',$id)->first()->fill($request->all())->save();
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
        $delete_data=TaskModel::where('id',$id)->delete();
        Session::flash('success','Delete Operation Successfully Completed');
        return back();
    }
}
