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
            $table->integer('id_postulante')->unsigned()->nullable();
            $table->bigInteger('ruc'); //en caso lo tenga, no es necesario si no tiene
            //en la vista se tiene un checkbox de nacionalidad
            //1:Peruano   2:Extranjero
            
            //DATOS DE NACIMIENTO
            //en caso sea peruano
            //$table->string('departamento');
            //$table->string('provincia');
            //$table->string('distrito');
            $table->string('direccion');

            //en caso sea extranjero
            $table->string('pais_nacimiento'); //Esto deermina el pais Peru
            $table->string('lugar_nacimiento'); //esto es una cadena Av. SiempreViva 123 
            
            //DATOS DE ESTUDIOS
            $table->string('colegio_primario');
            $table->string('colegio_secundario');
            $table->string('universidad');
            $table->string('profesion');

            //DATOS DE EMPLEO
            $table->string('centro_trabajo');
            $table->string('cargo_centro_trabajo');
            $table->string('direccionLaboral');

            //DATOS FAMILIARES
            $table->string('estado_civil');
            $table->integer('nro_hijos');

            //DATOS DE VIVIENDA
            //$table->string('departamento');
            //$table->string('provincia');
            //$table->string('distrito');
            $table->string('domicilio');

            //CONTACTO
            $table->integer('telefono_domicilio');
            $table->integer('telefono_celular');

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
