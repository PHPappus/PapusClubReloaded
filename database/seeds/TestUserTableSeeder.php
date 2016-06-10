<?php

use Illuminate\Database\Seeder;
use papusclub\User;

class TestUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    User::insert([ 'name' => 'Julio Pacheco' , 'email' => 'socio@mail.com', 'perfil_id'=>1,
	    			   'persona_id' => 4,'password' => bcrypt('123456')]);//Perfil Socio
	    User::insert([ 'name' => 'Luis Flores' , 'email' => 'adming@mail.com', 'perfil_id'=>2,
	    			   'persona_id' => 2,'password' => bcrypt('123456')]);//Perfil Administrador General
	    User::insert([ 'name' => 'Carlos Chavez' , 'email' => 'adminp@mail.com', 'perfil_id'=>3,
	    			   'persona_id' => 2,'password' => bcrypt('123456')]);//Perfil Administrador de Pagos
	    User::insert([ 'name' => 'Juan Perez' , 'email' => 'adminr@mail.com', 'perfil_id'=>4,
	    			   'persona_id' => 2,'password' => bcrypt('123456')]);//Perfil Administrador de Registros
	    User::insert([ 'name' => 'Jose Quispe' , 'email' => 'gerente@mail.com', 'perfil_id'=>5,
	    			   'persona_id' => 2,'password' => bcrypt('123456')]);//Perfil Gerente 

	    User::insert([ 'name' => 'Susana Oria' , 'email' => 'adminpersona@mail.com', 
	    				'perfil_id'=>6, 'persona_id' => 2,'password' => bcrypt('123456')]);//Perfil Administrador de Persona 
	    User::insert([ 'name' => 'Elvis Nieto' , 'email' => 'adminreserva@mail.com', 
	    				'perfil_id'=>7,'persona_id' => 2,'password' => bcrypt('123456')]);//Perfil Administrador de Reserva 
	    User::insert([ 'name' => 'Elgar Gajo' , 'email' => 'publico@mail.com', 
	    				'perfil_id'=>8,'persona_id' => 2,'password' => bcrypt('123456')]);//Perfil Publico   
    }
}