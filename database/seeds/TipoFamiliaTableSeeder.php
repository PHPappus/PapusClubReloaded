<?php

use Illuminate\Database\Seeder;
use papusclub\Models\TipoFamilia;

class TipoFamiliaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoFamilia::create(['nombre'=>'Hijo/a']);
        TipoFamilia::create(['nombre'=>'Padre']);
        TipoFamilia::create(['nombre'=>'Madre']); 
        TipoFamilia::create(['nombre'=>'Esposo/a']);
        TipoFamilia::create(['nombre'=>'Hermano/a']);               
    }
}
