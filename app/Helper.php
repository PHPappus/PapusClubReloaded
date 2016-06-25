<?php 


use papusclub\Models\TipoMembresia;
use papusclub\Models\Carnet;
use papusclub\Models\Configuracion;
use papusclub\Models\Socio;
use papusclub\Models\TipoFamilia;

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

function retornar_mensaje_tercero($persona,$sede,$precio,$fecha)
{
	$mensaje = 'La persona '.$persona->nombre.' '.$persona->ap_paterno.' identificada con ';

	if($persona->nacionalidad == 'peruano')
	{
		$mensaje = $mensaje.'DNI: '.$persona->doc_identidad.' ';
	}
	else
	{
		$mensaje = $mensaje.'CARNET DE EXTRANJERÍA: '.$persona->carnet_extranjeria.' ';		
	}

	$mensaje = $mensaje.'Ingreso a la sede '.$sede.' El día '.$fecha.' Y su saldo a pagar en tesorería es '.'S/. '.$precio. ' por el derecho de entrada al club';

	return $mensaje;
}

function retornar_mensaje_socio($socio,$sede,$numFam,$numInv,$total,$fecha)
{
	$mensaje = 'El socio '.$socio->postulante->persona->nombre.' '.$socio->postulante->persona->ap_paterno. ' identificado con carnet: '.$socio->carnet_actual()->nro_carnet.' y ';

	if($socio->postulante->persona->nacionalidad == 'peruano')
	{
		$mensaje = $mensaje.'DNI: '.$socio->postulante->persona->doc_identidad.' ';
	}
	else
	{
		$mensaje = $mensaje.'CARNET DE EXTRANJERÍA: '.$socio->postulante->persona->carnet_extranjeria.' ';		
	}

	$mensaje = $mensaje.'Ingreso a la sede '.$sede.' El día '.$fecha.' en companía de '.$numFam.' Familiares y '.$numInv.' Invitados, su saldo a pagar en tesorería es '.'S/. '.$total.' por haber superado el número de invitados máximos permitidos en un período.';

	return $mensaje;
}

function relacion($id)
{
	$tipofamilia = TipoFamilia::find($id);
	return $tipofamilia->nombre;
}

 ?>