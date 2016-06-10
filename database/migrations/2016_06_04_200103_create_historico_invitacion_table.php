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
            $table->increments('id');
            $table->integer('invitado_id')->unsigned();
            $table->integer('sede_id')->unsigned();
            $table->dateTime('fecha_invitacion');
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
