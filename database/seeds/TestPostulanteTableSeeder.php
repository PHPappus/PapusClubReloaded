<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Postulante;
#use Carbon\Carbon;

class TestPostulanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taller::insert(['id_postulante'					=> 1,
        				'ruc' 							=> 123456789, 
			        	'direccion' 					=> 'my papus home',
			        	'pais_nacimiento'				=> 'PeruvianPapu',
			        	'lugar_nacimiento'				=> 'PeruvianCityPapu',
			        	'colegio_primario'				=> 'PapusSchool', 
    					'colegio_secundario'			=> 'HighPapusSchool',
    					'univeridad'					=> 'UniversityOfPapus', 
    					'profesion'						=> 'PapuMaster', 
    					'centro_trabajo'				=> 'PapusWork',
    					'cargo_centro_trabajo'			=> 'PapusEnterprise', 
    					'direccionLaboral'				=> 'PapusDirection', 
    					'estado_civil'					=> 'EsComplicadoPapu',
    					'nro_hijos'						=> 10, 
    					'domicilio'						=> 'MyPapusHomeAgain', 
    					'telefono_domicilio'			=> 123456789,
    					'telefono_celular'				=> 987654321
			        	#'pais_nacimiento' 	=> 			Carbon::create(2016,7,10)->toDateString(), 
			       
        ]);

    }
}
