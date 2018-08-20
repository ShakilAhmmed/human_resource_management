<?php

namespace Horsefly;

use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
  protected $table="expense";
  protected $primaryKey="id";
  protected $fillable=['expense_title','description','amount','date','status'];

  public function expense()
  {
  	return [
  	           'expense_title'=>'required',
  	           'description'=>'required',
  	           'amount'=>'required',
  	           'date'=>'required',
  	           'status'=>'required'
  	       ];
  }
}
