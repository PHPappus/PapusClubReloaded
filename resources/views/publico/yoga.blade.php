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
			<label class="text-left withoutpadding">ACTIVIDADES </button></label>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>ACTIVIDADES</strong></p>
			</div>
		</div>
		<div class="row">
  			<div class="col-sm-6 withoutpadding">
                    <li><img class="slider img-responsive" src="images/yoga.jpg" /></li>         						
  			</div>
  			<div class="col-sm-6 text-left">
				<strong>YOGA</strong>
				<p>
					<br/>
					Ya sea que quieras mejorar tu salud y condición física, calmar tu mente o conectarte contigo mismo, ¡el yoga es la respuesta! No hay requisito previo ni necesitas ser flexible. En LimaYoga te ayudaremos a encontrar la clase ideal para ti. Ofrecemos distintos estilos: Power o Hot Power si te gusta algo más intenso y dinámico; Yoga Tradicional, Hatha Yoga e Iyengar si prefieres algo más pausado y meditativo.

El primer mes introductorio para alumnos nuevos cuesta 150 soles y puedes ir a una clase al día, de lunes a domingo, en cualquier estudio o estilo de limaYoga. Para más información y detalles sobre nuestros estudios, te sugerimos visitar la sección de preguntas frecuentes y recomendaciones.

TALLER TEÓRICO-PRÁCTICO

Te invitamos a participar de nuestro YOGA INTRO, un taller donde resolveras todas tus dudas acerca del Yoga. 

¿Nuevo en Yoga? ¿No sabes por dónde empezar? ¿Por qué practicamos? ¿Cuál es el estilo de Yoga ideal para ti?

Si quieres entender un poco más lo que haces en clase y los beneficios que traerá el yoga a tu vida asiste a este taller teórico-práctico de 2 hrs. Podrás aclarar tus dudas y profundizar en los fundamentos del Yoga. Esta clase te dará la confianza para comenzar o continuar con tu práctica y obtendrás un mayor entendimiento sobre cómo utilizar el Yoga como herramienta para crecimiento personal.
					 
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