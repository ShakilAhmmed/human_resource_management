<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveModel extends Model
{
    protected $table="leave";
    protected $primaryKey="id";
    protected $fillable=['employee_code','employee_name','phone_number','address','leave_type','from_date','to_date','reason','status'];

    public function validate_data()
    {
    	return [
    				'employee_code'=>'required',
    				'employee_name'=>'required',
                    'phone_number'=>'required',
                    'address'=>'required',
    				'leave_type'=>'required',
    				'from_date'=>'required',
    				'to_date'=>'required',
    				'reason'=>'required',
    				'status'=>'required'
    	];
    }
}
  