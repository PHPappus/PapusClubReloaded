<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTarifaFamiliar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarifafamiliar', function (Blueprint $table) {
            $table->foreign('tipo_membresia_id')->references('id')->on('tipomembresia')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tipo_familia_id')->references('id')->on('tipofamilia')->onUpdate('cascade')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarifafamiliar', function (Blueprint $table) {
            $table->dropForeign('tarifafamiliar_tipo_membresia_id_foreign');
            $table->dropForeign('tarifafamiliar_tipo_familia_id_foreign');            

        });
    }
}
