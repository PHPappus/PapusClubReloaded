<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Carnet;

class CarnetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carnet::create([
        	'socio_id'=>1,
        	'nro_carnet'=>20160001,
        	'fecha_emision'=>'2008-06 18:03:30',
        	'estado'=>false,
        	'fecha_vencimiento'=>'2016-06-08 18:03:30']);


        Carnet::create([
        	'socio_id'=>1,
        	'nro_carnet'=>20160001,
        	'fecha_emision'=>'2016-06-06 18:03:30',
        	'fecha_vencimiento'=>'2024-06-06 18:03:30']);

        Carnet::create([
        	'socio_id'=>2,
        	'nro_carnet'=>20160002,
        	'fecha_emision'=>'2016-06-06 18:03:30',
        	'estado'=>false,
        	'fecha_vencimiento'=>'2024-06-06 18:03:30']);
    }
}
