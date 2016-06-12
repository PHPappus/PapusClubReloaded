<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPrecioproductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('precioproducto', function (Blueprint $table) {
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('producto')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('precioproducto', function (Blueprint $table) {
            $table->dropForeign('precioproducto_producto_id_foreign');
        });
    }
}
