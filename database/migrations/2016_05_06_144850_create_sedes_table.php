<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sede', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('direccion');
            $table->string('referencia');
            $table->string('nombre_contacto');
            $table->integer('capacidad_maxima');
            $table->integer('capacidad_socio');
            $table->integer('maximo_actual'); //sorry grupo de victor si ven esto tomé posesión de sus tablas. [Necesito esto para controlar el aforo]
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
        Schema::drop('sede');
    }
}
