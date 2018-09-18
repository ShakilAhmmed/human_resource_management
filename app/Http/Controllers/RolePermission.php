<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\permission_role_model;
use Session;
class RolePermission extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_permission=Permission::all();
        $role=Role::all();
        $create_permission_role=permission_role_model::groupby('role_id')->get();
        return view('Admin.Rbac.role_permission',['all_permission'=>$all_permission,'role'=>$role,'create_permission_role'=>$create_permission_role]);
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
       if(!permission_role_model::where('role_id',$request->role_id)->first())
       {

        $fill_data=array_fill_keys($request->content_permission,$request->role_id);
       

        foreach ($fill_data as $key => $value) {
            $role=new permission_role_model;
            $role->permission_id=$key;
            $role->role_id=$value;
            $role->save();
        }
        Session::flash('success','This Role Are Successfully Set Permission');
        return back();
      }
        else
        {
            Session::flash('error',"Duplicate Entry Are Not Allowed");
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
        $permission=permission_role_model::where('role_id',$id)->get();
        $permission_id_pass=[];
        foreach ($permission as $value) {
           
            $permission_id_pass[]=$value;
        }
        $permission_role_based=[];

        foreach ($permission_id_pass as $permission_value) {
          $permission_role_based[]=Permission::where('id',$permission_value->permission_id)->first();
        }


        
        return view('Admin.Rbac.role_configuration',['current_role'=>$permission_role_based,"permission"=>Permission::all(),'admin_info'=>Role::where('id',$id)->first()]);
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
         if($request->permission_id):
        $fill_data=array_fill_keys($request->permission_id,$id);

        foreach ($fill_data as $key => $value) {
            
            $a=permission_role_model::where(['permission_id'=>$key,'role_id'=>$value])->first();
            
            if($a)
            {
                Session::flash('success_failed','This Permission are Already Exist');
                
            }
            else
            {
               $role=new permission_role_model;
                $role->permission_id=$key;
                $role->role_id=$value;
                $role->save(); 
            }
            
        }
        Session::flash('success','This Role Are Successfully Set Permission');
        return back();
        else:
        Session::flash('error','Please Set Permission First');
        return back();
        endif;
    }

     public function delete_role_current_role(Request $request,$id)
    {

        foreach ($request->delete_permission as $value) {
            permission_role_model::where(['role_id'=>$id,'permission_id'=>$value])->delete();
        }
        Session::flash('success','Succesfully Remove This Permission');
        return back()->with('success','Succesfully Remove This Permission');
        
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
}
