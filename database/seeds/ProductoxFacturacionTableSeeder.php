<?php

use Illuminate\Database\Seeder;
use papusclub\Models\ProductoxFacturacion;

class ProductoxFacturacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductoxFacturacion::insert([            
        	'producto_id' => '4', 
        	'facturacion_id' => '1',         	
        	'cantidad' => '2', 
        	'subtotal' => '60'
        	]);

        ProductoxFacturacion::insert([            
        	'producto_id' => '7', 
        	'facturacion_id' => '1',         	
        	'cantidad' => '1', 
        	'subtotal' => '10.5'
        	]);

        ProductoxFacturacion::insert([            
            'producto_id' => '2', 
            'facturacion_id' => '2',            
            'cantidad' => '3', 
            'subtotal' => '240'
            ]);

        ProductoxFacturacion::insert([            
            'producto_id' => '1', 
            'facturacion_id' => '2',            
            'cantidad' => '1', 
            'subtotal' => '50'
            ]);

        ProductoxFacturacion::insert([            
            'producto_id' => '10', 
            'facturacion_id' => '2',            
            'cantidad' => '1', 
            'subtotal' => '5.50'
            ]);

        ProductoxFacturacion::insert([            
            'producto_id' => '11', 
            'facturacion_id' => '2',            
            'cantidad' => '1', 
            'subtotal' => '4.50'
            ]);

        ProductoxFacturacion::insert([            
            'producto_id' => '1', 
            'facturacion_id' => '3',
            'cantidad' => '1', 
            'subtotal' => '50'
            ]);

        ProductoxFacturacion::insert([            
            'producto_id' => '3', 
            'facturacion_id' => '3',
            'cantidad' => '1', 
            'subtotal' => '25'
            ]);

        ProductoxFacturacion::insert([            
            'producto_id' => '10', 
            'facturacion_id' => '3',            
            'cantidad' => '1', 
            'subtotal' => '5.50'
            ]);

        ProductoxFacturacion::insert([            
            'producto_id' => '11', 
            'facturacion_id' => '3',            
            'cantidad' => '1', 
            'subtotal' => '4.50'
            ]);

        ProductoxFacturacion::insert([            
            'producto_id' => '3', 
            'facturacion_id' => '4',
            'cantidad' => '2', 
            'subtotal' => '50'
            ]);
    }
}
