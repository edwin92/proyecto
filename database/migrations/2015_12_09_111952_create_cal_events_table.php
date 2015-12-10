<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cal_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qualification')->unsigned();
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_user_cal_events')->unsigned();
            $table->integer('id_event_cal_events')->unsigned();
            $table->foreign('id_user_cal_events')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('id_event_cal_events')
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
        Schema::drop('cal_events');
    }
}
