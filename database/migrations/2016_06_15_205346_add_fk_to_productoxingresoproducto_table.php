<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToProductoxingresoproductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productoxingresoproducto', function (Blueprint $table) {
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('producto')->onDelete('cascade');            
            $table->foreign('ingresoproducto_id')
                  ->references('id')
                  ->on('ingresoproducto')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productoxingresoproducto', function (Blueprint $table) {
            $table->dropForeign('productoxingresoproducto_producto_id_foreign');
            $table->dropForeign('productoxingresoproducto_ingresoproducto_id_foreign');
        });
    }
}
