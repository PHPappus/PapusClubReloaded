<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Departamento;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['nombre'=>'AMAZONAS']);
		Departamento::create(['nombre'=>'ANCASH']);
		Departamento::create(['nombre'=>'APURIMAC']);
		Departamento::create(['nombre'=>'AREQUIPA']);
		Departamento::create(['nombre'=>'AYACUCHO']);
		Departamento::create(['nombre'=>'CAJAMARCA']);
		Departamento::create(['nombre'=>'CALLAO']);
		Departamento::create(['nombre'=>'CUSCO']);
		Departamento::create(['nombre'=>'HUANCAVELICA']);
		Departamento::create(['nombre'=>'HUANUCO']);
		Departamento::create(['nombre'=>'ICA']);
		Departamento::create(['nombre'=>'JUNIN']);
		Departamento::create(['nombre'=>'LA LIBERTAD']);
		Departamento::create(['nombre'=>'LAMBAYEQUE']);
		Departamento::create(['nombre'=>'LIMA']);
		Departamento::create(['nombre'=>'LORETO']);
		Departamento::create(['nombre'=> 'MADRE DE DIOS']);
		Departamento::create(['nombre'=>'MOQUEGUA']);
		Departamento::create(['nombre'=>'PASCO']);
		Departamento::create(['nombre'=> 'PIURA']);
		Departamento::create(['nombre'=> 'PUNO']);
		Departamento::create(['nombre'=>'SAN MARTIN']);
		Departamento::create(['nombre'=>'TACNA']);
		Departamento::create(['nombre'=> 'TUMBES']);
		Departamento::create(['nombre'=>'UCAYALI']);
    }
}

