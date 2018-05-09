<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HolidayModel extends Model
{
    protected $table="holiday";
    protected $primaryKey="id";
    protected $fillable=['occassion','description','date','status'];

    public function holiday()
    {
    	return [
    				'occassion'=>'required',
    				'description'=>'required',
    				'date'=>'required',
    				'status'=>'required'
    	       ];
    }
}
