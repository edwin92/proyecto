<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('int_events', function (Blueprint $table) {
            $table->increments('id');
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_interes_int_events')->unsigned();
            $table->integer('id_event_int_events')->unsigned();
            $table->foreign('id_interes_int_events')
                  ->references('id')->on('intereses')
                  ->onDelete('cascade');
            $table->foreign('id_event_int_events')
                  ->references('id')->on('events')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('int_events');
    }
}
