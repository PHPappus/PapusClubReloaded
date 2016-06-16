<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToFacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturacion', function (Blueprint $table) {
            $table->foreign('persona_id')
                  ->references('id')
                  ->on('persona')->onDelete('cascade');            
            $table->foreign('reserva_id')
                  ->references('id')
                  ->on('reserva')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturacion', function (Blueprint $table) {
            $table->dropForeign('facturacion_persona_id_foreign');
        });
        Schema::table('facturacion', function (Blueprint $table) {
            $table->dropForeign('facturacion_reserva_id_foreign');
        });
    }
}
