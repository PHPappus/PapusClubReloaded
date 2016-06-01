<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Tarifario;

class TarifarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Tarifario::create([
        	'nombre'=>'Membresía'
        	]);

        Tarifario::create([
        	'nombre'=>'Actividades'
        	]);
        Tarifario::create([
        	'nombre'=>'Servicios'
        	]);
        Tarifario::create([
        	'nombre'=>'Talleres'
        	]);
        Tarifario::create([
        	'nombre'=>'Ambientes'
        	]);        	        	        
    }
}
