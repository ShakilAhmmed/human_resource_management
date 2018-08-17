<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentModel;
use App\CompanyDetailsModel;
use App\PersonalDetailsModel;
use App\PayslipBasicModel;
use App\PayslipAllowanceModel;
use App\PayslipDeductionModel;
use Session;
use Validator;
class PayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=DepartmentModel::all();
        return view('Admin.Payslip.payslip',['department'=>$department]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      $basic_data=PayslipBasicModel::all();

          return view('Admin.Payslip.payslip_report',['all_data'=>$basic_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $basic_model=new PayslipBasicModel;
        $allowances_model=new PayslipAllowanceModel;
        $deduction_model=new PayslipDeductionModel;
        $basic_validate=Validator::make($request->all(),$basic_model->validate_rules());
        $allowances_validate=Validator::make($request->all(),$allowances_model->validate_rules());
        $deduction_validate=Validator::make($request->all(),$deduction_model->validate_rules());

      if($basic_validate->fails() || $allowances_validate->fails() || $deduction_validate->fails())
      {

        $validationMessages =array_merge_recursive(
            $basic_validate->messages()->toArray(), 
            $allowances_validate->messages()->toArray(),
            $deduction_validate->messages()->toArray());
        
            
        return back()->withInput()->withErrors($validationMessages);
      }
      else
      {
        $request_data=$request->all();
        $basic_model->fill($request_data)->save();
           
           $count_allowance=count($request->allowances_amount);
           for($i=0;$i<$count_allowance;$i++)
           {
            $allowances=new PayslipAllowanceModel;
            $allowances->payslip_id=$request->payslip_id;
            $allowances->allowances_type=$request->allowances_type[$i];
            $allowances->allowances_amount=$request->allowances_amount[$i];
            $allowances->save();
           }
           
          $count_deductions=count($request->deductions_amount);
           for($j=0;$j<$count_deductions;$j++)
           {
            $deductions=new PayslipDeductionModel;
            $deductions->payslip_id=$request->payslip_id;
            $deductions->deductions_type=$request->deductions_type[$j];
            $deductions->deductions_amount=$request->deductions_amount[$j];
            $deductions->save();
           }

             

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
        $status_data=PayslipBasicModel::where('payslip_id',$id)->first();
        if($status_data->status=='Paid')
        {
           $status_data->update(['status'=>'Unpaid']);
        }
        else
        {
         $status_data->update(['status'=>'Paid']);
        }
          Session::flash('success','Status Update SuccessFully');
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
           $department=DepartmentModel::all();
        $basicdata=PayslipBasicModel::where('payslip_id',$id)->first();
        $allowances=PayslipAllowanceModel::where('payslip_id',$id)->get();
        $deductions=PayslipDeductionModel::where('payslip_id',$id)->get();
        return view('Admin.Payslip.Edit.payslip_edit',['basic_data'=>$basicdata,'allowances_data'=>$allowances,'deductions_data'=>$deductions,'department'=>$department]);
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
        
        // echo $id;
        $basic_model=new PayslipBasicModel;
        $allowances_model=new PayslipAllowanceModel;
        $deduction_model=new PayslipDeductionModel;
        $basic_validate=Validator::make($request->all(),$basic_model->validate_rules());
        $allowances_validate=Validator::make($request->all(),$allowances_model->validate_rules());
        $deduction_validate=Validator::make($request->all(),$deduction_model->validate_rules());

      if($basic_validate->fails() || $allowances_validate->fails() || $deduction_validate->fails())
      {

          $validationMessages =array_merge_recursive(
            $basic_validate->messages()->toArray(), 
            $allowances_validate->messages()->toArray(),
            $deduction_validate->messages()->toArray());
        
            
        return back()->withInput()->withErrors($validationMessages);
      }
      else
      {
       
         PayslipBasicModel::where('payslip_id',$id)->first()->fill($request->all())->save();
          $count_allowance=count($request->allowances_type);
          $count_id=count($request->payslip_allowance_id);
           for($i=0;$i<$count_allowance;$i++)
          {
           
       
              $allowance_id=$request->payslip_allowance_id[$i];
              $allowance_details=PayslipAllowanceModel::where('payslip_allowance_id',$allowance_id)->first();
              if($allowance_details)
              {
                 $allowance_details->update([
                  'allowances_type'=>$request->allowances_type[$i],
                  'allowances_amount'=>$request->allowances_amount[$i]
                  ]);
              }
              else
              {
                  $allowances=new PayslipAllowanceModel;
                  $allowances->payslip_id=$id;
                  $allowances->allowances_type=$request->allowances_type[$i];
                  $allowances->allowances_amount=$request->allowances_amount[$i];
                  $allowances->save();
              }          
          }
          $count_deductions=count($request->deductions_amount);
          
           for($j=0;$j<$count_deductions;$j++)
          {
           
       
              $deduction_id=$request->payslip_deduction_id[$j];
              $allowance_details=PayslipDeductionModel::where('payslip_deduction_id',$deduction_id)->first();
              if($allowance_details)
              {
                 $allowance_details->update([
                  'deductions_type'=>$request->deductions_type[$j],
                  'deductions_amount'=>$request->deductions_amount[$j]
                  ]);
              }
              else
              {
                  $allowances=new PayslipDeductionModel;
                  $allowances->payslip_id=$id;
                  $allowances->deductions_type=$request->deductions_type[$j];
                  $allowances->deductions_amount=$request->deductions_amount[$j];
                  $allowances->save();
              }          
          }
           
           
      }

             

         Session::flash('success','SuccessFully Inserted');
         return back();
           
    }

     public function employee(Request $request)
     {
         return PersonalDetailsModel::join('employee_company_details','employee_personal_details.employee_personal_details_id','=','employee_company_details.employee_personal_details_id')
                                    ->where('employee_company_details.department',$request->department_name)
                                    ->get();
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_basic=PayslipBasicModel::where('payslip_id',$id)->delete();
        $delete_allowance=PayslipAllowanceModel::where('payslip_id',$id)->delete();
        $delete_deduction=PayslipDeductionModel::where('payslip_id',$id)->delete();
        Session::flash('success','Deleted SuccessFully');
        return back();
    }
    public function preview($id)
    {
      $allowance_data=PayslipAllowanceModel::where('payslip_id',$id)->get();
       $deductions_data=PayslipDeductionModel::where('payslip_id',$id)->get();
       $basic_data=PayslipBasicModel::where('payslip_id',$id)->first();
        return view('Admin.Payslip.Edit.payslip_view',['basic_data'=>$basic_data,'allowance_data'=>$allowance_data,'deductions_data'=>$deductions_data]);
    }
}
