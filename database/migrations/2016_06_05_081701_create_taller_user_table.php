<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTallerUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_user', function (Blueprint $table) {
            $table->integer('taller_id')->unsigned()->index('taller_user_taller_id_foreign');
            $table->integer('user_id')->unsigned()->index('taller_user_user_id_foreign');
            $table->double('precio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('taller_user');
    }
}
