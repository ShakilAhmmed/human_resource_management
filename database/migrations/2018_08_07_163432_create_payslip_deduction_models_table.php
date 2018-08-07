<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayslipDeductionModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslip_deduction_tbl', function (Blueprint $table) {
            $table->increments('payslip_deduction_id');
            $table->string('payslip_id');
            $table->string('deductions_type');
            $table->string('deductions_amount');
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
        Schema::dropIfExists('payslip_deduction_tbl');
    }
}
