<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacion', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('persona_id')->unsigned()->index('facturacion_persona_id_foreign');
            $table->integer('reserva_id')->unsigned()->nullable();
            $table->integer('actividad_id')->unsigned()->nullable();
            $table->integer('taller_id')->unsigned()->nullable();
            $table->integer('servicio_id');
            $table->integer('sorteo_id')->unsigned()->nullable();
            $table->integer('traspaso_id')->unsigned()->nullable();
            $table->integer('multa_id')->unsigned()->nullable();
            $table->integer('numero_comprobante')->unsigned()->nullable();
            $table->double('total'); 
            $table->string('tipo_pago');                     
            $table->string('tipo_comprobante');
            $table->string('numero_pago');
            $table->string('descripcion'); 
            $table->string('estado');
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
        Schema::drop('facturacion');
    }
}
