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
			<label class="text-left withoutpadding">CONCESIONES </button></label>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="col-sm-12 text-center">
				<p class="lead"><strong>CONCESIONES DEL CLUB</strong></p>
			</div>
			<div class="col-sm-6 col-md-6 col-xs-12">
				<br>
				<div class="thumbnail" style="border:none; background:white;">
	  			<!-- <div class="col-sm-6 col-md-6 col-xs-12 image-container">
	                    <li><img class="slider img-responsive" src="images/rugby.jpg" /></li>
	  			</div> -->
	  			<div class="col-sm-6 col-md-12 col-xs-12">
	            		<strong>CONCESIONES ALIMENTOS</strong>
					<p>
					<br/>
					<li>ALMENDARIZ </li>
					<li>BESO FRANCES</li>
					<li>CHARLOTTE</li>
					<li>EMBARCADERO 41</li>
					<li>NIQEI</li>
					<li>BEMBOS </li>
					</p>

	  			</div>
	  			
	  			<div class="col-sm-6 col-md-12 col-xs-12">
	            		<strong>CONCESIONES DE ROPAS Y ARTICULOS</strong>
					<p>
					<br/>
					<li>BAGUS</li>
					<li>BILLABONG</li>
					<li>DONT TOUCH</li>
					<li>CON AMABILIDAD</li>
					<li>GAMARRA SHOP</li>					 
					</p>

	  			</div>
	  			
			</div>
		</div>	
		<div class="col-sm-6 col-md-6 col-xs-12">
				<br>
				<div class="thumbnail" style="border:none; background:white;">
	  			<div class="col-sm-6 col-md-12 col-xs-12">
	            		<strong>CONCESIONES AGENTES DE VIAJE</strong>
					<p>
					<br/>
					<LI>UBER</LI>
					 
					</p>

	  			</div>
	  			<div class="col-sm-6 col-md-12 col-xs-12">
	            		<strong>PELUQUERIA Y SPA</strong>
					<p>
					<br/>
					<li>NO TE DUERMAS O PIERDES </li>
					<li>PALETASO</li>
					<li>COFFIURE AND U</li>
					<li>EL HUESERO</li>
					<li>ROMPECOLUMNA</li>
					<li>TE DOY PERO NO CONSEJOS</li>
					 
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