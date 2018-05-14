<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeBoardModel extends Model
{
    protected $table="notice_board";
    protected $primaryKey="notice_board_id";
    protected $fillable=['title','subject','author','to','notice','notice_board_id'];

    public function rules()
    {
    	return [
                 'title'=>'required',
                 'subject'=>'required',
                 'author'=>'required',
                 'to'=>'required',
                 'notice'=>'required'
    	       ];
    }


}
