<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //for personal details
        Schema::create('employee_personal_details', function (Blueprint $table) {
            $table->increments('employee_personal_details_id');
            $table->string("name");
            $table->string("father_name");
            $table->string("date_of_bith");
            $table->string("gender");
            $table->string("phone");
            $table->text("present_address");
            $table->text("permanent_address");
            $table->string("nationality");
            $table->string("marital_status");
            $table->string("profile_image");
            $table->timestamps();
        });

         //for company details
         Schema::create('employee_company_details', function (Blueprint $table) {
            $table->increments('employee_company_details_id');
            $table->string("employee_personal_details_id");
            $table->string("employee_code");
            $table->string("department");
            $table->string("designation_name");
            $table->string("date_of_joining");
            $table->string("joining_sallary");
            $table->string("shift");
            $table->string("status");
            $table->timestamps();
        });


         //for bank account details
         Schema::create('employee_bankaccount_details', function (Blueprint $table) {
            $table->increments('employee_bankaccount_details_id');
            $table->string("employee_personal_details_id");
            $table->string("account_holder_name");
            $table->string("account_number");
            $table->string("bank_name");
            $table->string("branch_name");
            $table->timestamps();
        });


            //for login details
         Schema::create('employee_login_details', function (Blueprint $table) {
            $table->increments('employee_login_details_id');
            $table->string("employee_personal_details_id");
            $table->string("email");
            $table->string("password");
            $table->string("role");
            $table->timestamps();
        });


              //for job history
         Schema::create('employee_job_history', function (Blueprint $table) {
            $table->increments('employee_job_history_id');
            $table->string("employee_personal_details_id");
            $table->string("company_name");
            $table->string("job_department");
            $table->string("designation");
            $table->string("start_date");
            $table->string("end_date");
            $table->timestamps();
        });

                    //for documents
         Schema::create('employee_documents', function (Blueprint $table) {
            $table->increments('employee_documents_id');
            $table->string("employee_personal_details_id");
            $table->string("document_file_name");
            $table->string("document");
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_personal_details');
        Schema::dropIfExists('employee_company_details');
        Schema::dropIfExists('employee_bankaccount_details');
        Schema::dropIfExists('employee_login_details');
        Schema::dropIfExists('employee_job_history');
        Schema::dropIfExists('employee_documents');
    }
}
