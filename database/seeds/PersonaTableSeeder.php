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
        Persona::create([
        	'nacionalidad'=>'peruano',
        	'doc_identidad'=>'48755415',
        	'nombre'=>'Soy',
        	'ap_paterno'=>'Una',
        	'ap_materno'=>'Prueba',
        	'sexo'=>'hombre',
        	'correo'=>'prueba@mail.com',
        	'fecha_nacimiento'=>'1994-05-14',
        	'id_tipo_persona'=>3,
        	'id_usuario'=>1]);

        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'48288722',
            'nombre'=>'Prueba',
            'ap_paterno'=>'Socio',
            'ap_materno'=>'I',
            'sexo'=>'hombre',
            'correo'=>'prueba@mail.com',
            'fecha_nacimiento'=>'1994-05-14',
            'id_tipo_persona'=>2]);

        Persona::create([       
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'48288722',
            'nombre'=>'Prueba',
            'ap_paterno'=>'Socio',
            'ap_materno'=>'II',
            'sexo'=>'hombre',
            'correo'=>'prueba@mail.com',
            'fecha_nacimiento'=>'1994-05-14',
            'id_tipo_persona'=>2]);
    }
}
