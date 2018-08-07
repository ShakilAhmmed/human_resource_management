<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayslipAllowanceModel extends Model
{
     protected $table="payslip_allowance_tbl";
    protected $primaryKey="payslip_allowance_id";
    protected $fillable=['allowances_type','allowances_amount','payslip_id'];
    public function validate_rules()
    {
    	return [
                 'allowances_type'=>'required',
                 'allowances_amount'=>'required'
    	      ];
    }
}
