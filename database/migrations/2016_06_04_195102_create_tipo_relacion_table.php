<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoRelacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiporelacion', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->string('puesto');
            $table->dateTime('fecha_inicio_contrato');
            $table->dateTime('fecha_fin_contrato');
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
        Schema::drop('tiporelacion');
    }
}
