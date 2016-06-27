<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Trabajador;

class TrabajadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trabajador::create(['id'=> 2 , 'puesto'=> 1, 'fecha_ini_contrato' => '2016-06-12' , 'fecha_fin_contrato' => '2016-06-30' ]);
    }
}
