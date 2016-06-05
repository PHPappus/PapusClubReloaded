<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPromocionxsocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promocionxsocio', function (Blueprint $table) {
            
            $table->foreign('promocion_id')
                  ->references('id')
                  ->on('promocion');
            $table->foreign('socio_id')
                  ->references('id')
                  ->on('socio');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promocionxsocio', function (Blueprint $table) {
            
            $table->dropForeign('promocionxsocio_promocion_id_foreign');
            $table->dropForeign('promocionxsocio_socio_id_foreign');
        });
    }
}
