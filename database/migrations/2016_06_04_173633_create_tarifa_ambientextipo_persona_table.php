<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifaAmbientextipoPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifaambientextipopersona', function (Blueprint $table) {
            $table->integer('ambiente_id')->unsigned();
            $table->integer('tipo_persona_id')->unsigned();
            $table->float('precio');
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
        Schema::drop('tarifaambientextipopersona');
    }
}
