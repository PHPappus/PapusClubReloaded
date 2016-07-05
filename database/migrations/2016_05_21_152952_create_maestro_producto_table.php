<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestroProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('producto',function (Blueprint $table){
            //Estos son los atributos que estaban en el caso de uso
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('estado');
            $table->string('tipo_producto'); //¿Esta dentro de la tabla de configuracion?
            $table->integer('stock');
            $table->timestamps();
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
        //

        Schema::drop('producto');

    }
}
