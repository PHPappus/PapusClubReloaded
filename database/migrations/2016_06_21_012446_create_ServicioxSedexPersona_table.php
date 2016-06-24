<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioxSedexPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicioxsedexpersona', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('id_servicio');
            $table->integer('id_sede');
            $table->integer('id_persona');
            $table->double('precio');
            $table->date('fecha_registro');
            $table->integer('calificacion');
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
        Schema::drop('ServicioxSedexPersona');
    }
}
