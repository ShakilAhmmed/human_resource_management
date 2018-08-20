<?php

namespace Horsefly;

use Illuminate\Database\Eloquent\Model;

class LoginDetailsModel extends Model
{
    protected $table="employee_login_details";
    protected $primaryKey="employee_login_details_id";
    protected $fillable=['email','password','role','employee_login_details_id'];
    public function login_details_rules()
    {
    	return [
                'email'=>'required:unique:employee_login_details',
                'password'=>'required',
                'role'=>'required'
    	      ];
    }
}
