<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAccessModel;
use App\User;
use App\Role;
use Validator;
use Session;
class UserAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $admins=User::all();
         $roles=Role::all();
        return view('Admin.Rbac.user_access',['admins'=>$admins,'roles'=>$roles]);
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
        if(UserAccessModel::where('user_id',$request->user_id)->first())
            {
                Session::flash('error',"This User Role Are Already Exist");
                return back();
            }
          else
            {
                    $access_obj=new UserAccessModel;
                    $validation=Validator::make($request->all(),$access_obj->validate_data());
                    if($validation->fails())
                    {
                     return back()->withInput()->withErrors($validation);
                    }
                    else
                    {

                        $store_data=$request->all();
                      
                       
                        $access_obj->fill($store_data)->save();
                        Session::flash('success',"A new User Access is created named ");
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
        //
    }
}
