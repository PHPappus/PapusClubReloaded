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

        Configuracion::insert([ 'valor' => 'Bungalow' , 'grupo' => '2', 'descripcion'=>'Tipos de Ambientes']);
        Configuracion::insert([ 'valor' => 'Canchas' , 'grupo' => '2', 'descripcion'=>'Tipos de Ambientes']);
        Configuracion::insert([ 'valor' => 'Piscina' , 'grupo' => '2', 'descripcion'=>'Tipos de Ambientes']);
        Configuracion::insert([ 'valor' => 'Comedor' , 'grupo' => '2', 'descripcion'=>'Tipos de Ambientes']);
        Configuracion::insert([ 'valor' => 'Salon' , 'grupo' => '2', 'descripcion'=>'Tipos de Ambientes']);

        Configuracion::insert([ 'valor' => 'Fiesta' , 'grupo' => '3', 'descripcion'=>'Tipos de Actividades']);
        Configuracion::insert([ 'valor' => 'Deportiva' , 'grupo' => '3', 'descripcion'=>'Tipos de Actividades']);
        Configuracion::insert([ 'valor' => 'Reunion' , 'grupo' => '3', 'descripcion'=>'Tipos de Actividades']);


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

        Configuracion::insert(['valor'=>'Padre','grupo'=>'9','descripcion'=>'tipo relacion familiar']);
        Configuracion::insert(['valor'=>'Madre','grupo'=>'9','descripcion'=>'tipo relacion familiar']);
        Configuracion::insert(['valor'=>'Esposa','grupo'=>'9','descripcion'=>'tipo relacion familiar']);
        Configuracion::insert(['valor'=>'Hijo','grupo'=>'9','descripcion'=>'tipo relacion familiar']);
        Configuracion::insert(['valor'=>'Hija','grupo'=>'9','descripcion'=>'tipo relacion familiar']);

        Configuracion::insert(['valor'=>'Boleta','grupo'=>'10','descripcion'=>'tipo de comprobante']);
        Configuracion::insert(['valor'=>'Factura','grupo'=>'10','descripcion'=>'tipo de comprobante']);

        Configuracion::insert(['valor'=>'Soltero(a)','grupo'=>'11','descripcion'=>'estado civil']);
        Configuracion::insert(['valor'=>'Casado(a)','grupo'=>'11','descripcion'=>'estado civil']);
        Configuracion::insert(['valor'=>'Viudo(a)','grupo'=>'11','descripcion'=>'estado civil']);
        Configuracion::insert(['valor'=>'Divorciado(a)','grupo'=>'11','descripcion'=>'estado civil']);



    }
}
