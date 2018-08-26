<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\MessengingModel;
class Messenging extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$online_user=User::where('is_active','1')->get();
        return view('Admin.Messenging.message');
    }

    public function online_user()
    {
        $data=User::where('is_active','1')->get();
        foreach ($data as  $value) {
            $table="<div class=\"chat_people\">";
            $table.="<div class=\"chat_img\"> <img src=\"https://ptetutorials.com/images/user-profile.png\" alt=\"sunil\"> </div>";
            $table.="<div class=\"chat_ib\">";
            $table.="<input type='hidden' class='user_id' value='$value->id'/>";
            $table.="<button class='btn btn-success user' get_value='$value->id'>$value->name</button>";
            $table.="</div>";
            $table.="</div>";
            $table.="<hr>";
           echo $table;
        }
    }

    public function get_message_user(Request $request)
    {
         $received=MessengingModel::where('from_id',$request->message_to_id)->where('to_id',Auth::user()->id)->get();
        $sent=MessengingModel::where('from_id',Auth::user()->id)->where('to_id',$request->message_to_id)->get();

        $table="<div class=\"msg_history\">";
      foreach ($received as $received_value) {
            $table.="<div class=\"incoming_msg\">";
            $table.="<div class=\"incoming_msg_img\"> <img src=\"https://ptetutorials.com/images/user-profile.png\" alt=\"sunil\"> </div>";
            $table.="<div class=\"received_msg\">";
            $table.="<div class=\"received_withd_msg\">";
            $table.="<p>$received_value->message</p>";
            $table.="<span class=\"time_date\"> 11:01 AM | June 9</span>";
            $table.="</div>";
            $table.="</div>";
            $table.="</div>";
      }
        
     foreach ($sent as $sent_value) {
        $table.="<div class=\"outgoing_msg\">";
        $table.="<div class=\"sent_msg\">";
        $table.="<p>$sent_value->message</p>";
        $table.="<span class=\"time_date\"> 11:01 AM    |    June 9</span>";
        $table.="</div>";
        $table.="</div>";
       
     }
       $table.="</div>";
        echo $table;

    
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
        //
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
