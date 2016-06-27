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
        	'doc_identidad'=>'47803790',
        	'nombre'=>'César',
        	'ap_paterno'=>'Olivera',
        	'ap_materno'=>'Cokan',
        	'sexo'=>'hombre',
        	'correo'=>'cesar.olivera.cokan@gmail.com',
        	'fecha_nacimiento'=>'1993-03-07',
        	'id_tipo_persona'=>1,
        	'id_usuario'=>1]);

        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'48288722',
            'nombre'=>'Sebastian',
            'ap_paterno'=>'Dioses',
            'ap_materno'=>'Nuñez',
            'sexo'=>'hombre',
            'correo'=>'chebasgods@yahoo.com',
            'fecha_nacimiento'=>'1993-04-24',
            'id_tipo_persona'=>1]);

        Persona::create([       
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'72877976',
            'nombre'=>'Marcelo',
            'ap_paterno'=>'Milera',
            'ap_materno'=>'Sánchez',
            'sexo'=>'masculino',
            'correo'=>'m.milera@mail.com',
            'fecha_nacimiento'=>'1992-11-19',
            'id_tipo_persona'=>3,
            'id_usuario'=>2]);

        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'65872376',
            'nombre'=>'Victor',
            'ap_paterno'=>'Fuentes',
            'ap_materno'=>'Ramos',
            'sexo'=>'masculino',
            'correo'=>'v.fuentesr@mail.com',
            'fecha_nacimiento'=>'1992-10-10',
            'id_tipo_persona'=>3,
            'id_usuario'=>3]);
			
        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'72914561',
            'nombre'=>'Max',
            'ap_paterno'=>'Vilcapoma',
            'ap_materno'=>'Gonzales',
            'sexo'=>'masculino',
            'correo'=>'max@papus.com',
            'fecha_nacimiento'=>'1993-07-15',
            'id_tipo_persona'=>2]);
			
        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'65235376',
            'nombre'=>'Juan',
            'ap_paterno'=>'Ferraro',
            'ap_materno'=>'Juani',
            'sexo'=>'hombre',
            'correo'=>'juanchichu@hotmail.com',
            'fecha_nacimiento'=>'1994-04-25',
            'id_tipo_persona'=>3,
            'id_usuario'=>4]);

        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'24625376',
            'nombre'=>'Juan',
            'ap_paterno'=>'Loayza',
            'ap_materno'=>'Suarez',
            'sexo'=>'hombre',
            'correo'=>'j.loayza@hotmail.com',
            'fecha_nacimiento'=>'1993-11-01',
            'id_tipo_persona'=>2,
            'id_usuario'=>5]);

        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'75235122',
            'nombre'=>'Francisco',
            'ap_paterno'=>'Beingolea',
            'ap_materno'=>'More',
            'sexo'=>'hombre',
            'correo'=>'zikokun@yahoo.com',
            'fecha_nacimiento'=>'1991-12-28',
            'id_tipo_persona'=>3,
            'id_usuario'=>6]);

        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'56234222',
            'nombre'=>'Brayan',
            'ap_paterno'=>'Rodriguez',
            'ap_materno'=>'Master',
            'sexo'=>'',
            'correo'=>'brayan_master_v2.0@yahoo.com',
            'fecha_nacimiento'=>'1992-02-15',
            'id_tipo_persona'=>3,
            'id_usuario'=>7]);

        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'12334222',
            'nombre'=>'Jhoseline',
            'ap_paterno'=>'Alva',
            'ap_materno'=>'Gazani',
            'sexo'=>'',
            'correo'=>'alvazani0@gmail.com',
            'fecha_nacimiento'=>'1993-03-23',
            'id_tipo_persona'=>3,
            'id_usuario'=>8]);

        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'12345672',
            'nombre'=>'Tian',
            'ap_paterno'=>'Olivera',
            'ap_materno'=>'Cokan',
            'sexo'=>'Mujer',
            'correo'=>'tian.olivera@gmail.com',
            'fecha_nacimiento'=>'1994-07-24',
            'id_tipo_persona'=>3]);
        
        Persona::create([
            'nacionalidad'=>'peruano',
            'doc_identidad'=>'07755200',
            'nombre'=>'César',
            'ap_paterno'=>'Olivera',
            'ap_materno'=>'Falconi',
            'sexo'=>'Hombre',
            'correo'=>'arqof@hotmail.com',
            'fecha_nacimiento'=>'1965-09-11',
            'id_tipo_persona'=>3]);
        }

}
