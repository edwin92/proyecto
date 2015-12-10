<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_events', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('dato');
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_img_events')->unsigned();
            $table->foreign('id_img_events')
                  ->references('id')->on('users')
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
        Schema::drop('img_events');
    }
}
