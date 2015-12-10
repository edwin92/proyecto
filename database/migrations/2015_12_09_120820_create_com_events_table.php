<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->date('date');
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_user_com_events')->unsigned();
            $table->integer('id_event_com_events')->unsigned();
            $table->foreign('id_user_com_events')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('id_event_com_events')
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
        Schema::drop('com_events');
    }
}
