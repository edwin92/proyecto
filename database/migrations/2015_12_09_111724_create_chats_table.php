<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_chat_org')->unsigned();
            $table->integer('id_chat_des')->unsigned();
            $table->foreign('id_chat_org')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('id_chat_des')
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
        Schema::drop('chats');
    }
}
