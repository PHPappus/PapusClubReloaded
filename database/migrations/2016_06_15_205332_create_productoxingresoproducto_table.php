<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoxingresoproductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productoxingresoproducto', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('producto_id')->unsigned()->index('productoxingresoproducto_producto_id_foreign');
            $table->integer('ingresoproducto_id')->unsigned()->index('productoxingresoproducto_ingresoproducto_id_foreign');
            $table->integer('cantidad');                                
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
        Schema::drop('productoxingresoproducto');
    }
}
