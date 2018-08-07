<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayslipAllowanceModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslip_allowance_tbl', function (Blueprint $table) {
            $table->increments('payslip_allowance_id');
            $table->string('payslip_id');
            $table->string('allowances_type');
            $table->string('allowances_amount');
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
        Schema::dropIfExists('payslip_allowance_tbl');
    }
}
