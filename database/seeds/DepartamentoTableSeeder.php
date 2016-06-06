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
        Departamento::insert(['nombre' => 'AMAZONAS']);
        Departamento::insert(['nombre' => 'ANCASH']);
        Departamento::insert(['nombre' => 'APURIMAC']);
        Departamento::insert(['nombre' => 'AREQUIPA']);
        Departamento::insert(['nombre' => 'AYACUCHO']);
        Departamento::insert(['nombre' => 'CAJAMARCA']);
        Departamento::insert(['nombre' => 'CALLAO']);
        Departamento::insert(['nombre' => 'CUSCO']);
        Departamento::insert(['nombre' => 'HUANCAVELICA']);
        Departamento::insert(['nombre' => 'HUANUCO']);
        Departamento::insert(['nombre' => 'ICA']);
        Departamento::insert(['nombre' => 'JUNIN']);
        Departamento::insert(['nombre' => 'LA LIBERTAD']);
        Departamento::insert(['nombre' => 'LAMBAYEQUE']);
        Departamento::insert(['nombre' => 'LIMA']);
        Departamento::insert(['nombre' => 'LORETO']);
        Departamento::insert(['nombre' => 'MADRE DE DIOS']);
        Departamento::insert(['nombre' => 'MOQUEGUA']);
        Departamento::insert(['nombre' => 'PASCO']);
        Departamento::insert(['nombre' => 'PIURA']);
        Departamento::insert(['nombre' => 'PUNO']);
        Departamento::insert(['nombre' => 'SAN MARTIN']);
        Departamento::insert(['nombre' => 'TACNA']);
        Departamento::insert(['nombre' => 'TUMBES']);
        Departamento::insert(['nombre' => 'UCAYALI']);

    }
}
