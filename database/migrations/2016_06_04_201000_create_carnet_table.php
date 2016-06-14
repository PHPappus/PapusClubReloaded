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
            $table->integer('socio_id')->unsigned();
            $table->integer('nro_carnet');
            $table->date('fecha_emision'); //es fecha de actualización también
            $table->boolean('estado')->default(true);
            $table->string('descripcion')->default("El socio se encuentra habilitado. El carnet se encuentra vigente.");
            $table->date('fecha_vencimiento'); // 8 años
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
