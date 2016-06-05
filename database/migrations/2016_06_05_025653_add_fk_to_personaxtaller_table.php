<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPersonaxtallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personaxtaller', function (Blueprint $table) {
            $table->foreign('persona_id')->references('id')->on('persona')->onDelete('cascade');
            $table->foreign('taller_id')->references('id')->on('persona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personaxtaller', function (Blueprint $table) {
            $table->dropForeign('personaxtaller_persona_id_foreign');
            $table->dropForeign('personaxtaller_taller_id_foreign');
        });
    }
}
