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
        	'fecha_emision'=>'2008-06-06',
        	'estado'=>false,
        	'fecha_vencimiento'=>'2016-06-08']);


        Carnet::create([
        	'socio_id'=>1,
        	'nro_carnet'=>20160001,
        	'fecha_emision'=>'2016-06-06',
        	'fecha_vencimiento'=>'2024-06-06']);

        Carnet::create([
        	'socio_id'=>2,
        	'nro_carnet'=>20160002,
        	'fecha_emision'=>'2016-06-06',
        	'estado'=>false,
        	'fecha_vencimiento'=>'2024-06-06']);

        Carnet::create([
            'socio_id'=>3,
            'nro_carnet'=>20160003,
            'fecha_emision'=>'2008-06-06',
            'fecha_vencimiento'=>'2016-06-08']);

        Carnet::create([
            'socio_id'=>4,
            'nro_carnet'=>20160004,
            'fecha_emision'=>'2008-06-06',
            'fecha_vencimiento'=>'2016-06-08']);

        Carnet::create([
            'socio_id'=>5,
            'nro_carnet'=>20160005,
            'fecha_emision'=>'2008-06-06',
            'fecha_vencimiento'=>'2016-06-08']);
    }
}
