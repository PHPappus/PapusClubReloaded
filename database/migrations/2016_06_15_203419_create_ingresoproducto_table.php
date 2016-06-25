<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoproductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresoproducto', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('persona_id')->unsigned()->index('ingresoproducto_persona_id_foreign');
            $table->integer('proveedor_id')->unsigned()->index('ingresoproducto_proveedor_id_foreign');            
            $table->string('descripcion');
            $table->string('estado');
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
        Schema::drop('ingresoproducto');
    }
}
