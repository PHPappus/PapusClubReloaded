<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecioproductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precioproducto', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('producto_id')->unsigned()->index('precioproducto_producto_id_foreign');
            $table->double('precio');            
            $table->double('costo');
            $table->boolean('estado');
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
        Schema::drop('precioproducto');
    }
}
