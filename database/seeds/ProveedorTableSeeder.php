<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Proveedor;

class ProveedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::insert([            
        	'nombre_proveedor' => 'Los Portales S.A.', 
        	'ruc' => '20301837896', 
        	'telefono' => ' 2114466', 
        	'correo' => 'losportales@gmail.com', 
        	'direccion' => 'Jr. Ugarte y Moscoso Nº 991 - Magdalena del Mar', 
        	'nombre_responsable' => 'Oscar del Portal', 
        	'estado' => '1', 
        	'id_tipo_proveedor' => '13', 
        	]);
		
		Proveedor::insert([            
        	'nombre_proveedor' => 'SILSA', 
        	'ruc' => '20100362598', 
        	'telefono' => '6144600', 
        	'correo' => 'silsa@gmail.com', 
        	'direccion' => 'Cal. los Negocios Nro. 467', 
        	'nombre_responsable' => 'Silvia Saravia', 
        	'estado' => '1', 
        	'id_tipo_proveedor' => '10', 
        	]);
		
    }
}
