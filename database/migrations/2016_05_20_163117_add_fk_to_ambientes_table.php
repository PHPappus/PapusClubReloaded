<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToAmbientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ambientes', function (Blueprint $table) {
            $table->foreign('sede_id')
                  ->references('id')
                  ->on('sedes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ambientes', function (Blueprint $table) {
            $table->dropForeign('ambientes_sede_id_foreign');
        });
    }
}
