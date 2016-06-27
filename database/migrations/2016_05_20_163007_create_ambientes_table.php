<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambiente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sede_id')->unsigned()->nullable();
            $table->string('nombre');
            $table->string('tipo_ambiente');
            $table->string('capacidad_actual');
            $table->string('descripcion');
            $table->string('estado')->default('Activo');
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
        Schema::drop('ambiente');
    }
}
