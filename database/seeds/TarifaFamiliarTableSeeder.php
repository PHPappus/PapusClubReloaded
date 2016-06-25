<?php

use Illuminate\Database\Seeder;
use papusclub\Models\TarifaFamiliar;

class TarifaFamiliarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		TarifaFamiliar::create([
			'tipo_membresia_id'=>1,
			'tipo_familia_id'=>1,
			'descuento'=>5,
			'fecha_registro'=>'2016-10-15']);

		TarifaFamiliar::create([
			'tipo_membresia_id'=>1,
			'tipo_familia_id'=>2,
			'descuento'=>7,
			'fecha_registro'=>'2016-10-15']); 

		TarifaFamiliar::create([
			'tipo_membresia_id'=>1,
			'tipo_familia_id'=>3,
			'descuento'=>8,
			'fecha_registro'=>'2016-10-15']); 

		TarifaFamiliar::create([
			'tipo_membresia_id'=>1,
			'tipo_familia_id'=>4,
			'descuento'=>6,
			'fecha_registro'=>'2016-10-15']); 

		TarifaFamiliar::create([
			'tipo_membresia_id'=>1,
			'tipo_familia_id'=>5,
			'descuento'=>1,
			'fecha_registro'=>'2016-10-15']);






		TarifaFamiliar::create([
			'tipo_membresia_id'=>2,
			'tipo_familia_id'=>1,
			'descuento'=>5,
			'fecha_registro'=>'2016-10-15']);

		TarifaFamiliar::create([
			'tipo_membresia_id'=>2,
			'tipo_familia_id'=>2,
			'descuento'=>7,
			'fecha_registro'=>'2016-10-15']); 

		TarifaFamiliar::create([
			'tipo_membresia_id'=>2,
			'tipo_familia_id'=>3,
			'descuento'=>8,
			'fecha_registro'=>'2016-10-15']); 

		TarifaFamiliar::create([
			'tipo_membresia_id'=>2,
			'tipo_familia_id'=>4,
			'descuento'=>6,
			'fecha_registro'=>'2016-10-15']); 

		TarifaFamiliar::create([
			'tipo_membresia_id'=>2,
			'tipo_familia_id'=>5,
			'descuento'=>1,
			'fecha_registro'=>'2016-10-15']);        
    }
}
