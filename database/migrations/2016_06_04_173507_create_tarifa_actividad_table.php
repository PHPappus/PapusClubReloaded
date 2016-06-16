<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifaActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifaactividad', function (Blueprint $table) {
            $table->integer('actividad_id')->unsigned()->nullable();
            $table->integer('tipo_persona_id')->unsigned()->nullable();
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
        Schema::drop('tarifaactividad');
    }
}
