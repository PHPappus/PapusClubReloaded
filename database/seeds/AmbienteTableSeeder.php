<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Ambiente;

class AmbienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ambiente::insert([
            'nombre' => 'Cancha 10', 
        	'tipo' => 'Cancha', 
        	'capacidad_actual' => '100', 
        	'ubicacion' => 'Sede Callao-cerca de la entrada', 
        	'sede_id' => 1 
        	]);
        Ambiente::insert([
            'nombre' => 'Bungalow 10', 
            'tipo' => 'Bungalow', 
            'capacidad_actual' => '100', 
            'ubicacion' => 'Sede Callao-cerca de la entrada', 
            'sede_id' => 1 
            ]);
        Ambiente::insert([
            'nombre' => 'Bungalow 1', 
            'tipo' => 'Bungalow', 
            'capacidad_actual' => '100', 
            'ubicacion' => 'Sede Callao-cerca de la entrada', 
            'sede_id' => 1 
            ]);
    }
}
