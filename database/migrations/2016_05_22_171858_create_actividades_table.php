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
            $table->string('nombre');
            $table->string('tipo_actividad');
            $table->string('capacidad_maxima');
            $table->string('descripcion');
            $table->integer('cant_ambientes');
            $table->boolean('estado');
            $table->dateTime('a_realizarse_en');
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
