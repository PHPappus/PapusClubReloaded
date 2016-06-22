<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Promocion;

class PromocionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promocion::insert([
        	'estado' => 'Activo',
        	'descripcion' => 'Toneando con Tongo', 
        	'montoDescuento' => '70.8', 
            'porcentajeDescuento'=> '1.5'
        	]);
        
    }
}
