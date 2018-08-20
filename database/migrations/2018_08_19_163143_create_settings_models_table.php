<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('settings_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('syestem_name');
            $table->string('syestem_title');
            $table->string('address');
            $table->string('phone');
            $table->string('system_email');
            $table->string('language');
            $table->string('purchase_code');
            $table->string('logo');
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
        Schema::dropIfExists('settings_tbl');
    }
}
