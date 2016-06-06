<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Persona;
<<<<<<< HEAD
use Carbon\Carbon;
=======
>>>>>>> f7c58d4daa6493e9ee87d89ab9d6648a33687f15

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
    }
}
