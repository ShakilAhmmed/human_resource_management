<?php

namespace Horsefly;

use Illuminate\Database\Eloquent\Model;

class ApplicationsModel extends Model
{
     protected $table="tbl_applications";
    protected $primaryKey="id";
    protected $fillable=['application_name','email','phone','address','department_name','position_name','date','status'];

    public function validation()
    {
    	return [
    	           'application_name'=>'required',
    	           'email'=>'required',
    	           'phone'=>'required',
    	           'address'=>'required',
    	           'department_name'=>'required',
    	           'position_name'=>'required',
    	           'date'=>'required',
    	           'status'=>'required'
    	       ];
    }
}
   