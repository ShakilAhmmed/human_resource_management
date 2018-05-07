<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department_name');
            $table->string('position_name');
            $table->string('job_title');
            $table->string('number_of_vacation');
            $table->text('details'); 
            $table->string('last_date_of');           
            $table->string('status');
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
        Schema::dropIfExists('tbl_vacancies');
    }
}
