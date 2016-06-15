<?php

use Illuminate\Database\Seeder;

class PromocionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Promocion::insert([
        	'estado' => 'Activo',
        	'descripcion' => 'Toneando con Tongo', 
        	'montoDescuento' => 70.8, 
            'porcentajeDescuento'=> 1.5,
            'fecha_registro'=>=>Carbon::create(1994,1,24)->toDateString()
        	]);

        
    }
}
