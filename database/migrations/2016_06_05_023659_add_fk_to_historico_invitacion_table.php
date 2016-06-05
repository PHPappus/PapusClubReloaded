<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToHistoricoInvitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historicoinvitacion', function (Blueprint $table) {
            $table->foreign('invitado_id')->references('id')->on('invitado')->onDelete('cascade');
            $table->foreign('socio_id')->references('id')->on('socio')->onDelete('cascade');
            $table->foreign('sede_id')->references('id')->on('sede')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historicoinvitacion', function (Blueprint $table) {
            $table->dropForeign('historicoinvitacion_invitado_id_foreign');
            $table->dropForeign('historicoinvitacion_socio_id_foreign');
            $table->dropForeign('historicoinvitacion_sede_id_foreign');
        });
    }
}
