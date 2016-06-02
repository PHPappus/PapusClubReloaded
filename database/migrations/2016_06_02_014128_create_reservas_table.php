<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_reserva');
            $table->integer('sede_id')->unsigned()->nullable();
            $table->integer('ambiente_id')->unsigned()->nullable();
            $table->integer('persona_id')->unsigned()->nullable();
            $table->doubleval('precio');
            $table->string('estadoReserva');//es el estado en que se encuentra la reserva,no el registro reserva en la DB
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
        //
    }
}
