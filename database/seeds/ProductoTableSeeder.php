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
        	'tipo_producto' => 'Ropa'
        	]);
		
		Producto::insert([            
            'nombre' => 'Camisa PapusClub', 
            'descripcion' => 'Camisa de algodón',             
            'estado' => '1', 
            'tipo_producto' => 'Ropa'
            ]);
		
        Producto::insert([            
            'nombre' => 'Gorro PapusClub', 
            'descripcion' => 'Gorro',             
            'estado' => '1', 
            'tipo_producto' => 'Accesorios' 
            ]);

        Producto::insert([            
            'nombre' => 'Sombrero PapusClub', 
            'descripcion' => 'Sombrero',             
            'estado' => '1', 
            'tipo_producto' => 'Accesorios' 
            ]);

        Producto::insert([            
            'nombre' => 'Taza PapusClub', 
            'descripcion' => 'Taza de café',             
            'estado' => '1', 
            'tipo_producto' => 'Utiles de Oficina' 
            ]);

        Producto::insert([            
            'nombre' => 'Porta lapiceros PapusClub 1', 
            'descripcion' => 'Porta lapiceros de metal',             
            'estado' => '1', 
            'tipo_producto' => 'Utiles de Oficina' 
            ]);

        Producto::insert([            
            'nombre' => 'Porta lapiceros PapusClub 2', 
            'descripcion' => 'Porta lapiceros de plástico',             
            'estado' => '1', 
            'tipo_producto' => 'Utiles de Oficina' 
            ]);

        Producto::insert([            
            'nombre' => 'Agenda PapusClub', 
            'descripcion' => 'Agenda de 100 hojas',             
            'estado' => '1', 
            'tipo_producto' => 'Utiles de Oficina' 
            ]);

        Producto::insert([            
            'nombre' => 'Llavero PapusClub', 
            'descripcion' => 'Llavero de metal con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs'
            ]);
		
		Producto::insert([            
            'nombre' => 'Llavero PapusClub', 
            'descripcion' => 'Llavero de plástico con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs'
            ]);
		
		Producto::insert([            
            'nombre' => 'Pin PapusClub', 
            'descripcion' => 'Pin de metal con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs'
            ]);
			
		Producto::insert([            
            'nombre' => 'Bolsa Grande PapusClub', 
            'descripcion' => 'Bolsa grande de tela con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs'
            ]);
			
		Producto::insert([            
            'nombre' => 'Bolsa Pequeña PapusClub', 
            'descripcion' => 'Bolsa pequeña de tela con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs'
            ]);
    }
}
