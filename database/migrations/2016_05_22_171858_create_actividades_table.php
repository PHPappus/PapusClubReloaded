<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ambiente_id')->unsigned()->nullable();
            $table->integer('reserva_id')->unsigned()->nullable();
            $table->string('nombre');
            $table->string('tipo_actividad');
            $table->float('precio_especial_bungalow');
            $table->string('capacidad_maxima');
            $table->string('descripcion');
            $table->integer('cupos_disponibles');
            $table->boolean('estado');
            $table->date('a_realizarse_en');
            $table->time('hora_inicio');
            $table->softDeletes();
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
        Schema::drop('actividad');
    }
}
