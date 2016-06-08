<?php

use Illuminate\Database\Seeder;
use papusclub\Models\PrecioProducto;

class PrecioProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrecioProducto::insert([            
        	'producto_id' => '1', 
        	'precio' => '50',         	
        	'estado' => '1'
        	]);
		
		PrecioProducto::insert([            
            'producto_id' => '2', 
            'precio' => '80',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '3', 
            'precio' => '25',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '4', 
            'precio' => '30',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '5', 
            'precio' => '9.90',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '6', 
            'precio' => '15.50',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '7', 
            'precio' => '10.50',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '8', 
            'precio' => '10.50',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '9', 
            'precio' => '7.50',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '10', 
            'precio' => '5.50',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '11', 
            'precio' => '4.50',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '12', 
            'precio' => '9.90',           
            'estado' => '1'
            ]);

        PrecioProducto::insert([            
            'producto_id' => '13', 
            'precio' => '16.50',           
            'estado' => '1'
            ]);
    }
}
