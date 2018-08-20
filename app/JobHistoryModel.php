<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobHistoryModel extends Model
{
    protected $table="employee_job_history";
    protected $primaryKey="employee_job_history_id";
    protected $fillable=['company_name','job_department','designation','start_date','end_date','employee_job_history_id'];
    public function job_history_rules()
    {
    	return [
                 'company_name'=>'required',
                 'job_department'=>'required',
                 'designation'=>'required',
                 'start_date'=>'required',
                 'end_date'=>'required'
    	      ];
    }
}
