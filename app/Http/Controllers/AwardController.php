<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalDetailsModel;
use App\CompanyDetailsModel;
use App\AwardModel;
use Validator;
use Session;
class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee_data=PersonalDetailsModel::all();
        $award_data=AwardModel::join('employee_personal_details','employee_personal_details.employee_personal_details_id','=','award.employee')->get();
        return view('Admin.Award.award',['employee_data'=>$employee_data,'award_data'=>$award_data]);
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
       $award_model=new AwardModel;
       $validation=Validator::make($request->all(),$award_model->rules());
       if($validation->fails())
       {
           return back()->withInput()->withErrors($validation);
       }
       else
       {
           $requested_data=$request->all();
           $requested_data=array_add($requested_data,'award_id',time());
           $award_model->fill($requested_data)->save();
           Session::flash('success','New Award Added');
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
        AwardModel::findOrFail($id)->delete();
        Session::flash('success','Award Deleted Successfully');
        return back();
    }
}
