<?php

use Illuminate\Database\Seeder;
use papusclub\Models\TarifaActividad;

class TarifaActividadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TarifaActividad::create([
        	'actividad_id'=>1,
        	'tipo_persona_id'=>1,
        	'precio'=>15,
        	]);
        TarifaActividad::create([
            'actividad_id'=>1,
            'tipo_persona_id'=>2,
            'precio'=>20,
            ]);
        TarifaActividad::create([
            'actividad_id'=>1,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);

        TarifaActividad::create([
            'actividad_id'=>2,
            'tipo_persona_id'=>1,
            'precio'=>10,
            ]);
        TarifaActividad::create([
            'actividad_id'=>2,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaActividad::create([
            'actividad_id'=>2,
            'tipo_persona_id'=>3,
            'precio'=>30,
            ]);

        TarifaActividad::create([
            'actividad_id'=>3,
            'tipo_persona_id'=>1,
            'precio'=>5,
            ]);
        TarifaActividad::create([
            'actividad_id'=>3,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaActividad::create([
            'actividad_id'=>3,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);

        TarifaActividad::create([
            'actividad_id'=>4,
            'tipo_persona_id'=>1,
            'precio'=>15,
            ]);
        TarifaActividad::create([
            'actividad_id'=>4,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaActividad::create([
            'actividad_id'=>4,
            'tipo_persona_id'=>3,
            'precio'=>20,
            ]);

        TarifaActividad::create([
            'actividad_id'=>5,
            'tipo_persona_id'=>1,
            'precio'=>12,
            ]);
        TarifaActividad::create([
            'actividad_id'=>5,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaActividad::create([
            'actividad_id'=>5,
            'tipo_persona_id'=>3,
            'precio'=>20,
            ]);

        TarifaActividad::create([
            'actividad_id'=>6,
            'tipo_persona_id'=>1,
            'precio'=>10,
            ]);
        TarifaActividad::create([
            'actividad_id'=>6,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaActividad::create([
            'actividad_id'=>6,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);

        TarifaActividad::create([
            'actividad_id'=>7,
            'tipo_persona_id'=>1,
            'precio'=>5,
            ]);
        TarifaActividad::create([
            'actividad_id'=>7,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaActividad::create([
            'actividad_id'=>7,
            'tipo_persona_id'=>3,
            'precio'=>30,
            ]);
        
    }
}
