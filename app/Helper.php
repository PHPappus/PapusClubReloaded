<?php 


use papusclub\Models\TipoMembresia;
use papusclub\Models\Carnet;
use papusclub\Models\Configuracion;
use papusclub\Models\Socio;


function remover_acento($str)
{
	return strtr(utf8_decode($str), 
       	utf8_decode(
        'ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
        'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
}

function retornar_monto($id)
{
	$monto = TipoMembresia::find($id)->tarifa->monto;
	return $monto;
}

function create_carnet(Socio $socio){
	/*Registro de un nuevo carnet*/
    $anio = Configuracion::where('grupo',5)->first();
    $carnet = new Carnet();
    $carnet->nro_carnet = 0;
    /*Fecha de emision*/
    $fecha_emision = new DateTime("now");
    $fecha_vencimiento = $fecha_emision;
    $fecha_emision=$fecha_emision->format('Y-m-d');
    $carnet->fecha_emision = $fecha_emision;
    /*Fecha de vencimiento*/
    $intervalo = new DateInterval('P'.$anio->valor.'Y');
    $fecha_vencimiento->add($intervalo);
    $fecha_vencimiento=$fecha_vencimiento->format('Y-m-d');
    $carnet->fecha_vencimiento = $fecha_vencimiento;
    $carnet->estado = TRUE;
    
    $anho = Date("Y");
    $id = $anho*10000 + $socio->id;
    $carnet->nro_carnet = $id;


    $socio->addCarnet($carnet);
    return $carnet;
}







 ?>