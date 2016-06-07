<?php

use Illuminate\Database\Seeder;
use papusclub\Models\TipoMembresia;

class TipoMembresiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoMembresia::create([
        	'tarifa_membresia_id'=>1,
        	'numMaxInvitados'=>25,
        	'descripcion'=>'Regular'
        	]);

        TipoMembresia::create([
        	'tarifa_membresia_id'=>2,
        	'numMaxInvitados'=>30,
        	'descripcion'=>'Vitalicio'
        	]);        
    }
}
