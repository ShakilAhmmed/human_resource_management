<?php

namespace Horsefly;

use Illuminate\Database\Eloquent\Model;

class AttendanceModel extends Model
{
    protected $table="attendance_tbl";
    protected $primaryKey="attendance_id";
    protected $fillable=['department_name','date','time','employee_code','status','attendance_id'];

    public function company_details_rules()
    {
       return [

                'date'=>'required',
                'department_name'=>'required',
                'employee_code'=>'required'
              ];

    }
}
