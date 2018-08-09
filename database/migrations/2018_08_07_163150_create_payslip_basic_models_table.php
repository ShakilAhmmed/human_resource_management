<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayslipBasicModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslip_basic_tbl', function (Blueprint $table) {
            $table->increments('payslip_id');
            $table->text('department');
            $table->string('employee_name');
            $table->string('month');
            $table->string('year');
            $table->text('basic');
            $table->string('allowances');
            $table->string('deductions');
            $table->string('net_salary');
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
        Schema::dropIfExists('payslip_basic_tbl');
    }
}
