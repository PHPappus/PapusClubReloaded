<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTraspasoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('traspaso', function (Blueprint $table) {
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
        Schema::table('traspaso', function (Blueprint $table) {
            $table->dropForeign('traspaso_socio_id_foreign');
        });
    }
}
