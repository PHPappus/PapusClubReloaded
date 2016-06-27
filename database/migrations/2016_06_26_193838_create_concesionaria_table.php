<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcesionariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('concesionaria',function (Blueprint $table){
            //Estos son los atributos que estaban en el caso de uso
            $table->increments('id');
            $table->integer('sede_id')->unsigned()->index('concesionaria_sede_id_foreign');
            $table->string('nombre');
            $table->biginteger('ruc');
            $table->integer('telefono');
            $table->string('correo');
            $table->text('direccion');
            $table->string('nombre_responsable');
            $table->integer('estado');            
            $table->integer('tipo_concesionaria');
            $table->date('fecha_inicio_concesion');
            $table->date('fecha_fin_concesion');
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
        Schema::drop('concesionaria');
    }
}
