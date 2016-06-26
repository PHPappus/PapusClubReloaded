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
			<label class="text-left withoutpadding">INFORMES </button></label>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>INFORMES DEL CLUB</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-left">
				<strong>INFORMES DEL CLUB PAPUS</strong>
				<p>
					<br/>
					Los informes y trámites se realizan en la oficina de la Junta Calificadora y de Disciplina del CRL, ubicada en la sede principal del Club, Av. Universitaria 1234, pabellon V 2do piso.

También puede solicitar información escribiendo al email: informes@papusclub.org.pe o llamando al teléfono 123-4567 anexo 221, al celular 9999900000 o al RPM #123456, donde será atendido por la Srta. Kassandra Suárez, de lunes a viernes de 9:00 a 18:00 horas y los sábados de 9:30 a 13:00 horas.
					 
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