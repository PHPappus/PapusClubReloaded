<!DOCTYPE html>
<html>
<head>
	<title>Convenios Papus Club</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/MisEstilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
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
			<label class="text-left withoutpadding">SERVICIOS </button></label>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="col-sm-12 text-center">
				<p class="lead"><strong>SERVICIOS DEL CLUB</strong></p>
			</div>
			<div class="col-sm-6 col-md-4 col-xs-12">
				<br>
				<div class="thumbnail" style="border:none; background:white;">
	  			<!-- <div class="col-sm-6 col-md-6 col-xs-12 image-container">
	                    <li><img class="slider img-responsive" src="images/rugby.jpg" /></li>
	  			</div> -->
	  			<div class="col-sm-6 col-md-12 col-xs-12">
	            		<strong>SERVICIOS DEPORTIVOS</strong>
					<p>
					<br/>
					<li>CANCHAS DEPORTIVAS (FUTBOL Y BASKET) </li>
					<li>CANCHAS DE TENIS</li>
					<li>CANCHAS DE FRONTON</li>
					<li>BICICLETAS 41</li>
					
					</p>

	  			</div>
	  		
	  			
			</div>
		</div>	
		<div class="col-sm-6 col-md-4 col-xs-12">
				<br>
				<div class="thumbnail" style="border:none; background:white;">
	  			<div class="col-sm-6 col-md-12 col-xs-12">
	            		<strong>SERVICIOS DE ALOJAMIENTO</strong>
					<p>
					<br/>
					<LI>ESPACIO PARA 400 PERSONAS POR DIA</LI>
					 <li>ESPACIOS ESPECIALES PARA ACAMPAR </li>
					<li>EL JUEGO DEL SAPITO</li>
					<li>SOLO TENEMOS 1 BAÑO</li>
					</p>

	  			</div>
	
	  			
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-xs-12">
				<br>
				<div class="thumbnail" style="border:none; background:white;">
	  			
	  			<div class="col-sm-6 col-md-12 col-xs-12">
	            		<strong>ZONA DE RECREACION</strong>
					<p>
					<br/>
					<li>5 PANTERAS</li>
					<li>PROGRAMADORES AMAESTRADOS</li>
					<li>JUEGO DE LA MUERTE CON LOS FRONT</li>
					<li>PONLE LA COLA AL JEFE DE PROYECTOS</li>
					<li>OTRAS ZONAS</li>					 
					</p>

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