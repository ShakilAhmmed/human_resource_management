<?php

namespace Horsefly\Http\Controllers;

use Illuminate\Http\Request;
use Horsefly\CompanyDetailsModel;
use Horsefly\PersonalDetailsModel;
use Horsefly\LeaveTypeModel;
use Horsefly\LeaveModel;
use Validator;
use Session;
use SoapClient;


class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave=LeaveTypeModel::all();
        $data=LeaveModel::all();
       return view('Admin.Leave.leave',['leave'=>$leave,'data'=>$data]);
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
       $leave_model=new LeaveModel;
       $validation=Validator::make($request->all(),$leave_model->rules());
       if($validation->fails())
       {
           return back()->withInput()->withErrors($validation);
       }
       else
       {
           $requested_data=$request->all();
           $requested_data=array_add($requested_data,'id',time());
           $leave_model->fill($requested_data)->save();
           // if($request->status=='Active'):
           //    $this->notice($request->employee_phone,"Your Leave Request Accepted");
           // else:
           //     $this->notice($request->employee_phone,"Your Leave Request On Pending");
           // endif;
           Session::flash('success','Leave Added Successfully');
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
        //dd($id);
        $leave_data=LeaveModel::where('id',$id)->first();
        //eave_data);
        if($leave_data->status=='Active')
        {
           $leave_data->update(['status'=>'Inactive']);
        }
        else
        {
           $leave_data->update(['status'=>'Active']);
        }

        Session::flash('success','Successfully Changes Status');
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

        $leave=LeaveTypeModel::all();
        $edit_data=LeaveModel::findorFail($id);
        return view('Admin.Leave.Edit.leave_edit',['edit_data'=>$edit_data,'leave'=>$leave]);
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

        LeaveModel::where('id',$id)->first()->fill($request->all())->save();
        Session::flash('success','Updated Successfully');
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
       LeaveModel::where('id',$id)->delete();
       Session::flash('success','Successfully Deleted');
       return back();
    }

    public function get_employee_data(Request $request)
    {
        return CompanyDetailsModel::join('employee_personal_details','employee_personal_details.employee_personal_details_id','=','employee_company_details.employee_personal_details_id')
                                    ->where('employee_company_details.employee_code',$request->employee_code)
                                    ->first();
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
