<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoxfacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productoxfacturacion', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('producto_id')->unsigned()->index('productoxfacturacion_producto_id_foreign');
            $table->integer('facturacion_id')->unsigned()->index('productoxfacturacion_facturacion_id_foreign');
            $table->integer('cantidad');            
            $table->double('subtotal');                        
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productoxfacturacion');
    }
}
