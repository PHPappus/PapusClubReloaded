<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToCarnetxsocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carnetxsocio', function (Blueprint $table) {
            $table->foreign('carnet_id')->references('id')->on('carnet')->onDelete('cascade');
            $table->foreign('socio_id')->references('id')->on('socio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carnetxsocio', function (Blueprint $table) {
            $table->dropForeign('carnetxsocio_socio_id_foreign');
            $table->dropForeign('carnetxsocio_carnet_id_foreign');

        });
    }
}
