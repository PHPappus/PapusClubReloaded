<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->foreign('sede_id')
                  ->references('id')
                  ->on('sedes');
            $table->foreign('ambiente_id')
                  ->references('id')
                  ->on('ambientes');
            $table->foreign('persona_id')
                  ->references('id')
                  ->on('persona');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropForeign('reservas_sede_id_foreign');
            $table->dropForeign('reservas_ambiente_id_foreign');
            $table->dropForeign('reservas_persona_id_foreign');
        });
    }
}
