<!DOCTYPE html>
<html>
<head>
	<title>Cursos Deportivos Papus Club</title>
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

<!--Cabecera- Se separará espacio para el input de busqueda antes de la cabecera de menu-->
<body>
<!--Cabecera-->
@extends('layouts.headerandfooter')
@section('content')



	<div class="content" style="max-width: 100%;">
	<div class="container" id="ruta-navegacion">
		<br/>
		<div class="row">
			<a class="btn btn-link text-left withoutpadding" href="/">INICIO <span class="glyphicon glyphicon-chevron-right"></span></a>
			<button class="btn btn-link text-left withoutpadding" href="#">ACTIVIDADES <span class="glyphicon glyphicon-chevron-right"></span></button>
			<button class="btn btn-link text-left withoutpadding" href="#">CURSOS<span class="glyphicon glyphicon-chevron-right"></span></button>
			<label class="text-left withoutpadding">KARATE</button></label>
		</div>
		<br/>
		</div>
	</div>
	<div class="container">
		<div class="row">
  			<div class="col-sm-12 withoutpadding">
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
                	<li><img class="slider img-responsive center-block" src="images/karate.jpg" /></li>
				
  			</div>
  			
		</div>
	</div>
	<div class="container">
		<br>
		<br>
		<div class="row">
			<div class="col-sm-12 text-center">
				<p><strong>Karate- ABRIL a DICIEMBRE 2016</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 text-left">
				<p>LUGAR: GIMNACIO (SURQUILLO)</p>
			</div>
			<div class="col-sm-6 text-right">
				<p>DÍAS: LUNES-MIERCOLES-VIERNES</p>
			</div>
		</div>
	</div>
		<div class="table-responsive">
			<div class="container">
				<table class="table table-bordered table-hover text-center">
					<tr class="active">
						<td>CÓDIGO</td>
						<td>EDAD</td>
						<td>NIVEL</td>
						<td>HORARIO</td>
						<td>PROFESOR</td>
						<td>COSTO</td>
						<td>SELECCIONAR</td>
					</tr>
					<tr>
						<td>30701</td>
						<td>5 A 8</td>
						<td>Principiante</td>
						<td>15:00-16:45</td>
						<td>Profesor Futboloncio</td>
						<td>1 Mes: 220 Soles, 3 Meses: 600 Soles</td>
						<td><input type="radio" aria-label=""></td>
					</tr>
					<tr>
						<td>30702</td>
						<td>9 A 13</td>
						<td>Principiante</td>
						<td>13:00-14:55</td>
						<td>Profesor Jugadorazo</td>
						<td>1 Mes: 220 Soles, 3 Meses: 600 Soles</td>
						<td><input type="radio" aria-label=""></td>
					</tr>
					<tr>
						<td>30703</td>
						<td>14 A 16</td>
						<td>Intermedio</td>
						<td>17:00-18:55</td>
						<td>Profesor Pelotudo</td>
						<td>1 Mes: 220 Soles, 3 Meses: 600 Soles</td>
						<td><input type="radio" aria-label=""></td>
					</tr>
				</table>
			</div>	
		</div>


		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-right">
				<!--aqui debe haber una validacion si está logueado o no-->
					<button class="btn btn-primary" onclick="openLogin()">MATRICULATE AQUI</button>			
				</div>
			</div>
		</div>
			
	</div>
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