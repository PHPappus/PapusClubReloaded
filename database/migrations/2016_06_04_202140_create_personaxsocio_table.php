<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaxsocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personaxsocio', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned()->nullable();
            $table->integer('socio_id')->unsigned()->nullable();
            $table->dateTime('fecha_actualizacion');
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
        Schema::drop('personaxsocio');
    }
}
