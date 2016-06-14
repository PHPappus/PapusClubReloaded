<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToObservaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('observaciones', function (Blueprint $table) {
            $table->foreign('socio_id')->references('id')->on('socio')->onDelete('cascade');
            $table->foreign('postulante_id')->references('id_postulante')->on('postulante')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('observaciones', function (Blueprint $table) {
            $table->dropForeign('observaciones_socio_id_foreign');
            $table->dropForeign('observaciones_postulante_id_foreign');
        });
    }
}
