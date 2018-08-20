<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table="admin";
    protected $primarykey="id";
    protected $fillable=['admin_name','admin_email','password','status'];

    public function admin()
    {
    	return [
    				'admin_name'=>'required',
    				'admin_email'=>'required|unique:admin',
    				'password'=>'required',
    				'status'=>'required'
    	];
    }

}
