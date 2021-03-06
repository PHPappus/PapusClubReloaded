<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbientesSorteoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambientessorteo',function (Blueprint $table){
            //Estos son los atributos que estaban en el caso de uso
            $table->integer('id')->unsigned();
            $table->integer('id_ambiente')->unsigned();    
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
        Schema::drop('ambientessorteo');
    }
}
