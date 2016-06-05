<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTarifaAmbientextipoPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarifaambientextipopersona', function (Blueprint $table) {
            
            $table->foreign('ambiente_id')
                  ->references('id')
                  ->on('ambiente');
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
        Schema::table('tarifaambientextipopersona', function (Blueprint $table) {
            
            $table->dropForeign('tarifaambientextipopersona_ambiente_id_foreign');
            $table->dropForeign('tarifaambientextipopersona_tipo_persona_id_foreign');
        });
    }
}
