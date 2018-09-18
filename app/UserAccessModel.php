<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccessModel extends Model
{
   protected $fillable=['user_id','role_id'];
   // protected $primaryKey='id';
   protected $table='role_user';
   public function validate_data()
    {
    	return [
                 'user_id'=>'required',
                 'role_id'=>'required'
    	      ];
    }
}
