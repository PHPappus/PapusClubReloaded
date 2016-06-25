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
            'tipo_ambiente' => 'Cancha', 
            'capacidad_actual' => '100', 
            'descripcion' => 'Sede Callao-cerca de la entrada', 
            'sede_id' => 1 
            ]);
        Ambiente::insert([
            'nombre' => 'Cancha 09', 
            'tipo_ambiente' => 'Cancha', 
            'capacidad_actual' => '100', 
            'descripcion' => 'Sede Chosica-cerca de las piscinas', 
            'sede_id' => 2 
            ]);
        Ambiente::insert([
            'nombre' => 'Cancha 08', 
            'tipo_ambiente' => 'Cancha', 
            'capacidad_actual' => '100', 
            'descripcion' => 'Sede Piura-cerca de la entrada', 
            'sede_id' => 3 
            ]);
        Ambiente::insert([
            'nombre' => 'Bungalow Callao 10', 
            'tipo_ambiente' => 'Bungalow', 
            'capacidad_actual' => '4', 
            'descripcion' => 'Sede Callao-cerca de la entrada', 
            'sede_id' => 1 
            ]);
        Ambiente::insert([
            'nombre' => 'Bungalow Callao 1', 
            'tipo_ambiente' => 'Bungalow', 
            'capacidad_actual' => '2', 
            'descripcion' => 'Sede Callao-cerca de la entrada', 
            'sede_id' => 1
            ]);
        Ambiente::create([
            'nombre' => 'Bungalow Chosica 1', 
            'tipo_ambiente' => 'Bungalow', 
            'capacidad_actual' => '1', 
            'descripcion' => 'Sede Callao-cerca de la entrada', 
            'sede_id' => 2
            ]);
        Ambiente::create([
            'nombre' => 'Bungalow Piura 1', 
            'tipo_ambiente' => 'Bungalow', 
            'capacidad_actual' => '2', 
            'descripcion' => 'Sede Callao-cerca de la entrada', 
            'sede_id' => 3
            ]);

    }
}
