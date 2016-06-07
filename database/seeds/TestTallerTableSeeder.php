<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Taller;
use Carbon\Carbon;

class TestTallerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taller::insert(['reserva_id'					=> 1,
        				'nombre' 						=> 'Futbol Adultos', 
			        	'descripcion' 					=> 'Futbol para mayores de 18 años| Sabados: 9-11 am| Domingos: 9-11 am',  
			        	'fecha_inicio_inscripciones' 	=> Carbon::create(2016,7,10)->toDateString(), 
			        	'fecha_fin_inscripciones'    	=> Carbon::create(2016,7,24)->toDateString(), 
			        	'fecha_inicio' 					=> Carbon::create(2016,8,1)->toDateString(), 
			        	'fecha_fin' 					=> Carbon::create(2016,9,1)->toDateString(), 
			        	'cantidad_sesiones' 			=> 12,
			        	'vacantes' 						=> 50,
        ]);

        Taller::insert(['reserva_id'					=> 1,
        				'nombre' 						=> 'Futbol Niños', 
			        	'descripcion' 					=> 'Futbol para niños|Lunes: 3-5 pm|Miercoles: 3-5pm|Viernes: 3-5pm|Sábado: 3-5pm', 
			        	'fecha_inicio_inscripciones' 	=> Carbon::create(2016,7,8)->toDateString(), 
			        	'fecha_fin_inscripciones'    	=> Carbon::create(2016,7,22)->toDateString(), 
			        	'fecha_inicio' 					=> Carbon::create(2016,7,28)->toDateString(), 
			        	'fecha_fin' 					=> Carbon::create(2016,8,28)->toDateString(), 
			        	'cantidad_sesiones' 			=> 10,
			        	'vacantes' 						=> 55,
        ]);

        Taller::insert(['reserva_id'					=> 1,
        				'nombre' 						=> 'Danzas folklóricas', 	
			        	'descripcion' 					=> 'Danzas originarias de Cuzco, de Ayacucho y de Trujillo| Sabados: 9-11 am| Domingos: 9-11 am', 
			        	'fecha_inicio_inscripciones' 	=> Carbon::create(2016,7,8)->toDateString(), 
			        	'fecha_fin_inscripciones'    	=> Carbon::create(2016,7,22)->toDateString(), 
			        	'fecha_inicio' 					=> Carbon::create(2016,7,28)->toDateString(), 
			        	'fecha_fin' 					=> Carbon::create(2016,8,28)->toDateString(), 
			        	'cantidad_sesiones' 			=> 8,
			        	'vacantes' 						=> 50,
        ]);
    }
}
