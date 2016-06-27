<?php

use Illuminate\Database\Seeder;
use papusclub\Models\TarifaTaller;

class TarifaTallerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TarifaActividad::create([
        	'taller_id'=>1,
        	'tipo_persona_id'=>1,
        	'precio'=>15,
        	]);
        TarifaActividad::create([
            'taller_id'=>1,
            'tipo_persona_id'=>2,
            'precio'=>20,
            ]);
        TarifaActividad::create([
            'taller_id'=>1,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);
        TarifaActividad::create([
        	'taller_id'=>2,
        	'tipo_persona_id'=>1,
        	'precio'=>15,
        	]);
        TarifaActividad::create([
            'taller_id'=>2,
            'tipo_persona_id'=>2,
            'precio'=>20,
            ]);
        TarifaActividad::create([
            'taller_id'=>2,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);
        TarifaActividad::create([
        	'taller_id'=>3,
        	'tipo_persona_id'=>1,
        	'precio'=>15,
        	]);
        TarifaActividad::create([
            'taller_id'=>3,
            'tipo_persona_id'=>2,
            'precio'=>20,
            ]);
        TarifaActividad::create([
            'taller_id'=>3,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);
        TarifaActividad::create([
        	'taller_id'=>4,
        	'tipo_persona_id'=>1,
        	'precio'=>15,
        	]);
        TarifaActividad::create([
            'taller_id'=>4,
            'tipo_persona_id'=>2,
            'precio'=>20,
            ]);
        TarifaActividad::create([
            'taller_id'=>4,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);
    }
}
