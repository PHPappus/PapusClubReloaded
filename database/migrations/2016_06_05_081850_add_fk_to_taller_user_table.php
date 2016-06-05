<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTallerUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taller_user', function (Blueprint $table) {
            $table->foreign('taller_id')
                  ->references('id')
                  ->on('talleres')->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taller_user', function (Blueprint $table) {
            $table->dropForeign('taller_user_taller_id_foreign');
            $table->dropForeign('taller_user_user_id_foreign');
        });
    }
}
