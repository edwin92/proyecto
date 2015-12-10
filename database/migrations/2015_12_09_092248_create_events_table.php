<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');
            $table->date('date');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
            $table->SoftDeletes();
            $table->integer('id_user_event')->unsigned();
            $table->integer('id_interes_event')->unsigned();
            $table->foreign('id_user_event')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('id_interes_event')
                  ->references('id')->on('intereses')
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
        Schema::drop('events');
    }
}
