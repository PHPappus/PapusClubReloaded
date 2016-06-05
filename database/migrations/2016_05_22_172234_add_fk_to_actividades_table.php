<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToActividadesTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actividad', function (Blueprint $table) {
            $table->foreign('ambiente_id')
                  ->references('id')
                  ->on('ambiente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actividad', function (Blueprint $table) {
            $table->dropForeign('actividad_ambiente_id_foreign');
        });
    }
}
