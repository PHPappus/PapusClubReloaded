<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSocioxsorteoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socioxsorteo',function (Blueprint $table){
            //Estos son los atributos que estaban en el caso de uso
            $table->integer('id');
            $table->integer('id_socio')->unsigned()->nullable();            
            $table->Boolean('estado');
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
        Schema::drop('socioxsorteo');
    }
}
