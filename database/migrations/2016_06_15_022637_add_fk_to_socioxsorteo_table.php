<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSocioxsorteoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socioxsorteo', function (Blueprint $table) {
            $table->foreign('id_socio')->references('id')->on('socio')->onDelete('cascade');
            $table->foreign('id')->references('id')->on('sorteo')->onDelete('cascade');  
            $table->primary(['id', 'id_socio']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socioxsorteo', function (Blueprint $table) {
            $table->dropForeign('socioxsorteo_id_socio_foreign');
            $table->dropForeign('socioxsorteo_id_foreign');
        });
    }
}
