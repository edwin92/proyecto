<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('int_users', function (Blueprint $table) {
            $table->increments('id');            
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_user')->unsigned();
            $table->integer('id_interes')->unsigned();
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('id_interes')
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
        Schema::drop('int_users');
    }
}
