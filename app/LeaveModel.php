<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveModel extends Model
{
    protected $table="leave";
    protected $primaryKey="id";
    protected $fillable=['employee_id','all_information','leave_type','from_date','to_date','reason','status'];

    public function leave()
    {
    	return [
    				'employee_id'=>'required',
    				'all_information'=>'required',
    				'leave_type'=>'required',
    				'from_date'=>'required',
    				'to_date'=>'required',
    				'reason'=>'required',
    				'status'=>'required'
    	];
    }
}
