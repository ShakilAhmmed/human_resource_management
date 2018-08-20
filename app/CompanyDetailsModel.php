<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetailsModel extends Model
{
    protected $table="employee_company_details";
    protected $primaryKey="employee_company_details_id";
    protected $fillable=['employee_code','department','designation_name','date_of_joining','joining_sallary','shift','status','employee_company_details_id'];

    public function company_details_rules()
    {
       return [

                'employee_code'=>'required|unique:employee_company_details',
                'department'=>'required',
                'designation_name'=>'required',
                'date_of_joining'=>'required',
                'joining_sallary'=>'required',
                'shift'=>'required',
                'status'=>'required'
              ];

    }
}
