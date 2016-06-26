<?php

use Illuminate\Database\Seeder;
use papusclub\Models\TipoPersona;

class TipoPersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPersona::insert(['descripcion' => 'trabajador']);
        TipoPersona::insert(['descripcion' => 'postulante']);
        TipoPersona::insert(['descripcion' => 'tercero']);
        TipoPersona::insert(['descripcion' => 'vip']);
    }
}
