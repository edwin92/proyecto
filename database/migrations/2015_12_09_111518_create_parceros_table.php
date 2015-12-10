<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceros', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->SoftDeletes();
            $table->timestamps();
            $table->integer('id_parcero_org')->unsigned();
            $table->integer('id_parcero_des')->unsigned();
            $table->foreign('id_parcero_org')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('id_parcero_des')
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
        Schema::drop('parceros');
    }
}
