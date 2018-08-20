<?php

namespace Horsefly\Http\Controllers;

use Illuminate\Http\Request;
use Horsefly\PersonalDetailsModel;
use Horsefly\NoticeBoardModel;
use Horsefly\LoginDetailsModel;
use Horsefly\Mail\Notice;
use Session;
use Validator;
use SoapClient;
//use Twilio\Rest\Client;
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
        $notice_board=NoticeBoardModel::all();
        return view('Admin.Notice.notice',['personal_details'=>$personal_details,'notice_board'=>$notice_board]);
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

            if($request->type=='Individual'):
                $this->notice($request->phone,$request->notice);
                \Mail::to($mail)->send(new Notice($notice_board));
            else:
                $mail_all=LoginDetailsModel::all();
                foreach ($mail_all as $mailto):
                     \Mail::to($mailto)->send(new Notice($notice_board));
                endforeach;
            endif;

                Session::flash('success','Notice Sent Successfully');
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
        NoticeBoardModel::findOrFail($id)->delete();
        Session::flash('success','Notice Deleted Successfully');
        return back();
    }

    public function notice($phone,$message)
    {
                            
         try{
             $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
             $paramArray = array(
             'userName' => "01833255734",
             'userPassword' => "12710",
             'mobileNumber' => $phone,
             'smsText' => $message,
             'type' => "TEXT",
             'maskName' => '',
             'campaignName' => '',
             );
             $value = $soapClient->__call("OneToOne", array($paramArray));
             echo $value->OneToOneResult;
            } 
         catch (Exception $e) {
             echo $e->getMessage();
            }

            //    // Your Account SID and Auth Token from twilio.com/console
            // $sid = 'AC01cb907e21231a531aa6301bb56e7a87';
            // $token = '0db6ef16a6d074f8ec6bec08bc561a1a';
            // $client = new Client($sid, $token);

            // // Use the client to do fun stuff like send text messages!
            // $client->messages->create(
            //     // the number you'd like to send the message to
            //     '+8801849942053',
            //     array(
            //         // A Twilio phone number you purchased at twilio.com/console
            //         'from' => '+18644794710',
            //         // the body of the text message you'd like to send
            //         'body' => 'Hey Jenny! Good luck on the bar exam!'
            //     )
            // );

    }
}
