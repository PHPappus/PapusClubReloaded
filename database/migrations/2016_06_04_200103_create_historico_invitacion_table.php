<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoInvitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicoinvitacion', function (Blueprint $table) {
            $table->integer('invitado_id')->unsigned()->nullable();
            $table->dateTime('fecha_invitacion');
            $table->integer('socio_id')->unsigned()->nullable();
            $table->integer('sede_id')->unsigned()->nullable();
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
        Schema::drop('historicoinvitacion');
    }
}
