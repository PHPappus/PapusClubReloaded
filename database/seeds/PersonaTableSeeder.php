<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Persona;
use Carbon\Carbon;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::insert([
        	'nacionalidad' => 'Peruana',
        	'doc_identidad' => '72035514',
        	'carnet_extranjeria' => null,
        	'nombre' => 'Victor',
        	'ap_paterno' => 'Fuentes',
        	'ap_materno' => 'Ramos',
        	'sexo' => 'Masculino',
        	'correo' => 'vfuentesr@pucp.pe',
        	'fecha_nacimiento' => Carbon::create(1992, 10, 10),
        	'id_tipo_persona' => 1,
        	'id_usuario' => 1,


        	]);
    }
}
