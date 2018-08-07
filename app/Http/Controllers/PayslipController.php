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
        //
    }
}
