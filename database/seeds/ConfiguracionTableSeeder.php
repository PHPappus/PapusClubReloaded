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

        Configuracion::insert([ 'valor' => 'Fiesta' , 'grupo' => '3', 'descripcion'=>'Tipos de Actividades']); //10
        Configuracion::insert([ 'valor' => 'Deportiva' , 'grupo' => '3', 'descripcion'=>'Tipos de Actividades']);
        Configuracion::insert([ 'valor' => 'Reunion' , 'grupo' => '3', 'descripcion'=>'Tipos de Actividades']);
        Configuracion::insert([ 'valor' => 'Evento' , 'grupo' => '3', 'descripcion'=>'Tipos de Actividades']);

        Configuracion::insert([ 'valor' => 'Deportivo' , 'grupo' => '4', 'descripcion'=>'tipo de servicio']);
        Configuracion::insert([ 'valor' => 'Ocio' , 'grupo' => '4', 'descripcion'=>'tipo de servicio']);
        Configuracion::insert([ 'valor' => 'Recreacional' , 'grupo' => '4', 'descripcion'=>'tipo de servicio']);
        Configuracion::insert([ 'valor' => 'A Bungalow' , 'grupo' => '4', 'descripcion'=>'tipo de servicio']);
        
        Configuracion::insert(['valor'=>'8','grupo'=>'5','descripcion'=>'duración del carnet en años']);

        Configuracion::insert([ 'valor' => 'Ropa' , 'grupo' => '6', 'descripcion'=>'Tipos de Productos']);
        Configuracion::insert([ 'valor' => 'Accesorios' , 'grupo' => '6', 'descripcion'=>'Tipos de Productos']); //20
        Configuracion::insert([ 'valor' => 'Utiles de Oficina' , 'grupo' => '6', 'descripcion'=>'Tipos de Productos']);
        Configuracion::insert([ 'valor' => 'Souvenirs' , 'grupo' => '6', 'descripcion'=>'Tipos de Productos']);
        Configuracion::insert([ 'valor' => 'Servicio' , 'grupo' => '6', 'descripcion'=>'Tipos de Productos']);

        Configuracion::insert([ 'valor' => 'Pagado' , 'grupo' => '7', 'descripcion'=>'Estado de Facturas']);
        Configuracion::insert([ 'valor' => 'Emitido' , 'grupo' => '7', 'descripcion'=>'Estado de Facturas']);
        Configuracion::insert([ 'valor' => 'Anulado' , 'grupo' => '7', 'descripcion'=>'Estado de Facturas']);

        Configuracion::insert([ 'valor' => 'Efectivo' , 'grupo' => '8', 'descripcion'=>'Estado de Facturas']);
        Configuracion::insert([ 'valor' => 'Credito' , 'grupo' => '8', 'descripcion'=>'Estado de Facturas']);

        Configuracion::insert(['valor'=>'Padre','grupo'=>'9','descripcion'=>'tipo relacion familiar']);
        Configuracion::insert(['valor'=>'Madre','grupo'=>'9','descripcion'=>'tipo relacion familiar']); //30
        Configuracion::insert(['valor'=>'Esposa','grupo'=>'9','descripcion'=>'tipo relacion familiar']);
        Configuracion::insert(['valor'=>'Hijo','grupo'=>'9','descripcion'=>'tipo relacion familiar']);
        Configuracion::insert(['valor'=>'Hija','grupo'=>'9','descripcion'=>'tipo relacion familiar']);

        Configuracion::insert(['valor'=>'Boleta','grupo'=>'10','descripcion'=>'tipo de comprobante']);
        Configuracion::insert(['valor'=>'Factura','grupo'=>'10','descripcion'=>'tipo de comprobante']);

        Configuracion::insert(['valor'=>'Soltero(a)','grupo'=>'11','descripcion'=>'estado civil']);
        Configuracion::insert(['valor'=>'Casado(a)','grupo'=>'11','descripcion'=>'estado civil']);
        Configuracion::insert(['valor'=>'Viudo(a)','grupo'=>'11','descripcion'=>'estado civil']);
        Configuracion::insert(['valor'=>'Divorciado(a)','grupo'=>'11','descripcion'=>'estado civil']);

        Configuracion::insert(['valor'=>'15.50','grupo'=>'12','descripcion'=>'Precio, en soles, de la entrada en las sedes']); //40
        Configuracion::insert(['valor'=>'25','grupo'=>'24','descripcion'=>'Precio por pecnotar en el club']);

        Configuracion::insert(['valor'=>'Solicitud Pendiente','grupo'=>'13','descripcion'=>'estado solicitud']);
        Configuracion::insert(['valor'=>'Producto Recibido','grupo'=>'13','descripcion'=>'estado solicitud']);
        Configuracion::insert(['valor'=>'Solicitud Anulada','grupo'=>'13','descripcion'=>'estado solicitud']);        
        Configuracion::insert(['valor'=>'Servicio Realizado','grupo'=>'13','descripcion'=>'estado solicitud']);

        Configuracion::insert(['valor'=>'Producto','grupo'=>'14','descripcion'=>'tipo solicitud']);
        Configuracion::insert(['valor'=>'Servicio','grupo'=>'14','descripcion'=>'tipo solicitud']);

        Configuracion::insert(['valor'=>'Bungalow','grupo'=>'15','descripcion'=>'tipo promocion']);
        Configuracion::insert(['valor'=>'Actividad','grupo'=>'15','descripcion'=>'tipo promocion']);
        Configuracion::insert(['valor'=>'Taller','grupo'=>'15','descripcion'=>'tipo promocion']); //50
        Configuracion::insert(['valor'=>'Ambiente','grupo'=>'15','descripcion'=>'tipo promocion']); 

        Configuracion::insert(['valor'=>'Alimentos y Bebidas','grupo'=>'16','descripcion'=>'tipo concesionaria']);
        Configuracion::insert(['valor'=>'Deportes','grupo'=>'16','descripcion'=>'tipo concesionaria']);
        Configuracion::insert(['valor'=>'Peluqueria y Spa','grupo'=>'16','descripcion'=>'tipo concesionaria']);

        Configuracion::insert(['valor'=>'1','grupo'=>'17','descripcion'=>'tipo puntaje']);
        Configuracion::insert(['valor'=>'2','grupo'=>'17','descripcion'=>'tipo puntaje']);
        Configuracion::insert(['valor'=>'3','grupo'=>'17','descripcion'=>'tipo puntaje']);
        Configuracion::insert(['valor'=>'4','grupo'=>'17','descripcion'=>'tipo puntaje']);
        Configuracion::insert(['valor'=>'5','grupo'=>'17','descripcion'=>'tipo puntaje']);

        Configuracion::insert(['valor'=>'50','grupo'=>'18','descripcion'=>'monto traspaso']); //60

        Configuracion::insert(['valor'=>'4','grupo'=>'19','descripcion'=>'limite dias']); 
        Configuracion::insert(['valor'=>'45','grupo'=>'19','descripcion'=>'rango reserva']); 
        Configuracion::insert(['valor'=>'20','grupo'=>'19','descripcion'=>'precio default']);

        Configuracion::insert(['valor'=>'20000','grupo'=>'20','descripcion'=>'Cuota de ingreso Nuevo Socio']);

        Configuracion::insert(['valor'=>'8000','grupo'=>'21','descripcion'=>'Cuota de ingreso siendo Familiar de Socio']); //65

        Configuracion::insert(['valor'=>'Leve','grupo'=>'22','descripcion'=>'Tipo multa']);
        Configuracion::insert(['valor'=>'Media','grupo'=>'22','descripcion'=>'Tipo multa']);
        Configuracion::insert(['valor'=>'Grave','grupo'=>'22','descripcion'=>'Tipo multa']);
        Configuracion::insert(['valor'=>'0','grupo'=>'23','descripcion'=>'Sorteo Activado Fechas']);
    }
}
