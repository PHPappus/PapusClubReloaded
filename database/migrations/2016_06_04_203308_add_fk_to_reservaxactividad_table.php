<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToReservaxactividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservaxactividad', function (Blueprint $table) {
            
            $table->foreign('reserva_id')
                  ->references('id')
                  ->on('reserva');
            $table->foreign('actividad_id')
                  ->references('id')
                  ->on('actividad');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservaxactividad', function (Blueprint $table) {
            
            $table->dropForeign('reservaxactividad_reserva_id_foreign');
            $table->dropForeign('reservaxactividad_actividad_id_foreign');
        });
    }
}
