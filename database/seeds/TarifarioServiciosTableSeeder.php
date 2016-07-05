<?php

use Illuminate\Database\Seeder;
use papusclub\Models\TarifarioServicio;

class TarifarioServiciosTableSeeder extends Seeder
{
   
    public function run()
    {
      
		 TarifarioServicio::insert([            
        	'idservicio' => 1, 
        	'idtipopersona' => 1,         	
        	'descripcionparafecha' => '12', 
        	'precio' => 40,
        	'estado' => True
        	]);
		 TarifarioServicio::insert([            
        	'idservicio' => 1, 
        	'idtipopersona' => 2,         	
        	'descripcionparafecha' => 'pos', 
        	'precio' => 80,
        	'estado' => True
        	]);
		 TarifarioServicio::insert([            
        	'idservicio' => 1, 
        	'idtipopersona' => 3,         	
        	'descripcionparafecha' => 'ter', 
        	'precio' => 120,
        	'estado' => True
        	]);

		TarifarioServicio::insert([            
        	'idservicio' => 2, 
        	'idtipopersona' => 1,         	
        	'descripcionparafecha' => '12', 
        	'precio' => 20,
        	'estado' => True
        	]);
		 TarifarioServicio::insert([            
        	'idservicio' => 2, 
        	'idtipopersona' => 2,         	
        	'descripcionparafecha' => 'pos', 
        	'precio' => 40,
        	'estado' => True
        	]);
		 TarifarioServicio::insert([            
        	'idservicio' => 2, 
        	'idtipopersona' => 3,         	
        	'descripcionparafecha' => 'ter', 
        	'precio' => 80,
        	'estado' => True
        	]);

		 TarifarioServicio::insert([            
        	'idservicio' => 3, 
        	'idtipopersona' => 1,         	
        	'descripcionparafecha' => '12', 
        	'precio' => 15,
        	'estado' => True
        	]);
		 TarifarioServicio::insert([            
        	'idservicio' => 3, 
        	'idtipopersona' => 2,         	
        	'descripcionparafecha' => 'pos', 
        	'precio' => 30,
        	'estado' => True
        	]);
		 TarifarioServicio::insert([            
        	'idservicio' => 3, 
        	'idtipopersona' => 3,         	
        	'descripcionparafecha' => 'ter', 
        	'precio' => 40,
        	'estado' => True
        	]);

		 TarifarioServicio::insert([            
        	'idservicio' => 4, 
        	'idtipopersona' => 1,         	
        	'descripcionparafecha' => '12', 
        	'precio' => 15,
        	'estado' => True
        	]);
		 TarifarioServicio::insert([            
        	'idservicio' => 4, 
        	'idtipopersona' => 2,         	
        	'descripcionparafecha' => 'pos', 
        	'precio' => 30,
        	'estado' => True
        	]);
		 TarifarioServicio::insert([            
        	'idservicio' => 4, 
        	'idtipopersona' => 3,         	
        	'descripcionparafecha' => 'ter', 
        	'precio' => 40,
        	'estado' => True
        	]);
	}
}