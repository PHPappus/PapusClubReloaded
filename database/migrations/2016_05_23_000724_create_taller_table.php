<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reserva_id')->unsigned()->index();
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('vacantes');
            $table->dateTime('fecha_inicio_inscripciones');
            $table->dateTime('fecha_fin_inscripciones');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->integer('cantidad_sesiones');
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
        Schema::drop('taller');
    }
}
