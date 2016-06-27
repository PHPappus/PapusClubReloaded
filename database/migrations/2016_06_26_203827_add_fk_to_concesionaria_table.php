<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToConcesionariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('concesionaria', function (Blueprint $table) {
            $table->foreign('sede_id')
                  ->references('id')
                  ->on('sede')->onDelete('cascade');                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concesionaria', function (Blueprint $table) {
            $table->dropForeign('concesionaria_sede_id_foreign');
        });
    }
}
