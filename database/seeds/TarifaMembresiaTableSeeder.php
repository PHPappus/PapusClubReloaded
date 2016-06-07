<?php

use Illuminate\Database\Seeder;
use papusclub\Models\TarifaMembresia;

class TarifaMembresiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TarifaMembresia::create([
        	'monto'=>500.60,
        	'fecha_registro'=>'2016-06-06 16:07:30']);
        TarifaMembresia::create([
        	'monto'=>400.50,
        	'fecha_registro'=>'2016-06-06 16:08:30']);        
    }
}
