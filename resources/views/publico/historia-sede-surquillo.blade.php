<!DOCTYPE html>
<html>
<head>
	<title>Historia de sede Surquillo </title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/MisEstilos.css">
	<style>

		.modal-backdrop.in{
			z-index: 1;
		}
	</style>
</head>

<body>
@extends('layouts.headerandfooter')
@section('content')

	<div class="content" style="max-width: 100%;">
	<div class="container" id="ruta-navegacion">
		<br/>
		<div class="row">
			<a class="btn btn-link text-left withoutpadding" href="/">INICIO <span class="glyphicon glyphicon-chevron-right"></span></a>
			<button class="btn btn-link text-left withoutpadding" href="#">SEDES <span class="glyphicon glyphicon-chevron-right"></span></button>
			<label class="text-left withoutpadding">SURQUILLO</button>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
  			<div class="col-sm-12 withoutpadding">
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
                   <li><img class="slider img-responsive" src="images/bungalow4.jpg" /></li>
                 						
  			</div>
  			
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>HISTORIA SURQUILLO</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-left">
				<strong>Historia</strong>
				<p>
					<br/>
					En sus orígenes, el distrito estuvo ocupado por haciendas vitivinícolas, pasando por la zona el ahora enterrado andarríos de "Surquillo", del cual proviene su nombre.
En Surquillo existen pequeñas ruinas preincaicas y la trinchera de defensa peruana denominada "Reducto Nº 5" de la Guerra del Pacífico, que fue defendida por el coronel Narciso de la Colina.
Antes de 1950 Surquillo pertenecía al Distrito de Miraflores del cual se separaría por ser un distrito muy grande para ocuparse de las necesidades de su población cada vez más creciente. Pero luego en 1983, Surquillo perdió más de la mitad de su territorio, cuando el distrito de San Borja fue creado en la parte norte del mismo debido a las mismas razones.
A fines del siglo XX en Surquillo aconteció un hecho histórico: El sábado 12 de septiembre de 1992 Abimael Guzmán, terrorista cabecilla de Sendero Luminoso, fue capturado en la urbanización La Calera de la Merced.
				</p>
			</div>
			<div class="col-sm-12 text-left">
				<strong>Infraestructura</strong>	
				<p>
					<br/>
					El jefe de Proyectos Max desde Surquillo,  informó que su administración dará prioridad a la rehabilitación del sistema, especialmente el front, como parte de las mejoras que se harán a esta forma de organizacion convertira a todos los backs en un modelo en front.
				</p>
			</div>
		</div>
	</div>
			
	</div>
@stop
  <script src="js/jquery-1.11.3.min.js"></script>
  <!-- Bootstrap -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- BXSlider -->
  <script src="js/jquery.bxslider.min.js"></script>
  <!-- Mis Scripts -->
  <script src="js/MisScripts.js"></script>    
 
  

</body>
</html>