<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
class Role extends EntrustRole
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
