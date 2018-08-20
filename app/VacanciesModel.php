<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacanciesModel extends Model
{
   protected $table="tbl_vacancies";
    protected $primaryKey="id";
    protected $fillable=['department_name','position_name','job_title','number_of_vacation','details','last_date_of','status'];

    public function validation()
    {
    	return [
    	           'department_name'=>'required',
    	           'position_name'=>'required',
    	           'job_title'=>'required',
    	           'number_of_vacation'=>'required',
    	           'details'=>'required',
    	           'last_date_of'=>'required',
    	           'status'=>'required'
    	       ];
    }
}
