<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Socio;

class SocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Socio::create([
        	'tipo_membresia_id'=>1,
        	'postulante_id'=>2,
        	'fecha_ingreso'=>'2016-06-06 18:35:06']);
        Socio::create([
        	'tipo_membresia_id'=>2,
        	'postulante_id'=>3,
        	'fecha_ingreso'=>'2016-06-06 18:35:06']);        
    }
}
