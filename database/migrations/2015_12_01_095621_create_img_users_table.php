<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_users', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('dato');
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_perfil')->unsigned();
            $table->foreign('id_perfil')
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
        Schema::drop('img_users');
    }
}
