<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentModel;
use App\ApplicationsModel;
use Validator;
use Session;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $department_data=DepartmentModel::where('status','Active')->get();
          $all_data=ApplicationsModel::all();
          $peding_data=ApplicationsModel::where('status','Pending')->get();
          $interview_data=ApplicationsModel::where('status','Interview')->get();
          $hired_data=ApplicationsModel::where('status','Hired')->get();
          $unqualified_data=ApplicationsModel::where('status','Unqualified')->get();
          $temporary_data=ApplicationsModel::where('status','Temporary')->get();
          return view('Admin.Rcruitment.applications',['department_data'=>$department_data,'all_data'=>$all_data,'peding_data'=>$peding_data,'interview_data'=>$interview_data,'hired_data'=>$hired_data,'unqualified_data'=>$unqualified_data,'temporary_data'=>$temporary_data]);
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
        $model_object=new ApplicationsModel;
        $requried_data=Validator::make($request->all(),$model_object->validation());
        if($requried_data->fails())
        {
            return back()->withInput()->withErrors($requried_data); 
        }
        else
        {
            $model_object->fill($request->all())->save();
            Session::flash('success','Applications Data Add Successfully');
            return back();
            // dd($request->all());
            // exit();
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department_data=DepartmentModel::where('status','Active')->get();
         $edit_data=ApplicationsModel::where('id',$id)->first();
        return view('Admin.Rcruitment.Edit.applications_edit',['department_data'=>$department_data,'edit_data'=>$edit_data]);
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
         ApplicationsModel::where('id',$id)->first()->fill($request->all())->save();
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
         
        ApplicationsModel::where('id',$id)->delete();
        Session::flash('success','Deleted Operation SuccessFully Completed');
        return back();
    }

}
