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
        Schema::table('personaxactividad', function (Blueprint $table) {
            
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
        Schema::table('personaxactividad', function (Blueprint $table) {
            
            $table->dropForeign('personaxactividad_persona_id_foreign');
            $table->dropForeign('personaxactividad_actividad_id_foreign');
        });
    }
}
