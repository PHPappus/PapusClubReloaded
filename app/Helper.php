<?php 


use papusclub\Models\TipoMembresia;
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