<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission_role_model extends Model
{
    protected $fillable=['permission_id','role_id'];
    protected $table='permission_role';
    protected $primaryKey='role_id';
}
