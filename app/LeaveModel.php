<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LeaveModel extends Model
{
    use SoftDeletes;
    protected $table="leave";
    protected $primaryKey="id";
    protected $dates = ['deleted_at'];
    protected $fillable=['employee_code','leave_type','from_date','to_date','reason','status','id'];

    public function rules()
    {
    	return [
    				'employee_code'=>'required',
    				'leave_type'=>'required',
    				'from_date'=>'required',
    				'to_date'=>'required',
    				'reason'=>'required',
    				'status'=>'required'
    	];
    }
}
