<?php

namespace Horsefly;

use Illuminate\Database\Eloquent\Model;

class BankAccountDetailsModel extends Model
{
    protected $table="employee_bankaccount_details";
    protected $primaryKey="employee_bankaccount_details_id";
    protected $fillable=['account_holder_name','account_number','bank_name','branch_name','employee_bankaccount_details_id'];

    public function bank_account_details_rules()
    {
    	return [
                 'account_holder_name'=>'required',
                 'account_number'=>'required|unique:employee_bankaccount_details',
                 'bank_name'=>'required',
                 'branch_name'=>'required'
    	     ];
    }
}
