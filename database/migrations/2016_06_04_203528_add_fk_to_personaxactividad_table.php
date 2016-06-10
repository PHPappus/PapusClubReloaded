<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPersonaxactividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actividad_persona', function (Blueprint $table) {
            
            $table->foreign('persona_id')
                  ->references('id')
                  ->on('persona');
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
        Schema::table('actividad_persona', function (Blueprint $table) {
            
            $table->dropForeign('actividad_persona_id_foreign');
            $table->dropForeign('actividad_persona_id_foreign');
        });
    }
}
