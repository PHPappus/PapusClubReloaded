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
            $table->integer('multa_id')->unsigned()->nullable();
            $table->integer('socio_id')->unsigned()->nullable();
            $table->double('multa_modificada');
            $table->string('descripcion_detallada');
            $table->date('fecha_registro');
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
        Schema::drop('multaxpersona');
    }
}
