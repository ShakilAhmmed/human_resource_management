<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DesignationModel;
use Session;
use Validator;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation_list=DesignationModel::all();
        return view('Admin.Designation.designation',['designation_list'=>$designation_list]);
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
        $designation_model=new DesignationModel;
        $validation=Validator::make($request->all(),$designation_model->rules());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $request_data=$request->all();
            $request_data=array_add($request_data,'designation_id',time());
            $new_designation=$designation_model->fill($request_data)->save();
            Session::flash('success','New Designation Created Successfully');
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
       $designation_data=DesignationModel::find($id);
       if($designation_data->designation_status=='Active')
       {
           $designation_data->update(['designation_status'=>'Inactive']);
       }
       else
       {
           $designation_data->update(['designation_status'=>'Active']);
       }
       Session::flash('success',"Designation's Staus Changed Successfully");
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
        $edit_data=DesignationModel::find($id);
        return view('Admin.Designation.Edit.designation_edit',['edit_data'=>$edit_data]);
        
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
       DesignationModel::where('designation_id',$id)->first()->fill($request->all())->save();
       Session::flash('success',"Designation's Information Updated Successfully");
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
        DesignationModel::find($id)->delete();
        Session::flash('success','Designation Deleted Successfully');
        return back();
    }
}
