<?php

namespace Horsefly;

use Illuminate\Database\Eloquent\Model;

class DesignationModel extends Model
{
    protected $table="designation";
    protected $primaryKey="designation_id";
    protected $fillable=['department','designation_name','designation_description','designation_status','designation_id'];
    public function rules()
    {
    	return [
                 'department'=>'required',
                 'designation_name'=>"required|unique:designation",
                 'designation_description'=>'required',
                 'designation_status'=>'required'
    	       ];
    }
}
