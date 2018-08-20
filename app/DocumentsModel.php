<?php

namespace Horsefly;

use Illuminate\Database\Eloquent\Model;

class DocumentsModel extends Model
{
    protected $table="employee_documents";
    protected $primaryKey="employee_documents_id";
    protected $fillable=['document_file_name','document','employee_documents_id'];
    public function document_rules()
    {
    	return [
                  'document_file_name'=>'required',
                  'document'=>'required'
    	       ];
    }
}
