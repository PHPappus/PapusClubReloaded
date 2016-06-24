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
            $table->double('total'); 
            $table->string('tipo_pago');                     
            $table->string('tipo_comprobante'); 
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
