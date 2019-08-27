<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_crew');
            $table->string('ticket_room');
            $table->string('ticket_desc');
            $table->string('ticket_type');
            $table->string('ticket_assign')->nullable();
            $table->string('ticket_status')->nullable();
            $table->string('ticket_priority')->nullable();
            $table->string('ticket_due')->nullable();
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
        Schema::dropIfExists('tb_tickets');
    }
}
