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
        Schema::create('ambientesSorteo',function (Blueprint $table){
            //Estos son los atributos que estaban en el caso de uso
            $table->integer('id_sorteo');
            $table->integer('id_ambiente');            
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_sorteo', 'id_ambiente']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ambientesSorteo');
    }
}
