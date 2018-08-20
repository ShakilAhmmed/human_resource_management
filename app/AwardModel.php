<?php

namespace Horsefly;

use Illuminate\Database\Eloquent\Model;

class AwardModel extends Model
{
    protected $table="award";
    protected $primaryKey="award_id";
    protected $fillable=['award_name','gift','amount','employee','award_id'];

    public function rules()
    {
        return [
                 'award_name'=>'required',
                 'gift'=>'required',
                 'amount'=>'required',
                 'employee'=>'required'

               ];
    }
}
