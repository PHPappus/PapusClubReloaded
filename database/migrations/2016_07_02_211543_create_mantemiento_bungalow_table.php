<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantemientoBungalowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientobungalow',function (Blueprint $table){

            $table->increments('id');
            $table->integer('id_bungalow');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::drop('mantenimientobungalow');
    }
}
