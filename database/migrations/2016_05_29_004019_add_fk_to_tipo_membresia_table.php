<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTipoMembresiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipomembresia', function (Blueprint $table) {
            $table->foreign('tarifa_membresia_id')
                  ->references('id')
                  ->on('tarifamembresia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipomembresia', function (Blueprint $table) {
            $table->dropForeign('tipomembresia_tarifa_membresia_id_foreign');
        });
    }
}
