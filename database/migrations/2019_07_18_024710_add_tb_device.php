<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTbDevice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_device', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_name');
            $table->string('device_type');
            $table->string('device_specs');
            $table->string('device_location');
            $table->string('device_in');
            $table->integer('device_status');
            $table->string('device_code');
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
        Schema::dropIfExists('tb_device');
    }
}
