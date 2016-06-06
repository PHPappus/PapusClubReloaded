<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarnetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnet', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('nro_carnet');
            $table->dateTime('fecha_emision');
            $table->boolean('estado');
            $table->dateTime('fecha_vencimiento'); // 8 años
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
        Schema::drop('carnet');
    }
}
