<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doc_identidad'); //si es una empresa la que se registra este campo queda vacio
            $table->string('nombre');       
            $table->string('ap_paterno');
            $table->string('ap_materno');       
            $table->string('sexo'); // hombre ,mujer 
            $table->string('correo');               
            $table->date('fecha_nacimiento'); 
            $table->integer('id_tipo_persona')->unsigned()->nullable();
            $table->integer('id_usuario');//->unsigned()->nullable();
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
        Schema::drop('persona');
    }
}
