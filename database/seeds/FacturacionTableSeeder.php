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
            'tipo_comprobante' => 'Boleta',
        	'estado' => 'Pagado',
            'reserva_id'=>1
        	]);

        Facturacion::insert([            
        	'persona_id' => '2', 
        	'total' => '300',         	
        	'tipo_pago' => 'Efectivo', 
            'tipo_comprobante' => 'Factura',
        	'estado' => 'Pagado',
            'reserva_id'=>2
        	]);

        Facturacion::insert([            
        	'persona_id' => '3', 
        	'total' => '85',         	
        	'tipo_pago' => 'Credito', 
            'tipo_comprobante' => 'Boleta',
        	'estado' => 'Emitido',
            'reserva_id'=>3
        	]);

        Facturacion::insert([            
            'persona_id' => '3', 
            'total' => '20',
            'tipo_pago' => 'Credito', 
            'tipo_comprobante' => 'Boleta',
            'estado' => 'Emitido',
            'reserva_id'=>4
            ]);
        Facturacion::insert([            
            'persona_id' => '4', 
            'total' => '30',
            'tipo_pago' => 'Credito', 
            'tipo_comprobante' => 'Boleta',
            'estado' => 'Emitido',
            'reserva_id'=>5
            ]);
        Facturacion::insert([            
            'persona_id' => '5', 
            'total' => '40',
            'tipo_pago' => 'Credito', 
            'tipo_comprobante' => 'Boleta',
            'estado' => 'Emitido',
            'reserva_id'=>6
            ]);
    }
}
