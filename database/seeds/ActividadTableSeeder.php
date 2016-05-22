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
            'a_realizarse_en'=>Carbon::create(2016, 12, 12, 8, 0, 0)
        	]);
    }
}
