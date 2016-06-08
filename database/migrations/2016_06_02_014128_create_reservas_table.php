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
       Schema::create('reserva', function (Blueprint $table) {
            $table->increments('id');
            //$table->date('fecha_inicio_reserva');
            //$table->date('fecha_fin_reserva');
            //$table->time('hora_inicio_reserva');
            //$table->time('hora_fin_reserva');
            $table->integer('ambiente_id')->unsigned()->nullable();
            $table->integer('id_persona')->unsigned()->nullable();
            //$table->integer('precio');
            //$table->string('estadoReserva');//es el estado en que se encuentra la reserva,no el registro reserva en la DB
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
         Schema::drop('reserva');
    }
}
