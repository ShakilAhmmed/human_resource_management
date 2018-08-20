<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayslipDeductionModel extends Model
{
   protected $table="payslip_deduction_tbl";
    protected $primaryKey="payslip_deduction_id";
    protected $fillable=['deductions_type','deductions_amount','payslip_id'];
    public function validate_rules()
    {
    	return [
                 'deductions_type'=>'required',
                 'deductions_amount'=>'required'
    	      ];
    }
}
 