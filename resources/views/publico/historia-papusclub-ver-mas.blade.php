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
			<button class="btn btn-link text-left withoutpadding" href="historia-papusclub">A CERCA DEL CLUB <span class="glyphicon glyphicon-chevron-right"></span></button>
			<label class="text-left withoutpadding">HISTORIA </button></label>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
  			<div class="col-sm-12 withoutpadding">
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
                <ul class="bxslider">
                	<li><img class="slider img-responsive" src="images/papushistory.jpg" /></li>
                    <li><img class="slider img-responsive" src="images/papushistory1.jpg" /></li>  
                </ul>  						
  			</div>
  			
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>HISTORIA DEL CLUB</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-left">
				<strong>HISTORIA DEL CLUB</strong>
				<p>
					<br/>
					El club Papus fue fundado el 6 de Abril del 2016, por 12 integrantes, quienes no tenian idea cómo iniciaria este proyecto. Fueron escogidos a dedo en una clase de un Miercoles por la tarde, despidiendo el verano,
					con reglas que nadie entendía, sin embargo, se respetaba; uno a uno fueron nombrados por sus habilidades, aunque en realidad no, solo fue favoritismo xd. Todos temerosos ,del futuro y la nota, de este proyecto
					aceptaron el reto de crear un sistema antibugs y errores, más solo fue una ilusión; pero se hizo lo que se pudo :D . Con todo el esfuerzo y ahinco se logró un sistema que tiene parte de nuestro tiempo, esfuerzo y sacrificio
					apuntando a un objetivo, el más importante, la base de todo esto, el eje circular y sustancial, casi vital, cumplir los requerimientos del profe XD. Y pasar el curso obviamente XD.
					<br/><br/>
					<strong id="marca">MISIÓN</strong>
					<br/><br/>
					Brindar al usuario, al profesor y al jefe de práctica, todas las comodidades de un sistema completo, funcional y con buen look and feel, respetando los
					valores éticos de la universidad y personales, de modo que asi obtengamos una calificación aprobatoria por encima de la media xD. 
					<br/><br/>
					<strong>VISIÓN</strong>
					<br/><br/>
					Ser un grupo reconocido por su esfuerzo, capacidad y código, que al ser formado integralmente por los cursos y profesores, logre el exito profesional. 

					

					
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