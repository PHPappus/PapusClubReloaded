<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTarifaActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarifaactividad', function (Blueprint $table) {
            
            $table->foreign('actividad_id')
                  ->references('id')
                  ->on('actividad');
            $table->foreign('tipo_persona_id')
                  ->references('id')
                  ->on('tipopersona');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarifaactividad', function (Blueprint $table) {
            
            $table->dropForeign('tarifaactividad_actividad_id_foreign');
            $table->dropForeign('tarifaactividad_tipo_persona_id_foreign');
        });
    }
}
