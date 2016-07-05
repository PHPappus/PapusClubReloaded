<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToMultaxpersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('multaxpersona', function (Blueprint $table) {
            $table->foreign('multa_id')->references('id')->on('multa')->onDelete('cascade');
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
        Schema::table('multaxpersona', function (Blueprint $table) {

            $table->dropForeign('multaxpersona_multa_id_foreign');
            $table->dropForeign('multaxpersona_socio_id_foreign');
        });
    }
}
