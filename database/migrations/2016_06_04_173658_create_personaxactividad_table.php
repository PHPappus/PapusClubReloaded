<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaxactividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_persona', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned()->nullable();
            $table->integer('actividad_id')->unsigned()->nullable();
            $table->integer('calificacion_id')->unsigned()->nullable();
            $table->float('precio');
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
        Schema::drop('actividad_persona');
    }
}
