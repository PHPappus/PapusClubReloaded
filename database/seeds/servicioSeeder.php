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
        	'descripcion' => 'Servicio exclusivo para Bungalows Microondas tipos Microwave Oven 100% Rentable',         	
        	'tipo_servicio' => 32, 
        	'estado' => true
        	]);
        Servicio::insert(['nombre' => 'Alquiler de Tennis de Mesa', 
        	'descripcion' => 'El servicio contiene todos los instrumentos necesarios para jugar tennis en un mesa',         	
        	'tipo_servicio' => 31, 
        	'estado' => true
        	]);
        Servicio::insert(['nombre' => 'Alquiler de Raquetas de Beisbol', 
        	'descripcion' => 'Raquetas de oro y plata para clientes miembros exclusivos',         	
        	'tipo_servicio' => 31, 
        	'estado' => true
        	]);
        
    Servicio::insert(['nombre' => 'Paseo a Caballos de Raza Arco Iris',
            'descripcion' => 'Caballos para montar por los campos o canchas del club. No incluye seguro de vida.',         	
        	'tipo_servicio' => 30, 
        	'estado' => true
        	]);
    }
}