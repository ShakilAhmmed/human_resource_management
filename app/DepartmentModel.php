<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    protected $table="department";
    protected $primaryKey="id";
    protected $fillable=['department_name','description','status'];

    public function department()
    {
    	return [
    	           'department_name'=>'required',
    	           'description'=>'required',
    	           'status'=>'required'
    	       ];
    }
}
