<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessengingModel extends Model
{
    protected $table="messenging";
    protected $primaryKey="messenging_id";
    protected $fillable=['from_id','to_id','message','messenging_id'];
    public function rules()
    {
    	return [
                  'message'=>'required'
    	       ];
    }
}
