<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayslipBasicModel extends Model
{
   protected $table="payslip_basic_tbl";
    protected $primaryKey="payslip_id";
    protected $fillable=['department','employee_name','month','year','basic','allowances','deductions','net_salary','status','payslip_id'];
    public function validate_rules()
    {
    	return [
                 'department'=>'required',
                 'employee_name'=>'required',
                 'month'=>'required',
                 'year'=>'required',
                 'basic'=>'required',
                 'allowances'=>'required',
                 'deductions'=>'required',
                 'net_salary'=>'required',
                 'status'=>'required'
    	      ];
    }
}

