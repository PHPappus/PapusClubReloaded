<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTarifaFamiliar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifafamiliar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_membresia_id')->unsigned()->nullable();
            $table->integer('tipo_familia_id')->unsigned()->nullable();
            $table->double('monto');
            $table->date('fecha_registro');
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
        Schema::drop('tarifafamiliar');
    }
}
