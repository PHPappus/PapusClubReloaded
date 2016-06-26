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
			<label class="text-left withoutpadding">REGLAMENTO DEL CLUB </button></label>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
  			<div class="col-sm-12 withoutpadding">
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
                
                	<li><img class="img-responsive center-block" src="images/reglamento.jpg"  /></li>
                 						
  			</div>
  			
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>REGLAMENTO DEL CLUB</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-left">
				<strong>REGLAS DEL CLUB</strong>
				<p>
					<br/>Art. 1º.- El Club de PAPUS “Lima”, fundado el 6 de Abril de 2016, es una asociación no lucrativa que tiene por objeto promover y desarrollar entre sus asociados, actividades culturales y deportivas.
				</p>
				<p>Art. 2º.- El Club por su carácter de asociación deportiva y cultural, no podrá tomar parte en manifestaciones de índole religiosa, ni contribuir a suscripciones, ni figurar en ceremonias o actos públicos que sean ajenos a sus fines.
				</p>
				<p>Art. 3º.- El Club celebrará su aniversario en la ultima semana clases.</p>
				<br>
				<p>TODO ES DINERO</p>
				<br>
				<p>Art. 4º.- El Patrimonio del Club está constituido por los bienes de su propiedad, osea nada, así como los
				derechos que le corresponden, ya para que decir xD.</p>
				<p>Art. 5º.- Es indispensable ser asociado del Club, para disfrutar de los bienes de la Institución imaginaria. Al
				perder la condición de asociado, caduca todo derecho relacionado con dicha condición, osea no entras.</p>
				<p>Art. 6º.- El Club tiene su sede en la PUCP , exactamente el V, en pocas palabras en el servidor, y no se hará conocido.</p>
				<br>		
				<p>LOGO</p>
				<br>
				<p>Art. 7º.- La bandera del Club es de color verde y lleva al centro un arbolito xD.</p>
				<p>Art. 8º.- El árbol simboliza la conciencia social y cultural sobre la naturaleza en estos años.</p>
				<p>Art. 9º.- Si en el caso se quisiera cambiar el logo, se logrará bajo el consenso de los 12 presidentes.</p>
					 
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