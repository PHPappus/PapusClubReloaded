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
			<button class="btn btn-link text-left withoutpadding" href="/">PAPUS CLUB <span class="glyphicon glyphicon-chevron-right"></span></button>
			<label class="text-left withoutpadding">MESA DIRECTIVA </button></label>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
  			<div class="col-sm-12 withoutpadding">
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
                <ul class="bxslider">
                	<li><img class="slider img-responsive " alt="Chania" src="images/phpseniors.jpg" width="2000" height="400" /></li>
                    <li><img class="slider img-responsive center-block" alt="Chania" src="images/grupo.jpg" /></li>  
                </ul>  						
  			</div>
  			
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>MESA DIRECTIVA</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-left">
				<strong>MIEMBROS</strong>
				<p>
					<br/>
					A lo largo de sus años de existencia desde su fundación el 6 de abril de 2016, el Club de PAPUSCLUB "Lima" ha sido presidido por ilustres alumnos que de manera sabia han llevado las riendas de nuestra prestigioso sistema a un sitial de reconocimiento a nivel casi-casi-estatal. ¡Gracias señores miembros!
					Sebastian, Cesar, Juan (Oso), Victor, Brayan, Jhoseline, Joe, Francisco, Marcelo, Christian, Juani y Edgar . :')
					 
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