<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cal_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qualification')->unsigned();
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_cal_org')->unsigned();
            $table->integer('id_cal_des')->unsigned();
            $table->foreign('id_cal_org')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('id_cal_des')
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
        Schema::drop('cal_users');
    }
}
