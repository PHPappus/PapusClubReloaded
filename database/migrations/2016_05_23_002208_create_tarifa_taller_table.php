<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifaTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifataller', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taller_id')->unsigned()->nullable();
            $table->integer('tipo_persona_id')->unsigned()->nullable();
            $table->dateTime('fecha_registro');
            $table->double('precio');
            $table->string('estado');
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
        Schema::drop('tarifataller');
    }
}
