<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Actividad;
use Carbon\Carbon;
class ActividadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actividad::insert([
            'nombre' => 'Papus FC vs Regatas FC', 
        	'tipo_actividad' => 'Deportivo', 
        	'capacidad_maxima' => '100', 
        	'descripcion' => 'Final PapusCup', 
        	'ambiente_id' => 1,
            'reserva_id'=>1,
            'cupos_disponibles'=>1,
            'estado'=>true
        	]);
        Actividad::insert([
            'nombre' => 'Papus Club vs El bosque', 
            'tipo_actividad' => 'Deportivo', 
            'capacidad_maxima' => '90', 
            'descripcion' => 'Final Basketball PapusCup', 
            'ambiente_id' => 1,
            'reserva_id'=>1,
            'cupos_disponibles'=>'80',
            'estado'=>true
        ]);
        Actividad::insert([
            'nombre' => 'Papus Club vs Geminis', 
            'tipo_actividad' => 'Deportivo', 
            'capacidad_maxima' => '60', 
            'descripcion' => 'Final Voleyball PapusCup', 
            'ambiente_id' => 1,
            'reserva_id'=>1,
            'cupos_disponibles'=>'55',
            'estado'=>true
        ]);
        Actividad::insert([
            'nombre' => 'Papus Club concert', 
            'tipo_actividad' => 'Concierto', 
            'capacidad_maxima' => '100', 
            'descripcion' => 'Concierto de RHCP', 
            'ambiente_id' => 1,
            'reserva_id'=>1,
            'cupos_disponibles'=>'55',
            'estado'=>true
        ]);
    }
}
