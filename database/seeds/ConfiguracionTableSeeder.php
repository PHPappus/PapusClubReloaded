<?php

use Illuminate\Database\Seeder;

use papusclub\Models\Configuracion;

class ConfiguracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuracion::insert([ 'valor' => 'limpieza' , 'grupo' => '1', 'descripcion'=>'tipos de puestos']);
        Configuracion::insert([ 'valor' => 'administrativo' , 'grupo' => '1', 'descripcion'=>'tipos de puestos']);
        Configuracion::insert([ 'valor' => 'logistica' , 'grupo' => '1', 'descripcion'=>'tipos de puestos']);
        Configuracion::insert([ 'valor' => 'seguridad' , 'grupo' => '1', 'descripcion'=>'tipos de puestos']);

        Configuracion::insert([ 'valor' => 'Bungalow' , 'grupo' => '2', 'descripcion'=>'tipos de ambientes']);
        Configuracion::insert([ 'valor' => 'Canchas' , 'grupo' => '2', 'descripcion'=>'tipos de ambientes']);
        Configuracion::insert([ 'valor' => 'Piscina' , 'grupo' => '2', 'descripcion'=>'tipos de ambientes']);
        Configuracion::insert([ 'valor' => 'Comedor' , 'grupo' => '2', 'descripcion'=>'tipos de ambientes']);
        Configuracion::insert([ 'valor' => 'Salon' , 'grupo' => '2', 'descripcion'=>'tipos de ambientes']);

        Configuracion::insert([ 'valor' => 'fiesta' , 'grupo' => '3', 'descripcion'=>'tipos de actividades']);
        Configuracion::insert([ 'valor' => 'deportiva' , 'grupo' => '3', 'descripcion'=>'tipos de actividades']);
        Configuracion::insert([ 'valor' => 'reunion' , 'grupo' => '3', 'descripcion'=>'tipos de actividades']);


        Configuracion::insert(['valor'=>'8','grupo'=>'5','descripcion'=>'duración del carnet en años']);

        Configuracion::insert([ 'valor' => 'Ropa' , 'grupo' => '6', 'descripcion'=>'Tipos de Productos']);
        Configuracion::insert([ 'valor' => 'Accesorios' , 'grupo' => '6', 'descripcion'=>'Tipos de Productos']);
        Configuracion::insert([ 'valor' => 'Utiles de Oficina' , 'grupo' => '6', 'descripcion'=>'Tipos de Productos']);
        Configuracion::insert([ 'valor' => 'Souvenirs' , 'grupo' => '6', 'descripcion'=>'Tipos de Productos']);
        Configuracion::insert([ 'valor' => 'Pagado' , 'grupo' => '7', 'descripcion'=>'Estado de Facturas']);
        Configuracion::insert([ 'valor' => 'Emitido' , 'grupo' => '7', 'descripcion'=>'Estado de Facturas']);
        Configuracion::insert([ 'valor' => 'Anulado' , 'grupo' => '7', 'descripcion'=>'Estado de Facturas']);
        Configuracion::insert([ 'valor' => 'Efectivo' , 'grupo' => '8', 'descripcion'=>'Estado de Facturas']);
        Configuracion::insert([ 'valor' => 'Credito' , 'grupo' => '8', 'descripcion'=>'Estado de Facturas']);

    }
}
