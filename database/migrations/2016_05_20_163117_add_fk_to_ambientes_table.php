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
        Schema::table('ambiente', function (Blueprint $table) {
            $table->foreign('sede_id')
                  ->references('id')
                  ->on('sede');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ambiente', function (Blueprint $table) {
            $table->dropForeign('ambiente_sede_id_foreign');
        });
    }
}
