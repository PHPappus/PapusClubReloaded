<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToIngresoproductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::table('ingresoproducto', function (Blueprint $table) {
            $table->foreign('persona_id')
                  ->references('id')
                  ->on('persona')->onDelete('cascade');            
            $table->foreign('proveedor_id')
                  ->references('id')
                  ->on('proveedor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingresoproducto', function (Blueprint $table) {
            $table->dropForeign('ingresoproducto_persona_id_foreign');
            $table->dropForeign('ingresoproducto_proveedor_id_foreign');
        });
    }
}
