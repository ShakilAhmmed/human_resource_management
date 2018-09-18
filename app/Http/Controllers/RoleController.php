<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Validator;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Role::all();
        return view('Admin.Rbac.create_role',['data'=>$data]);
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
       

          if(Role::where('display_name',$request->display_name)->first())
            {
                Session::flash('error',"$request->display_name Role Are Already Exist");
                return back();
            }
          else
            {
                    $validation_rule=new Role;
                    $validation=Validator::make($request->all(),$validation_rule->role());
                    if($validation->fails())
                    {
             return back()->withInput()->withErrors($validation);
                    }
                    else
                    {

                        $store_data=$request->all();
                        $name=str_slug($request->display_name,'_');
                        $store_data=array_add($store_data,'name',$name);
           
                        $create_role=new Role;
                        $create_role->fill($store_data)->save();
                        Session::flash('success',"A new Role is created named ($request->display_name)");
                        return back();

                    }
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
        $edit_data=Role::findorFail($id);
        return view('Admin.Rbac.Edit.role_edit',['edit_data'=>$edit_data]);
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
        Role::where('id',$id)->first()->fill($request->all())->save();
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
        Role::where('id',$id)->delete();
        Session::flash('success','SuccessFully Deleted');
        return back();
    }
}
