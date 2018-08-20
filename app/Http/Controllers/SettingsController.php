<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SettingsModel;
use Validator;
use Session;
use File;
use Toastr;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings_data=SettingsModel::where('id','1534775880')->first();
        return view('Admin.Settings.settings',['settings_data'=>$settings_data]);
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
      
        // $model_object=new SettingsModel;
        // $validate_data=Validator::make($request->all(),$model_object->validate_rules());
        // if($validate_data->fails())
        // {
        //     return back()->withInput()->withErrors($validate_data);
        // }
        // else
        // {
          //  $model_object->fill($request->all())->save();
            // Session::flash('success','Vacancies Data Add Successfully');
            // return back();
      //  }

        
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
      

       $model_object=new SettingsModel;
       $validate_data=Validator::make($request->all(),$model_object->validate_rules());
       if($validate_data->fails())
       {
           return back()->withInput()->withErrors($validate_data);
       }
       else
       {
       
       $model_object=new SettingsModel;
        $request_data=$request->all();
        if($request->hasFile('logo'))
        {
            $file_path="admin_asset/backend/settings/";
            $file_name="logo.jpg";
            $img_url=$file_path.$file_name;
            $request->file('logo')->move($file_path,$img_url);
          $request_data=array_set($request_data,'logo',$img_url);
         
        }

         $model_object->where('id',$id)->first()->fill($request_data)->save();
         //Session::flash('success','Update Data Successfully Complete');
         Toastr::success('Settings Updated', '', ["positionClass" => "toast-top-center"]);
         return back();
        }

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
