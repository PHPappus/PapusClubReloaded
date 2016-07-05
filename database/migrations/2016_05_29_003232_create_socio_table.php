<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado')->default(true);
            $table->integer('tipo_membresia_id')->unsigned()->nullable();
            $table->integer('postulante_id')->unsigned()->nullable();
            $table->date('fecha_ingreso');
            $table->integer('numInvitadosMes')->default(0);
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
        Schema::drop('socio');
    }
}
