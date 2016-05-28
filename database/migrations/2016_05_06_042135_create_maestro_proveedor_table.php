<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestroProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proveedor',function (Blueprint $table){
            //Estos son los atributos que estaban en el caso de uso
            $table->increments('id');
            $table->string('nombre_proveedor');
            $table->biginteger('ruc');
            $table->integer('telefono');
            $table->string('correo');
            $table->string('direccion');
			$table->string('nombre_responsable');
            $table->integer('estado');            
            $table->integer('id_tipo_proveedor');//Esta dentro de la tabla de configuracion
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
        Schema::drop('proveedor');
    }
}
