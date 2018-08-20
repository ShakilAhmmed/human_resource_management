<?php

namespace Horsefly;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
     protected $table="tbl_task";
    protected $primaryKey="id";
    protected $fillable=['title','description','assign_to','start_date','end_date','estimated_hour','progress','status','id'];

    public function validate_data()
    {
    	return [
    	           'title'=>'required',
    	           'description'=>'required',
    	           'assign_to'=>'required',
    	           'start_date'=>'required',
    	           'end_date'=>'required',
    	           'estimated_hour'=>'required',
    	           'progress'=>'required',
    	           'status'=>'required'
    	       ];
    }
}


      