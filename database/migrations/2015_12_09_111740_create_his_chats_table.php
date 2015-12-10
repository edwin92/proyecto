<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHisChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('his_chats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->date('date');
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_chat_his')->unsigned();
            $table->foreign('id_chat_his')
                  ->references('id')->on('chats')
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
        Schema::drop('his_chats');
    }
}
