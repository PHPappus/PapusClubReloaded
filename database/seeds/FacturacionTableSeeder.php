<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Facturacion;

class FacturacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facturacion::insert([            
        	'persona_id' => '2', 
        	'total' => '70.5',         	
        	'tipo_pago' => 'Efectivo', 
        	'estado' => 'Pagado'
        	]);

        Facturacion::insert([            
        	'persona_id' => '2', 
        	'total' => '300',         	
        	'tipo_pago' => 'Efectivo', 
        	'estado' => 'Pagado'
        	]);

        Facturacion::insert([            
        	'persona_id' => '3', 
        	'total' => '85',         	
        	'tipo_pago' => 'Credito', 
        	'estado' => 'Emitido'
        	]);
    }
}
