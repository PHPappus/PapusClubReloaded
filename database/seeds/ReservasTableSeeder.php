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
            'persona_id'=> 1,
            'sede_id'=> 1, 
        	'ambiente_id' => 1,
            'fecha_inicio_reserva'=>Carbon::create(2016, 12, 12),
            'fecha_fin_reserva'=>Carbon::create(2016, 12, 13)
        	]);
    }
}
