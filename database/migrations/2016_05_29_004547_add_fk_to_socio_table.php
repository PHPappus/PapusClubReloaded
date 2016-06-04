<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socio', function (Blueprint $table) {
            $table->foreign('tipo_membresia_id')
                  ->references('id')
                  ->on('tipomembresia');

            $table->foreign('postulante_id')
                  ->references('id_postulante')
                  ->on('postulante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socio', function (Blueprint $table) {
            $table->dropForeign('socio_tipo_membresia_id_foreign');
            $table->dropForeign('socio_postulante_id_foreign');
        });
    }
}
