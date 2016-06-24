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
        Actividad::create([
            'nombre' => 'Papus FC vs Regatas FC', 
            'tipo_actividad' => 'Deportivo', 
            'capacidad_maxima' => '100', 
            'descripcion' => 'Final PapusCup', 
            'ambiente_id' => 1,
            'cupos_disponibles'=>'50',
            'estado'=>true,
            'a_realizarse_en'=>Carbon::create(2016, 12, 12),
            'hora_inicio'=>Carbon::createFromTime(8, 0, 0)
            ]);
        Actividad::create([
            'nombre' => 'Papus Club vs El bosque', 
            'tipo_actividad' => 'Deportivo', 
            'capacidad_maxima' => '90', 
            'descripcion' => 'Final Basketball PapusCup', 
            'ambiente_id' => 1,
            'cupos_disponibles'=>'80',
            'estado'=>true,
            'a_realizarse_en'=>Carbon::create(2016, 11, 10),
            'hora_inicio'=>Carbon::createFromTime(16, 0, 0)
        ]);
        Actividad::create([
            'nombre' => 'Papus Club vs Geminis', 
            'tipo_actividad' => 'Deportivo', 
            'capacidad_maxima' => '60', 
            'descripcion' => 'Final Voleyball PapusCup', 
            'ambiente_id' => 2,
            'cupos_disponibles'=>'55',
            'estado'=>true,
            'a_realizarse_en'=>Carbon::create(2016, 10, 9),
            'hora_inicio'=>Carbon::createFromTime(19, 30, 0)
        ]);
        Actividad::create([
            'nombre' => 'Papus Club concert', 
            'tipo_actividad' => 'Concierto', 
            'capacidad_maxima' => '100', 
            'descripcion' => 'Concierto de RHCP', 
            'ambiente_id' => 1,
            'cupos_disponibles'=>'55',
            'estado'=>true,
            'a_realizarse_en'=>Carbon::create(2016, 8, 7),
            'hora_inicio'=>Carbon::createFromTime(20, 30, 0)
        ]);
        Actividad::create([
            'nombre' => 'Día de la canción criolla', 
            'tipo_actividad' => 'Concierto', 
            'capacidad_maxima' => '250', 
            'descripcion' => 'Celebración del del día de la canción criolla', 
            'ambiente_id' => 3,
            'cupos_disponibles'=>'220',
            'estado'=>true,
            'a_realizarse_en'=>Carbon::create(2016, 10, 31),
            'hora_inicio'=>Carbon::createFromTime(11, 30, 0)
        ]);
        Actividad::create([
            'nombre' => 'Papus Club Happy New Year', 
            'tipo_actividad' => 'Evento', 
            'capacidad_maxima' => '250', 
            'descripcion' => 'Celebración del año nuevo 2017', 
            'ambiente_id' => 1,
            'cupos_disponibles'=>'220',
            'estado'=>true,
            'a_realizarse_en'=>Carbon::create(2016, 12, 31),
            'hora_inicio'=>Carbon::createFromTime(18, 30, 0)
        ]);
        Actividad::create([
            'nombre' => 'Papus Club Welcome to Summer', 
            'tipo_actividad' => 'Evento', 
            'capacidad_maxima' => '250', 
            'descripcion' => 'Bienvenido el verano y las vacaciones', 
            'ambiente_id' => 2,
            'cupos_disponibles'=>'220',
            'estado'=>true,
            'a_realizarse_en'=>Carbon::create(2017, 01, 01),
            'hora_inicio'=>Carbon::createFromTime(18, 30, 0)
        ]);
        Actividad::create([
            'nombre' => 'Papus Club Día del amigo', 
            'tipo_actividad' => 'Evento', 
            'capacidad_maxima' => '100', 
            'descripcion' => 'Celebra el día del amigo con una reunión memorable', 
            'ambiente_id' => 2,
            'cupos_disponibles'=>'1',
            'estado'=>true,
            'a_realizarse_en'=>Carbon::create(2016, 06, 26),
            'hora_inicio'=>Carbon::createFromTime(18, 30, 0)
        ]);

        
    }
}
