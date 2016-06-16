<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSorteoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sorteo', function (Blueprint $table) {
            $table->foreign('id_sede')->references('id')->on('sede')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sorteo', function (Blueprint $table) {
            $table->dropForeign('sorteo_id_sede_foreign');
        });
    }
}
