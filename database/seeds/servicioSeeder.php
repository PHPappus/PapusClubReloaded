<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Servicio;
class servicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::insert(['nombre' => 'Alquiler de microondas', 
        	'descripcion' => 'Servicio destinado a alquiler de microondas en un bungalow',         	
        	'tipo_servicio' => 31, 
        	'estado' => true
        	]);
        Servicio::insert(['nombre' => 'Alquiler de Tennis de Mesa', 
        	'descripcion' => 'El servicio contiene todos los instrumentos necesarios para jugar tennis',         	
        	'tipo_servicio' => 30, 
        	'estado' => true
        	]);
        Servicio::insert(['nombre' => 'Alquiler de Raquetas', 
        	'descripcion' => 'Raquetas de todos precios',         	
        	'tipo_servicio' => 30, 
        	'estado' => true
        	]);
        
    Servicio::insert(['nombre' => 'Alquiler de caballos xvrs',
            'descripcion' => 'Caballos para montar por los campos del club ingluye seguro de vida por si sucede un percance',         	
        	'tipo_servicio' => 29, 
        	'estado' => true
        	]);
    }
}