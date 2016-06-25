<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToAmbientesorteoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ambientessorteo', function (Blueprint $table) {
            $table->foreign('id_ambiente')->references('id')->on('ambiente')->onDelete('cascade');            
            $table->foreign('id')->references('id')->on('sorteo')->onDelete('cascade');  
            $table->primary(['id', 'id_ambiente']);
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ambientessorteo', function (Blueprint $table) {
            $table->dropForeign('ambientessorteo_id_ambiente_foreign');
            $table->dropForeign('ambientessorteo_id_foreign');
        });
    }
}
