rrr<!DOCTYPE html>
<html>
<head>
	<title>Cursos Deportivos Papus Club</title>
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
			<button class="btn btn-link text-left withoutpadding" href="#">ACTIVIDADES <span class="glyphicon glyphicon-chevron-right"></span></button>
			<button class="btn btn-link text-left withoutpadding" href="#">CURSOS<span class="glyphicon glyphicon-chevron-right"></span></button>
			<label class="text-left withoutpadding">NATACION</button></label>
		</div>
		<br/>
		</div>
	</div>
	<div class="container">
		<div class="row">
  			<div class="col-sm-12 withoutpadding">
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
               
                	<li><img class="img-responsive center-block" src="images/natacion.jpg" weith="" /></li>
                 
             					
  			</div>

		</div>
	</div>
	<div class="container">
		<br>
  			<br>
		<div class="row">
			<div class="col-sm-12 text-center">
				<p><strong>NATACION- ABRIL a DICIEMBRE 2016</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 text-left">
				<p>LUGAR: PISCINA CENTRAL (CALLAO)</p>
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
						<td>40701</td>
						<td>5 A 8</td>
						<td>Principiante</td>
						<td>8:00-10:00</td>
						<td>Prof Rigo </td>
						<td>1 Mes: 300 Soles, 3 Meses: 900 Soles</td>
						<td><input type="radio" aria-label=""></td>
					</tr>
					<tr>
						<td>40702</td>
						<td>9 A 13</td>
						<td>Principiante</td>
						<td>12:00-14:55</td>
						<td>Prof Carl </td>
						<td>1 Mes: 420 Soles, 3 Meses: 1000 Soles</td>
						<td><input type="radio" aria-label=""></td>
					</tr>
					<tr>
						<td>40703</td>
						<td>14 A 16</td>
						<td>Intermedio</td>
						<td>17:00-18:55</td>
						<td>Prof Tommy</td>
						<td>1 Mes: 700 Soles, 3 Meses: 1500 Soles</td>
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