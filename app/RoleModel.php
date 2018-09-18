<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table="roles";
    protected $primarykey="id";
    protected $fillable=['name','display_name','description'];

    public function role()
    {
    	return [
    		     'display_name'=>"required",
    		     'description'=>'required'
    	];
    }
}
