<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AdminModel;
use Validator;
use Session;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=AdminModel::all();
        return view('Admin.Rbac.admin',['data'=>$data]);
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
        $data=new AdminModel;
        $valid=Validator::make($request->all(),$data->admin());
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }
        else
        {
            $Data=array_add($request->all(),'status','Active');
            $Data=array_set($Data,'password',bcrypt($request->password));
            $create_admin=new AdminModel;
            $create_admin->fill($Data)->save();
            return back()->with('success','New Admin Create');
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
       $admin_data=AdminModel::where('id',$id)->first();
        if($admin_data->status=='Active')
        {
            $admin_data->update(['status'=>'Inactive']);
        }
        else
        {
            $admin_data->update(['status'=>'Active']);
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
        $edit_data=AdminModel::findorFail($id);
        return view('Admin.Rbac.Edit.admin_edit',['edit_data'=>$edit_data]);
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
        AdminModel::where('id',$id)->first()->fill($request->all())->save();
        Session::flash('success','SuccessFUlly Updated');
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
       AdminModel::where('id',$id)->delete();
       Session::flash('success','SuccessFUlly Deleted');
       return back();
    }
}
