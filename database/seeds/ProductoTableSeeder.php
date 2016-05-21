<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Producto;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::insert([            
        	'nombre' => 'Polo PapusClub', 
        	'descripcion' => 'Polo de algodón',         	
        	'estado' => '1', 
        	'id_tipo_producto' => '1', 
        	]);
		
		Producto::insert([            
            'nombre' => 'Camisa PapusClub', 
            'descripcion' => 'Camisa de algodón',             
            'estado' => '1', 
            'id_tipo_producto' => '1', 
            ]);
		
        Producto::insert([            
            'nombre' => 'Gorro PapusClub', 
            'descripcion' => 'Gorro',             
            'estado' => '1', 
            'id_tipo_producto' => '2', 
            ]);

        Producto::insert([            
            'nombre' => 'Sombrero PapusClub', 
            'descripcion' => 'Sombrero',             
            'estado' => '1', 
            'id_tipo_producto' => '2', 
            ]);

        Producto::insert([            
            'nombre' => 'Taza PapusClub', 
            'descripcion' => 'Taza de café',             
            'estado' => '1', 
            'id_tipo_producto' => '3', 
            ]);

        Producto::insert([            
            'nombre' => 'Porta lapiceros PapusClub 1', 
            'descripcion' => 'Porta lapiceros de metal',             
            'estado' => '1', 
            'id_tipo_producto' => '3', 
            ]);

        Producto::insert([            
            'nombre' => 'Porta lapiceros PapusClub 2', 
            'descripcion' => 'Porta lapiceros de plástico',             
            'estado' => '1', 
            'id_tipo_producto' => '3', 
            ]);

        Producto::insert([            
            'nombre' => 'Agenda PapusClub', 
            'descripcion' => 'Agenda de 100 hojas',             
            'estado' => '1', 
            'id_tipo_producto' => '3', 
            ]);

        Producto::insert([            
            'nombre' => 'Llavero PapusClub', 
            'descripcion' => 'Llavero de metal con logo de PapusClub',             
            'estado' => '1', 
            'id_tipo_producto' => '4', 
            ]);
    }
}
