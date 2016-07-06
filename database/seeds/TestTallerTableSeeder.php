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
			        	'descripcion' 					=> 'Futbol para mayores de 18 años|HORARIOS| Sabados: 9-11 am | Domingos: 9-11 am',  
			        	'profesor'						=> 'Pelotudo',
			        	'fecha_inicio_inscripciones' 	=> Carbon::create(2016,7,01)->toDateString(), 
			        	'fecha_fin_inscripciones'    	=> Carbon::create(2016,7,10)->toDateString(), 
			        	'fecha_inicio' 					=> Carbon::create(2016,7,11)->toDateString(), 
			        	'fecha_fin' 					=> Carbon::create(2016,8,1)->toDateString(), 
			        	'cantidad_sesiones' 			=> 12,
			        	'vacantes' 						=> 50,
        ]);

        Taller::insert(['reserva_id'					=> 1,
        				'nombre' 						=> 'Futbol Niños', 
			        	'descripcion' 					=> 'Futbol para niños|HORARIOS|Lunes: 3-5 pm|Miercoles: 3-5pm|Viernes: 3-5pm|Sábado: 3-5pm', 
			        	'profesor'						=> 'Jugadorazo',
			        	'fecha_inicio_inscripciones' 	=> Carbon::create(2016,7,03)->toDateString(), 
			        	'fecha_fin_inscripciones'    	=> Carbon::create(2016,7,14)->toDateString(), 
			        	'fecha_inicio' 					=> Carbon::create(2016,7,22)->toDateString(), 
			        	'fecha_fin' 					=> Carbon::create(2016,8,04)->toDateString(), 
			        	'cantidad_sesiones' 			=> 10,
			        	'vacantes' 						=> 55,
        ]);

        Taller::insert(['reserva_id'					=> 1,
        				'nombre' 						=> 'Danzas folklóricas', 	
			        	'descripcion' 					=> 'Danzas originarias de Cuzco, de Ayacucho y de Trujillo|HORARIOS| Sabados: 9-11 am| Domingos: 9-11 am', 
			        	'profesor'						=> 'Danzarin',
			        	'fecha_inicio_inscripciones' 	=> Carbon::create(2016,7,04)->toDateString(), 
			        	'fecha_fin_inscripciones'    	=> Carbon::create(2016,7,15)->toDateString(), 
			        	'fecha_inicio' 					=> Carbon::create(2016,7,28)->toDateString(), 
			        	'fecha_fin' 					=> Carbon::create(2016,8,28)->toDateString(), 
			        	'cantidad_sesiones' 			=> 8,
			        	'vacantes' 						=> 40,
        ]);

        Taller::insert(['reserva_id'					=> 1,
        				'nombre' 						=> 'Taller de pintura', 	
			        	'descripcion' 					=> 'Oleo y lienzos al aire libre en el bosque del club|HORARIOS| Sabados: 9-11 am| Domingos: 9-11 am', 
			        	'profesor'						=> 'Pinturesco',
			        	'fecha_inicio_inscripciones' 	=> Carbon::create(2016,7,01)->toDateString(), 
			        	'fecha_fin_inscripciones'    	=> Carbon::create(2016,7,11)->toDateString(), 
			        	'fecha_inicio' 					=> Carbon::create(2016,7,12)->toDateString(), 
			        	'fecha_fin' 					=> Carbon::create(2016,7,24)->toDateString(), 
			        	'cantidad_sesiones' 			=> 4,
			        	'vacantes' 						=> 1,
        ]);
    }
}
