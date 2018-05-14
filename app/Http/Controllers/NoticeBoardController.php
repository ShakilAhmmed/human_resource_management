<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalDetailsModel;
use App\NoticeBoardModel;
use App\LoginDetailsModel;
use App\Mail\Notice;
use Session;
use Validator;
use Twilio\Rest\Client;
class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal_details=PersonalDetailsModel::all();
        return view('Admin.Notice.notice',['personal_details'=>$personal_details]);
    }

    public function personal_details(Request $request)
    {
       return PersonalDetailsModel::join('employee_login_details','employee_login_details.employee_personal_details_id','=','employee_personal_details.employee_personal_details_id')
          ->where('employee_personal_details.employee_personal_details_id',$request->id)
          ->first();
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
        $notice_board=new NoticeBoardModel;
        $validation=Validator::make($request->all(),$notice_board->rules());
        if($validation->fails())
        {
            return  back()->withInput()->withErrors($validation);
        }
        else
        {
            $request_data=$request->all();
            $request_data=array_add($request_data,'notice_board_id',time());
            $notice_board->fill($request_data)->save();

            $mail=LoginDetailsModel::where('employee_personal_details_id',$request->to)->first();



            \Mail::to($mail)->send(new Notice($notice_board));
            Session::flash('success','Notice Sent Successfully');
            return back();
        }

        //$this->notice();

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

    public function notice()
    {


            // Your Account Sid and Auth Token from twilio.com/console
            // $sid    = "AC01cb907e21231a531aa6301bb56e7a87";
            // $token  = "0db6ef16a6d074f8ec6bec08bc561a1a";
            // $twilio = new Client($sid, $token);

            // $message = $twilio->messages
            //                   ->create("+15558675310",
            //                            array(
            //                                'body' => "Let's grab lunch at Milliways tomorrow!",
            //                                'from' => "+14158141829",
            //                                'mediaUrl' => "http://www.example.com/cheeseburger.png"
            //                            )
            //                   );

            // print($message.sid);


    }
}
