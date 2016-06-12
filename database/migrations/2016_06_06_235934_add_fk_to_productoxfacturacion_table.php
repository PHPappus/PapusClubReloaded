<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToProductoxfacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productoxfacturacion', function (Blueprint $table) {
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('producto')->onDelete('cascade');            
            $table->foreign('facturacion_id')
                  ->references('id')
                  ->on('facturacion')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productoxfacturacion', function (Blueprint $table) {
            $table->dropForeign('productoxfacturacion_producto_id_foreign');
            $table->dropForeign('productoxfacturacion_facturacion_id_foreign');
        });
    }
}
