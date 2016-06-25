<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultaxpersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multaxpersona', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('multa_id')->unsigned()->index();
            $table->integer('socio_id')->unsigned()->index();
            $table->double('multa_modificada');
            $table->string('descripcion_detallada');
            $table->date('fecha_registro');
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
        Schema::drop('multaxpersona');
    }
}
