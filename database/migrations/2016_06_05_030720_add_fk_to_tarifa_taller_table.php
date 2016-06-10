<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTarifaTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarifataller', function (Blueprint $table) {
            $table->foreign('taller_id')->references('id')->on('taller')->onDelete('cascade');
            $table->foreign('tipo_persona_id')->references('id')->on('tipopersona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarifataller', function (Blueprint $table) {
            $table->dropForeign('tarifataller_taller_id_foreign');
            $table->dropForeign('tarifataller_tipo_persona_id_foreign');
        });
    }
}
