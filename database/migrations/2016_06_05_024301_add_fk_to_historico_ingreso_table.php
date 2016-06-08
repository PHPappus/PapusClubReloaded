<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToHistoricoIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historicoingreso', function (Blueprint $table) {

            $table->foreign('persona_id')->references('id')->on('persona')->onDelete('cascade');
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
        Schema::table('historicoingreso', function (Blueprint $table) {
            $table->dropForeign('historicoingreso_persona_id_foreign');
            $table->dropForeign('historicoingreso_sede_id_foreign');
        });
    }
}
