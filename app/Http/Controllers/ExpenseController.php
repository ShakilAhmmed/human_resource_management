<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseModel;
Use Validator;
use Session;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_data=ExpenseModel::all();
        return view('Admin.Expense.expense',['expense_data'=>$expense_data]);
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
        $expense=new ExpenseModel;
        $valid=Validator::make($request->all(),$expense->expense());
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }
        else
        {
            $expense->fill($request->all())->save();
            Session::flash('success','SuccessFully Inserted');
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
        $expense=ExpenseModel::where('id',$id)->first();
        if($expense->status=='Active')
        {
            $expense->update(['status'=>'Inactive']);
        }
        else
        {
            $expense->update(['status'=>'Active']);
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
        $edit_data=ExpenseModel::find($id);
        return view('Admin.Expense.Edit.expense_edit',['edit_data'=>$edit_data]);


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
        ExpenseModel::where('id',$id)->first()->fill($request->all())->save();
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
        ExpenseModel::where('id',$id)->delete();
        Session::flash('success','Deleted SuccessFully');
        return back();
    }
}
