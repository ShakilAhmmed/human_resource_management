<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HolidayModel;
use Validator;
use Session;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Holiday.holiday');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Holiday.holiday_report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $holiday=new HolidayModel;
        $valid=Validator::make($request->all(),$holiday->holiday());
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }
        else
        {
            $holiday->fill($request->all())->save();
            Session::flash('success','Holiday Added');
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
        $data=HolidayModel::findOrFail($id);
        if($data->status=='Active'):
            $data->update(['status'=>'Inactive']);
        else:
            $data->update(['status'=>'Active']);
        endif;
        Session::flash('success','Status Changed Successfully');
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

    public function get_holiday(Request $request)
    {
        $month='0'.$request->month;
        $data=HolidayModel::whereMonth('date', '=',$month)->get();

        foreach($data as $data_value)
        {
            $view="<div class='col-sm-4'>";
            $view.="<div class=\"card\" style=\"width: 18rem;margin-left: 16px;\">";
            $view.="<h2 style='margin-left: 15px;color: red;'><i class='fa fa-calendar'></i> </h2>";
            $view.="<div class=\"card-body\">";
            $view.="<h5 class=\"card-title\" style='color: red;'>$data_value->occassion</h5>";
            $view.="<p class=\"card-text\">$data_value->description</p>";
            $date=date('d-M-Y',strtotime($data_value->date));
            $view.="<p class=\"card-text\">$date</p>";
            if($data_value->status=='Active'):
                $view.="<p class=\"card-text\" style='color: green;'><i class='fa fa-check-circle'></i>$data_value->status </p>";
                $view.="<a href=\"/holiday/$data_value->id\" class=\"btn btn-danger\">Inactive</a>";
            else:
                $view.="<p class=\"card-text\" style='color: red;'><i class='fa fa-crosshairs'></i>$data_value->status </p>";
                $view.="<a href=\"/holiday/$data_value->id\" class=\"btn btn-success\">Active</a>";
            endif;
            $view.="</div>";
            $view.="</div>";
            $view.="</div>";
            echo  $view;
        }




    }
}
