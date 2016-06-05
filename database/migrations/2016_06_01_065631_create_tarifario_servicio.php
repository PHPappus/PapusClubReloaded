<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifarioServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifarioservicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idservicio');
            $table->integer('idtipopersona');
            $table->string('descripcionparafecha');
            $table->double('precio');
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tarifarioservicios');
    }
}
