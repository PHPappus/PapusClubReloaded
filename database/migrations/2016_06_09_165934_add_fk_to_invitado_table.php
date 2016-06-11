<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToInvitadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitados', function (Blueprint $table) {
            $table->foreign('persona_id')->references('id')->on('persona')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('invitado_id')->references('id')->on('persona')->onUpdate('cascade')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invitados', function (Blueprint $table) {
            $table->dropForeign('invitados_persona_id_foreign');
            $table->dropForeign('invitados_invitado_id_foreign');            
        });
    }
}
