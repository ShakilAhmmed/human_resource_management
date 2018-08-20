<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VacanciesModel;
use App\DepartmentModel;
use Validator;
use Session;


class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $department_data=DepartmentModel::where('status','Active')->get();
        $all_data=VacanciesModel::all();
        return view('Admin.Rcruitment.vacancies',['department_data'=>$department_data,'all_data'=>$all_data]);
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
        $model_object=new VacanciesModel;
        $requried_data=Validator::make($request->all(),$model_object->validation());
        if($requried_data->fails())
        {
            return back()->withInput()->withErrors($requried_data); 
        }
        else
        {
            $model_object->fill($request->all())->save();
            Session::flash('success','Vacancies Data Add Successfully');
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
        $get_data=VacanciesModel::where('id',$id)->first();
        if($get_data->status=='Open')
        {
            $get_data->update(['status'=>'Close']);
        }
        else
        {
           $get_data->update(['status'=>'Open']); 
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
        $department_data=DepartmentModel::where('status','Active')->get();
         $edit_data=VacanciesModel::where('id',$id)->first();
        return view('Admin.Rcruitment.Edit.vacancies_edit',['department_data'=>$department_data,'edit_data'=>$edit_data]);
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
         VacanciesModel::where('id',$id)->first()->fill($request->all())->save();
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
        
        VacanciesModel::where('id',$id)->delete();
        Session::flash('success','Deleted Operation SuccessFully Completed');
        return back();
    }
}
