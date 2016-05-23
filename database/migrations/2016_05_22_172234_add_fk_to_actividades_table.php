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
        Schema::table('actividades', function (Blueprint $table) {
            $table->foreign('ambiente_id')
                  ->references('id')
                  ->on('ambientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actividades', function (Blueprint $table) {
            $table->dropForeign('actividades_ambiente_id_foreign');
        });
    }
}
