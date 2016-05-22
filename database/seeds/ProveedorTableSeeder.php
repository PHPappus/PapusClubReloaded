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
		
		Proveedor::insert([            
        	'nombre_proveedor' => 'UDOSA', 
        	'ruc' => '19283748291', 
        	'telefono' => '5632166', 
        	'correo' => 'info@udosa.pe', 
        	'direccion' => 'Calle Las Begonias 345 - San Isidro', 
        	'nombre_responsable' => 'Rodrigo Fernandez', 
        	'estado' => '1', 
        	'id_tipo_proveedor' => '5', 
        	]);
		 	 	 	 	
		Proveedor::insert([            
        	'nombre_proveedor' => 'Gardenium S.A.C.', 
        	'ruc' => '20557346661', 
        	'telefono' => '5844925', 
        	'correo' => 'info@gardenium.pe', 
        	'direccion' => 'Av. Manuel Olguin Torre a Nro. 745 Dpto. 2501 - Surco', 
        	'nombre_responsable' => 'Gardenio Flores', 
        	'estado' => '1', 
        	'id_tipo_proveedor' => '6', 
        	]);
			 	 	 	 	 	
		Proveedor::insert([            
        	'nombre_proveedor' => 'Aqua Pool Ingenieros S.A.C.', 
        	'ruc' => '20555042532', 
        	'telefono' => '4463186', 
        	'correo' => 'infoventas@aquapoolperu.com', 
        	'direccion' => 'Av. Rep?blica de Panam? 4298 - Surquillo', 
        	'nombre_responsable' => 'Marina R?os', 
        	'estado' => '1', 
        	'id_tipo_proveedor' => '4', 
        	]);
    }
}
