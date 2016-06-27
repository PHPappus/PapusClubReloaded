<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Concesionaria;

class ConcesionariaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Concesionaria::insert([            
        	'sede_id' => '1',
		    'nombre' => 'Chifa Fu Jou',
		    'ruc' => '20528122915',
		    'descripcion' => 'Restaurante de comida oriental, ofrece platos a la carta y buffets con variedad de platos a elección.',
		    'telefono' => '5639182',
		    'correo' => 'fu_jou@gmail.com',
		    'nombre_responsable' => 'Mao Zedong',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Alimentos y Bebidas',
		    'fecha_inicio_concesion' => '2016-01-01',
		    'fecha_fin_concesion' => '2016-12-15'
        	]);

        Concesionaria::insert([            
        	'sede_id' => '1',
		    'nombre' => 'La Pergola',
		    'ruc' => '20143235915',
		    'descripcion' => 'Restaurante de comida nacional e internacional, ofrece el servicio de buffet los días domingo.',
		    'telefono' => '5439178',
		    'correo' => 'lapergola@gmail.com',
		    'nombre_responsable' => 'Martha Matos',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Alimentos y Bebidas',
		    'fecha_inicio_concesion' => '2015-01-01',
		    'fecha_fin_concesion' => '2017-01-10'
        	]);

        Concesionaria::insert([            
        	'sede_id' => '1',
		    'nombre' => 'La Eñe',
		    'ruc' => '20243223115',
		    'descripcion' => 'Especialidad en comida española y platos nacionales. Ofrece variedad de buffet los días domingo.',
		    'telefono' => '2433118',
		    'correo' => 'laenne@gmail.com',
		    'nombre_responsable' => 'Jose Antonio Gabari',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Alimentos y Bebidas',
		    'fecha_inicio_concesion' => '2016-01-01',
		    'fecha_fin_concesion' => '2016-08-30'
        	]);

        Concesionaria::insert([            
        	'sede_id' => '2',
		    'nombre' => 'Kiosko',
		    'ruc' => '20243213115',
		    'descripcion' => 'Servicio de venta de snacks y bebidas.',
		    'telefono' => '2433118',
		    'correo' => 'contacto_kisko@gmail.com',
		    'nombre_responsable' => 'Jose Capcha',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Alimentos y Bebidas',
		    'fecha_inicio_concesion' => '2016-01-01',
		    'fecha_fin_concesion' => '2017-03-30'
        	]);

        Concesionaria::insert([            
        	'sede_id' => '3',
		    'nombre' => 'Bar Cavalier',
		    'ruc' => '20713571355',
		    'descripcion' => 'Ofrece variedad de tragos y bebidas sin alcohol, así como piqueos. Servicio de Karaoke, Bar & Boxes.',
		    'telefono' => '5615118',
		    'correo' => 'bar_cavalier@gmail.com',
		    'nombre_responsable' => 'Guillermo Sanchez',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Alimentos y Bebidas',
		    'fecha_inicio_concesion' => '2015-02-01',
		    'fecha_fin_concesion' => '2016-09-05'
        	]);

        Concesionaria::insert([            
        	'sede_id' => '3',
		    'nombre' => 'Las Terrazas',
		    'ruc' => '20713571355',
		    'descripcion' => 'Especialidad en pescados y mariscos, ofrece comida criolla.',
		    'telefono' => '4645118',
		    'correo' => 'lasTerrazas@gmail.com',
		    'nombre_responsable' => 'Adolfo Chocce',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Alimentos y Bebidas',
		    'fecha_inicio_concesion' => '2016-02-01',
		    'fecha_fin_concesion' => '2017-02-28'
        	]);

        Concesionaria::insert([            
        	'sede_id' => '2',
		    'nombre' => 'Bodytech' ,
		    'ruc' => '20413126855',
		    'descripcion' => 'Gimnasio.',
		    'telefono' => '4641238',
		    'correo' => 'bodytech@gmail.com',
		    'nombre_responsable' => 'Johnny Bravo',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Deportes',
		    'fecha_inicio_concesion' => '2016-02-01',
		    'fecha_fin_concesion' => '2017-06-28'
        	]);

        Concesionaria::insert([            
        	'sede_id' => '2',
		    'nombre' => 'Confecciones Sprint' ,
		    'ruc' => '20713571355',
		    'descripcion' => 'Venta de ropa y artículos deportivos.',
		    'telefono' => '4341238',
		    'correo' => 'sprint@gmail.com',
		    'nombre_responsable' => 'Amilton Prado',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Deportes',
		    'fecha_inicio_concesion' => '2015-02-01',
		    'fecha_fin_concesion' => '2016-12-20'
        	]);

        Concesionaria::insert([            
        	'sede_id' => '3',
		    'nombre' => 'Martha Salon' ,
		    'ruc' => '20213571123',
		    'descripcion' => 'Estética de corte, color, cepillado, peinado, manicure-pedicure. Ofrece tratamientos faciales, corporales, laceados americano, brasilero y japonés y maquillaje.',
		    'telefono' => '2328532',
		    'correo' => 'martha_salon@gmail.com',
		    'nombre_responsable' => 'Elsa Long',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Peluquería y Spa',
		    'fecha_inicio_concesion' => '2015-02-01',
		    'fecha_fin_concesion' => '2016-12-20'
        	]);

        Concesionaria::insert([            
        	'sede_id' => '2',
		    'nombre' => 'Sauna' ,
		    'ruc' => '20713571355',
		    'descripcion' => 'Sauna Spa.',
		    'telefono' => '4567345',
		    'correo' => 'spa@gmail.com',
		    'nombre_responsable' => 'Elsa Una',
		    'estado' => '1',
		    'tipo_concesionaria' => 'Peluquería y Spa',
		    'fecha_inicio_concesion' => '2016-02-01',
		    'fecha_fin_concesion' => '2016-11-20'
        	]);
    }
}
