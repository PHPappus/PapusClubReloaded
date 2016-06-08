<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliarxpostulanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiarxpostulante', function (Blueprint $table) {
            $table->integer('postulante_id')->unsigned()->nullable();
            $table->integer('persona_id')->unsigned()->nullable();
            $table->integer('tipo_relacion_id')->unsigned()->nullable();
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
        Schema::drop('familiarxpostulante');
    }
}
