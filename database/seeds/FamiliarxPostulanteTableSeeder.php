<?php

use Illuminate\Database\Seeder;
use papusclub\Models\FamiliarxPostulante;
class FamiliarxPostulanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FamiliarxPostulante::create([
        	'postulante_id'=>1,
        	'persona_id'=>11,
        	'tipo_familia_id'=>2,
        	]);
        FamiliarxPostulante::create([
        	'postulante_id'=>1,
        	'persona_id'=>12,
        	'tipo_familia_id'=>5,
        	]);
    }
}
