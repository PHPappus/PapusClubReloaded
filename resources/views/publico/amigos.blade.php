
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
                    <li><img class="slider img-responsive" src="images/amigo.jpg" width="1000" height="400"/></li>         						
  			</div>
  			<div class="col-sm-6 text-left">
				<strong>DIA DEL AMIGO</strong>
				<p>
					<br/>
					Durante el Siglo XX, fueron varias las iniciativas para la celebración de un Día de la Amistad, en distintas partes del mundo. En Estados Unidos y partes de Asia, se divulgó el primer domingo de agosto como día de entrega de saludos y presentes entre amigos, y celebraciones similares se conformaron en distintos países de Sudamérica y Europa, en distintas fechas. En países como Argentina, Uruguay y Paraguay, el Día del Amigo se encuentra profundamente arraigado en la sociedad.
La iniciativa para el establecimiento de un Día del Amigo internacionalmente reconocido tuvo un antecedente histórico llamado Cruzada mundial de la amistad que fue una campaña en favor de dar valor y realce a la Amistad entre los Seres Humanos, de forma que permita fomentar la Cultura de la Paz. Fue ideada por el Doctor Ramón Artemio Bracho en Puerto Pinasco, Paraguay en 1958. A partir de dicha idea, se fijó el 30 de julio como Día de la Amistad. En Paraguay, las vísperas del 30 de julio son aprovechadas para comprar regalos a los amigos cercanos y a las parejas, son muy comunes las fiestas en los bares, discotecas o una cena entre amigos íntimos. También se considera tradicional el juego del "Amigo Invisible" donde en pequeños papeles se reparten los nombres de todos los miembros de un grupo y al que sale elegido (en forma secreta) se le regala un presente el día 30. Esta costumbre es muy practicada en Asunción y otras ciudades paraguayas en las escuelas y lugares de trabajo.
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