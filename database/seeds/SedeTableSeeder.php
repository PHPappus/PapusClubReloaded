<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Sede;

class SedeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sede::insert(['nombre' => 'Callao', 
        	'telefono' => '964247239', 
        	'departamento' => 'Lima', 
        	'provincia' => 'Callao', 
        	'distrito' => 'La Punta', 
        	'direccion' => 'Av. Grau 457', 
        	'referencia' => 'Alt. Comisaria La Punta', 
        	'nombre_contacto' => 'Francisco Beingolea', 
        	'capacidad_maxima' => 10000,
            'maximo_actual'=> 10000,
        	'capacidad_socio' => 50 
        	]);
        Sede::create(['nombre' => 'Chosica', 
            'telefono' => '964247239', 
            'departamento' => 'Lima', 
            'provincia' => 'Chosica', 
            'distrito' => 'La Chosica', 
            'direccion' => 'Av. Bolognesi 457', 
            'referencia' => 'Alt. del paradero Chosicano', 
            'nombre_contacto' => 'Walter Vilchez', 
            'capacidad_maxima' => 10000,
            'maximo_actual'=> 10000,
            'capacidad_socio' => 50 
            ]);

        Sede::create(['nombre' => 'Piura', 
            'telefono' => '4643235', 
            'departamento' => 'Piura', 
            'provincia' => 'Piura', 
            'distrito' => 'Castilla', 
            'direccion' => 'Av. Grau 457', 
            'referencia' => 'Alt. Comisaria La Rica Piura', 
            'nombre_contacto' => 'Willian Chiroque', 
            'capacidad_maxima' => 10000,
            'maximo_actual'=> 10000,
            'capacidad_socio' => 50 
            ]);
    }
}
