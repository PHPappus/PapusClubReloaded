<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persona', function (Blueprint $table) {
            $table->foreign('id_tipo_persona')->references('id')->on('tipopersona')->onDelete('cascade');
            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('persona', function (Blueprint $table) {
            $table->dropForeign('persona_id_tipo_persona_foreign');
            $table->dropForeign('persona_id_usuario_foreign');
        });
    }
}
