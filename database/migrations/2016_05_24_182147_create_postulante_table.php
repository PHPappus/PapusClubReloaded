<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulante', function (Blueprint $table) {
            //DATOS PERSONALES
            
            $table->integer('id_postulante')->unsigned()->unique();


            $table->bigInteger('ruc'); //en caso lo tenga, no es necesario si no tiene
            //en la vista se tiene un checkbox de nacionalidad
            //1:Peruano   2:Extranjero
            
            //DATOS DE NACIMIENTO
            //en caso sea peruano
            $table->integer('departamento');
            $table->integer('provincia');
            $table->integer('distrito');
            $table->string('direccion_nacimiento');

            //en caso sea extranjero
            $table->string('pais_nacimiento'); //Esto deermina el pais Peru si es peruano y otro si es extranjero
            $table->string('lugar_nacimiento'); //esto es la ciudad
            
            //DATOS DE ESTUDIOS
            $table->string('colegio_primario');
            $table->string('colegio_secundario');
            $table->string('universidad');
            $table->string('profesion');

            //DATOS DE EMPLEO
            $table->string('centro_trabajo');
            $table->string('cargo_trabajo');
            $table->string('direccion_laboral');

            //DATOS FAMILIARES
            $table->integer('estado_civil');
            $table->integer('nro_hijos');

            //DATOS DE VIVIENDA
            $table->integer('departamento_vivienda');
            $table->integer('provincia_vivienda');
            $table->integer('distrito_vivienda');
            $table->string('domicilio');
            $table->string('referencia_vivienda');

            //CONTACTO
            $table->integer('telefono_domicilio');
            $table->integer('telefono_celular');
            $table->string('correo');

            //ESTADO DE LA POSTULACION
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
        Schema::drop('postulante');
    }
}
 