<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveTypeModel extends Model
{
   protected $table="leavetype";
   protected $primaryKey="id";
   protected $fillable=['leave_type_name','description','status'];

   public function leavetype()
   {
   	return [
   				'leave_type_name'=>'required',
   				'description'=>'required',
   				'status'=>'required'
   		   ];
   }
}
