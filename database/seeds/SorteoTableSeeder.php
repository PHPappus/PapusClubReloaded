<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Sorteo;
use Carbon\Carbon;

class SorteoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sorteo::insert([
        			'id'=>1,        			
                    'nombre_sorteo' => 'Dia de la madre',
                    'descripcion'=> 'Sorteo por dia de la madre',
                    'id_sede' => 1,
                    'numero_bungalows' => 1,
                    'fecha_abierto' => Carbon::create(2001, 5, 21, 12),
                    'fecha_cerrado' => Carbon::create(2001, 5, 21, 12),                    
                    'estado'=>1]);
        Sorteo::insert([
                    'id'=>2,                    
                    'nombre_sorteo' => 'Dia de chaba chaba',
                    'descripcion'=> 'Sorteo por dia de chaba chaba',
                    'id_sede' => 1,
                    'numero_bungalows' => 1,
                    'fecha_abierto' => Carbon::create(2016, 5, 21, 12),
                    'fecha_cerrado' => Carbon::create(2070, 5, 21, 12),                    
                    'estado'=>1]);
        Sorteo::insert([
                    'id'=>3,                    
                    'nombre_sorteo' => 'Dia del programador',
                    'descripcion'=> 'Sorteo por dia del programador',
                    'id_sede' => 1,
                    'numero_bungalows' => 0,
                    'fecha_abierto' => Carbon::create(2001, 5, 21, 12),
                    'fecha_cerrado' => Carbon::create(2001, 5, 21, 12),                    
                    'estado'=>1]);
    }
}
