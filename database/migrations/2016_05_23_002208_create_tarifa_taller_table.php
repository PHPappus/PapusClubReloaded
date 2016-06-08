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
            $table->integer('taller_id')->unsigned()->index();
            $table->integer('tipo_persona_id')->unsigned()->index();
            $table->dateTime('fecha_registro');
            $table->integer('precios');
            $table->boolean('estado')->default(TRUE);
            $table->softDeletes();
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
