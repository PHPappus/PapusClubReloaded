<?php 


use papusclub\Models\TipoMembresia;

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









 ?>