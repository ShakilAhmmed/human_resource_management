<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalDetailsModel;
use App\BankAccountDetailsModel;
use App\CompanyDetailsModel;
use App\LoginDetailsModel;
use App\JobHistoryModel;
use App\DocumentsModel;
use Validator;
use Session;
use File;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Employee.add_employee');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee_data=PersonalDetailsModel::join('employee_company_details','employee_company_details.employee_personal_details_id','=','employee_personal_details.employee_personal_details_id')
            ->join('employee_login_details','employee_login_details.employee_personal_details_id','=','employee_personal_details.employee_personal_details_id')
            ->get();
        return view('Admin.Employee.employee_list',['employee_data'=>$employee_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personal_details=new PersonalDetailsModel;
        $company_details =new CompanyDetailsModel;
        $bank_details    =new BankAccountDetailsModel;
        $login_details   =new LoginDetailsModel;
        
      $personal_details_validation=Validator::make($request->all(),$personal_details->personal_rules());
       $company_details_validation=Validator::make($request->all(),$company_details->company_details_rules());
      $bank_details_validation=Validator::make($request->all(),$bank_details->bank_account_details_rules());
      $login_details_validation=Validator::make($request->all(),$login_details->login_details_rules());



      if($personal_details_validation->fails() || $company_details_validation->fails() || $bank_details_validation->fails() || $login_details_validation->fails())
      {

        $validationMessages =array_merge_recursive(
            $personal_details_validation->messages()->toArray(), 
            $company_details_validation->messages()->toArray(),
            $bank_details_validation->messages()->toArray(),
            $login_details_validation->messages()->toArray());
        return back()->withInput()->withErrors($validationMessages);
      }
      else
      {
          $personal_details->employee_personal_details_id=time();
          $personal_details->name=$request->name;
          $personal_details->father_name=$request->father_name;
          $personal_details->date_of_bith=$request->date_of_bith;
          $personal_details->gender=$request->gender;
          $personal_details->phone=$request->phone;
          $personal_details->present_address=$request->present_address;
          $personal_details->permanent_address=$request->permanent_address;
          $personal_details->nationality=$request->nationality;
          $personal_details->marital_status=$request->marital_status;
          //personal details image

             if($request->hasfile('profile_image'))
                {

                    $filepath='admin_asset/backend/employee/';
                    $file_name=time()."."."jpg";
                    $personal_details->profile_image=$filepath.$file_name;
                    $request->file('profile_image')->move($filepath,$file_name);
                }
            $personal_details->save();
            //company deatils
            $company_details->employee_company_details_id=time();
            $company_details->employee_code=$request->employee_code;
            $company_details->employee_personal_details_id=time();
            $company_details->department=$request->department;
            $company_details->designation_name=$request->designation_name;
            $company_details->date_of_joining=$request->date_of_joining;
            $company_details->joining_sallary=$request->joining_sallary;
            $company_details->shift=$request->shift;
            $company_details->status=$request->status;
            $company_details->save();
            //bank details
             $bank_details->employee_bankaccount_details_id=time();
             $bank_details->employee_personal_details_id=time();
             $bank_details->account_holder_name=$request->account_holder_name;
             $bank_details->account_number=$request->account_number;
             $bank_details->bank_name=$request->bank_name;
             $bank_details->branch_name=$request->branch_name;
             $bank_details->save();
             //login details
             $login_details->employee_login_details_id=time();
             $login_details->employee_personal_details_id=time();
             $login_details->email=$request->email;
             $login_details->password=bcrypt($request->password);
             $login_details->role=$request->role;
             $login_details->save();
             //job history
             if(!empty($request->company_name)):
                 for($i=0;$i<count($request->company_name);$i++)
                 {
                    $job_history     =new JobHistoryModel;
                    $job_history->employee_job_history_id=time();
                    $job_history->employee_personal_details_id=time();
                    $job_history->company_name=$request->company_name[$i];
                    $job_history->job_department=$request->job_department[$i];
                    $job_history->designation=$request->designation[$i];
                    $job_history->start_date=$request->start_date[$i];
                    $job_history->end_date=$request->end_date[$i];
                    $job_history->save();
                 }
            endif;
             

             //documents
            if(!empty($request->document_file_name)):
                for($j=0;$j<count($request->document_file_name);$j++)
                  {
                      $documents       =new DocumentsModel;
                      $documents->employee_documents_id=time();
                      $documents->employee_personal_details_id=time();
                      $documents->document_file_name=$request->document_file_name[$j];
                     if(@$request->document[$j]):
                         $document_file_path="admin_asset/backend/employee/documents/";
                         $document_file=time()+$j.".jpg";
                         $documents->document=$document_file_path.$document_file;
                         $request->document[$j]->move($document_file_path,$document_file);
                     endif;
                     $documents->save();

                  }
           endif;


        Session::flash('success','New Employee Added Successfully');
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
        $employee_data=CompanyDetailsModel::find($id);
        if($employee_data->status=='Active'):
            $employee_data->update(['status'=>'Inactive']);
        else:
            $employee_data->update(['status'=>'Active']);
        endif;
        Session::flash('success','Employee Status Changed Successfully');
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
        $document_file_name="admin_asset/backend/employee/documents/".$id.".jpg";
        $employee_file_name="admin_asset/backend/employee/".$id.".jpg";

        PersonalDetailsModel::where('employee_personal_details_id',$id)->delete();
        CompanyDetailsModel::where('employee_personal_details_id',$id)->delete();
        LoginDetailsModel::where('employee_personal_details_id',$id)->delete();
        BankAccountDetailsModel::where('employee_personal_details_id',$id)->delete();
        JobHistoryModel::where('employee_personal_details_id',$id)->delete();
        DocumentsModel::where('employee_personal_details_id',$id)->delete();

        File::delete($document_file_name);
        File::delete($employee_file_name);

        Session::flash('success','Employee Deleted Successfully');
        return back();
    }
}
