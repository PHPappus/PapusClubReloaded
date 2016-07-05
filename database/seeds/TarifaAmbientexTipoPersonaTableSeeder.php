<?php

use Illuminate\Database\Seeder;
use papusclub\Models\TarifaAmbientexTipoPersona;

class TarifaAmbientexTipoPersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TarifaAmbientexTipoPersona::create([
        	'ambiente_id'=>1,
        	'tipo_persona_id'=>1,
        	'precio'=>15,
        	]);
        TarifaAmbientexTipoPersona::create([
        	'ambiente_id'=>1,
        	'tipo_persona_id'=>2,
        	'precio'=>20,
        	]);
        TarifaAmbientexTipoPersona::create([
        	'ambiente_id'=>1,
        	'tipo_persona_id'=>3,
        	'precio'=>25,
        	]);

        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>2,
            'tipo_persona_id'=>1,
            'precio'=>10,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>2,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>2,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);

        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>3,
            'tipo_persona_id'=>1,
            'precio'=>10,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>3,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>3,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);

        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>4,
            'tipo_persona_id'=>1,
            'precio'=>10,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>4,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>4,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);

        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>5,
            'tipo_persona_id'=>1,
            'precio'=>10,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>5,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>5,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);

        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>6,
            'tipo_persona_id'=>1,
            'precio'=>10,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>6,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>6,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);

        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>7,
            'tipo_persona_id'=>1,
            'precio'=>10,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>7,
            'tipo_persona_id'=>2,
            'precio'=>15,
            ]);
        TarifaAmbientexTipoPersona::create([
            'ambiente_id'=>7,
            'tipo_persona_id'=>3,
            'precio'=>25,
            ]);


    }
}
