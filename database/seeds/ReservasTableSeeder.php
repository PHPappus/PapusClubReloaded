<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Reserva;
use Carbon\Carbon;
class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Reserva::insert([
        	'estadoReserva' => 'Activo', 
        	'precio' => 70.8, 
            'id_persona'=> 1,
            'ambiente_id' => 1,
            'fecha_inicio_reserva'=>Carbon::create(2016, 12, 12),
            'fecha_fin_reserva'=>Carbon::create(2016, 12, 13)
        	]);

        Reserva::insert([
            'estadoReserva' => 'Activo', 
            'precio' => 100, 
            'id_persona'=> 2,
            'ambiente_id' => 2,
            'fecha_inicio_reserva'=>Carbon::create(2016, 12, 12),
            'fecha_fin_reserva'=>Carbon::create(2016, 12, 15)
            ]);

        Reserva::insert([
            'estadoReserva' => 'Activo', 
            'precio' => 50, 
            'id_persona'=> 3,
            'ambiente_id' => 3,
            'fecha_inicio_reserva'=>Carbon::create(2016, 12, 12),
            'fecha_fin_reserva'=>Carbon::create(2016, 12, 20)
            ]);

        Reserva::insert([
            'estadoReserva' => 'Activo', 
            'precio' => 20, 
            'id_persona'=> 4,
            'ambiente_id' => 4,
            'fecha_inicio_reserva'=>Carbon::create(2016, 12, 12),
            'fecha_fin_reserva'=>Carbon::create(2016, 12, 13)
            ]);

        Reserva::insert([
            'estadoReserva' => 'Activo', 
            'precio' => 20, 
            'id_persona'=> 4,
            'ambiente_id' => 3,
            'fecha_inicio_reserva'=>Carbon::create(2016, 10, 12),
            'fecha_fin_reserva'=>Carbon::create(2016, 10, 13)
            ]);

        Reserva::insert([
            'estadoReserva' => 'Activo', 
            'precio' => 20, 
            'id_persona'=> 4,
            'ambiente_id' => 2,
            'fecha_inicio_reserva'=>Carbon::create(2016, 12, 12),
            'fecha_fin_reserva'=>Carbon::create(2016, 12, 13)
            ]);
        
    }
}
