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
			<label class="text-left withoutpadding">CONVENIOS </button></label>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
  			
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
                	<li><img class="slider img-responsive" src="images/convenios.jpg" /></li>

  			
		</div>
	</div>
	<div class="container">
		
		<div class="row">
			<div class="col-sm-12 text-left">
				<strong>CONVENIOS</strong>
				<p>
					<br/>
					Papus Club a lo largo de estos meses logro firmar convenios con empresas de mucho prestigio, el cual brindan una seguridad
					y seriedad de este trabajo. 
					 
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