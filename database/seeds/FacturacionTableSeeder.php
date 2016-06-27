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
            'numero_comprobante' => '1',
        	'total' => '70.5',         	
        	'tipo_pago' => 'Efectivo', 
            'tipo_comprobante' => 'Boleta',
        	'estado' => 'Pagado',
            'descripcion' => 'Venta de Productos'               
        	]);

        Facturacion::insert([            
        	'persona_id' => '2', 
            'numero_comprobante' => '1',
        	'total' => '300',         	
        	'tipo_pago' => 'Efectivo', 
            'tipo_comprobante' => 'Factura',
        	'estado' => 'Pagado',
            'descripcion' => 'Venta de Productos'   
        	]);

        Facturacion::insert([            
        	'persona_id' => '3', 
            'numero_comprobante' => '2',
        	'total' => '85',         	
        	'tipo_pago' => 'Credito', 
            'tipo_comprobante' => 'Boleta',
        	'estado' => 'Emitido',
            'descripcion' => 'Venta de Productos'   
        	]);

        Facturacion::insert([            
            'persona_id' => '3', 
            'numero_comprobante' => '3',
            'total' => '50',
            'tipo_pago' => 'Credito', 
            'tipo_comprobante' => 'Boleta',
            'estado' => 'Emitido',
            'descripcion' => 'Venta de Productos'   
            ]);
        Facturacion::insert([            
            'persona_id' => '4', 
            'total' => '30',
            'tipo_pago' => 'Credito', 
            'tipo_comprobante' => 'Boleta',
            'estado' => 'Emitido',
            'reserva_id'=>1
            ]);
        Facturacion::insert([            
            'persona_id' => '5', 
            'total' => '40',
            'tipo_pago' => 'Credito', 
            'tipo_comprobante' => 'Boleta',
            'estado' => 'Emitido',
            'reserva_id'=>2
            ]);
    }
}
