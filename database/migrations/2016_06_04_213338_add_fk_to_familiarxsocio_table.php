<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToFamiliarxsocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('familiarxsocio', function (Blueprint $table) {
            $table->foreign('socio_id')->references('id')->on('socio')->onDelete('cascade');
            $table->foreign('persona_id')->references('id')->on('persona')->onDelete('cascade');
            $table->foreign('tipo_relacion_id')->references('id')->on('tiporelacion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('familiarxsocio', function (Blueprint $table) {
            $table->dropForeign('familiarxsocio_socio_id_foreign');
            $table->dropForeign('familiarxsocio_persona_id_foreign');
            $table->dropForeign('familiarxsocio_tipo_relacion_id_foreign');
        });
    }
}
