<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPersonaxsocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personaxsocio', function (Blueprint $table) {
            $table->foreign('persona_id')->references('id')->on('socio')->onDelete('cascade');
            $table->foreign('socio_id')->references('id')->on('persona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personaxsocio', function (Blueprint $table) {
            $table->dropForeign('personaxsocio_persona_id_foreign');
            $table->dropForeign('personaxsocio_socio_id_foreign');
        });
    }
}
