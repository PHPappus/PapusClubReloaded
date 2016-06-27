<!DOCTYPE html>
<html>
<head>
	<title>Historia Papus Club</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/MisEstilos.css">
	
</head>

<body>
<!--Cabecera- Se separará espacio para el input de busqueda antes de la cabecera de menu-->
@extends('layouts.headerandfooter')
@section('content')

<!---Cuerpo -->

<main class="main">
	<div class="content" style="max-width: 100%;">
	<div class="container" id="ruta-navegacion">
		<br/>
		<div class="row">
			<a class="btn btn-link text-left withoutpadding" href="/">INICIO <span class="glyphicon glyphicon-chevron-right"></span></a>
			<button class="btn btn-link text-left withoutpadding" href="#">PAPUS CLUB <span class="glyphicon glyphicon-chevron-right"></span></button>
			<label class="text-left withoutpadding">EVENTOS </button></label>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>EVENTOS DEL CLUB</strong></p>
			</div>
		</div>
		<div class="row">
  			<div class="col-sm-6 withoutpadding">
                    <li><img class="slider img-responsive" src="images/padre.jpg" /></li>         						
  			</div>
  			<div class="col-sm-6 text-left">
				<strong>EVENTO DIA DEL PADRE</strong>
				<p>
					<br/>
					(Viernes 5 de junio de 2015). La Comisión Directiva del Club de PAPUS  informa que, desde el próximo lunes 8 y hasta el 30 de junio próximo, realizará una Promoción de Ingreso en adhesión al Día del Padre.

Desde el próximo lunes 8 de junio, la Comisión Directiva del Club de Regatas Corrientes implementará una Promoción Especial “Día del Padre” de captación de nuevos socios a la institución.

La inscripción de estos nuevos socios se encuentra orientada a la captación de grupos familiares y a facilitar su ingreso con una serie de bonificaciones, que en este caso especifico será en adhesión al Día del Padre.

Los importante bonificados son de setecientos diez ($ 710) para el Papá (Socio), y de novecientos pesos ($ 900) para Mama (Socio), que incluye el ingreso, carnet y cuota social del mes.


Cabe señalar que los formulaciones de inscripción se pueden retirar en la Secretaria de la institución o bien bajarlos de la página oficial del Club  (información – valores y solicitud de ingreso).
					 
				</p>
			</div>
		</div>
		

	</div>
	</div>
</main>

<!--Pie de págna-->
@stop

<!-- JQuery -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="js/MisScripts.js"></script>
</body>
</html>