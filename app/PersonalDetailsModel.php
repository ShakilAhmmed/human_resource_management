<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDetailsModel extends Model
{
    protected $table="employee_personal_details";
    protected $primaryKey="employee_personal_details_id";
    protected $fillable=['name','father_name','date_of_bith','gender','phone','present_address','permanent_address','nationality','marital_status','profile_image','employee_personal_details_id'];
    public function personal_rules()
    {
    	return [
                 'name'=>'required',
                 'father_name'=>'required',
                 'date_of_bith'=>'required',
                 'gender'=>'required',
                 'phone'=>'required',
                 'present_address'=>'required',
                 'permanent_address'=>'required',
                 'nationality'=>'required',
                 'marital_status'=>'required',
                 'profile_image'=>'required'
    	       ];
    }
}
