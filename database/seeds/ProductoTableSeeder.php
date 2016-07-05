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
        	'tipo_producto' => 'Ropa',
            'stock' => '90'
        	]);
		
		Producto::insert([            
            'nombre' => 'Camisa PapusClub', 
            'descripcion' => 'Camisa de algodón',             
            'estado' => '1', 
            'tipo_producto' => 'Ropa',
            'stock' => '100'
            ]);
		
        Producto::insert([            
            'nombre' => 'Gorro PapusClub', 
            'descripcion' => 'Gorro',             
            'estado' => '1', 
            'tipo_producto' => 'Accesorios',
            'stock' => '20'
            ]);

        Producto::insert([            
            'nombre' => 'Sombrero PapusClub', 
            'descripcion' => 'Sombrero',             
            'estado' => '1', 
            'tipo_producto' => 'Accesorios',
            'stock' => '1' 
            ]);

        Producto::insert([            
            'nombre' => 'Taza PapusClub', 
            'descripcion' => 'Taza de café',             
            'estado' => '1', 
            'tipo_producto' => 'Utiles de Oficina',
            'stock' => '20'
            ]);

        Producto::insert([            
            'nombre' => 'Porta lapiceros PapusClub 1', 
            'descripcion' => 'Porta lapiceros de metal',             
            'estado' => '1', 
            'tipo_producto' => 'Utiles de Oficina',
            'stock' => '0'
            ]);

        Producto::insert([            
            'nombre' => 'Porta lapiceros PapusClub 2', 
            'descripcion' => 'Porta lapiceros de plástico',             
            'estado' => '1', 
            'tipo_producto' => 'Utiles de Oficina',
            'stock' => '14'
            ]);

        Producto::insert([            
            'nombre' => 'Agenda PapusClub', 
            'descripcion' => 'Agenda de 100 hojas',             
            'estado' => '1', 
            'tipo_producto' => 'Utiles de Oficina',
            'stock' => '11'
            ]);

        Producto::insert([            
            'nombre' => 'Llavero PapusClub', 
            'descripcion' => 'Llavero de metal con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs',
            'stock' => '63'
            ]);
		
		Producto::insert([            
            'nombre' => 'Llavero PapusClub', 
            'descripcion' => 'Llavero de plástico con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs',
            'stock' => '31'
            ]);
		
		Producto::insert([            
            'nombre' => 'Pin PapusClub', 
            'descripcion' => 'Pin de metal con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs',
            'stock' => '19'
            ]);
			
		Producto::insert([            
            'nombre' => 'Bolsa Grande PapusClub', 
            'descripcion' => 'Bolsa grande de tela con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs',
            'stock' => '21'
            ]);
			
		Producto::insert([            
            'nombre' => 'Bolsa Pequeña PapusClub', 
            'descripcion' => 'Bolsa pequeña de tela con logo de PapusClub',             
            'estado' => '1', 
           'tipo_producto' => 'Souvenirs',
            'stock' => '15'
            ]);

        Producto::insert([            
            'nombre' => 'Mantenimiento de piscina', 
            'descripcion' => 'Mantenimiento de piscina',             
            'estado' => '1', 
           'tipo_producto' => 'Servicio',
            'stock' => 1
            ]);

        Producto::insert([            
            'nombre' => 'Limpieza de ambiente', 
            'descripcion' => 'Limpieza de ambiente',             
            'estado' => '1', 
           'tipo_producto' => 'Servicio',
            'stock' => 1
            ]);

        Producto::insert([            
            'nombre' => 'Decoracion de ambiente', 
            'descripcion' => 'Decoracion de ambiente para fiestas y eventos',             
            'estado' => '1', 
           'tipo_producto' => 'Servicio',
            'stock' => 1
            ]);

        Producto::insert([            
            'nombre' => 'Animación de eventos', 
            'descripcion' => 'Animación de fiestas o eventos',             
            'estado' => '1', 
           'tipo_producto' => 'Servicio',
            'stock' => 1
            ]);

        Producto::insert([            
            'nombre' => 'Mantenimiento de áreas verdes', 
            'descripcion' => 'Mantenimiento de jardines, campos de fútbol y áreas verdes en general',             
            'estado' => '1', 
           'tipo_producto' => 'Servicio',
            'stock' => 1
            ]);
    }
}
