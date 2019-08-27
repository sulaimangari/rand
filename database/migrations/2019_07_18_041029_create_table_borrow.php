<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBorrow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_borrow_device', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user')->nullable();
            $table->string('crew_name');
            $table->integer('device_id');
            $table->foreign('device_id')
                ->references('id')->on('tb_device')
                ->onDelete('cascade')
                ->onUpdate('no action');
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
        Schema::dropIfExists('tb_borrow_device');
    }
}
