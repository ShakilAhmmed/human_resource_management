<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{

    
  protected $table="settings_tbl";
    protected $primaryKey="id";
    protected $fillable=['syestem_name','syestem_title','address','phone','system_email','language','purchase_code','logo','id'];
    public function validate_rules()
    {
    	return [
                 'syestem_name'=>'required',
                 'syestem_title'=>'required',
                 'address'=>'required',
                 'phone'=>'required',
                 'system_email'=>'required',
                 'language'=>'required',
                 'purchase_code'=>'required'
                

    	      ];
    }
}
 