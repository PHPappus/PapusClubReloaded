<!DOCTYPE html>
<html>
<head>
	<title>Eventos culturales Papus Club</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/MisEstilos.css">
	
</head>

@extends('layouts.headerandfooter')
@section('content')

<!---##############################################################################################################################################-->
<!---Cuerpo -->

<main class="main">
	<div class="content" style="max-width: 100%;">
	<div class="container" id="ruta-navegacion">
		<br/>
		<div class="row">
			<a class="btn btn-link text-left withoutpadding" href="/">INICIO <span class="glyphicon glyphicon-chevron-right"></span></a>
			<button class="btn btn-link text-left withoutpadding" href="#">EVENTOS <span class="glyphicon glyphicon-chevron-right"></span></button>
			<label class="text-left withoutpadding">CULTURAL</button></label>
			
		</div>
		<br/>
		</div>	
	</div>
	<div class="container">
		<div class="row">
  			<div class="col-sm-12 withoutpadding">
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
                <ul class="bxslider">
                	<li><img class="slider img-responsive" src="images/evento-cultural_1.jpg" /></li>
                    <li><img class="slider img-responsive" src="images/evento-cultural_2.jpg" /></li>  
                </ul>  						
  			</div>
  			
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				Cafés filosóficos <br />
				Lugar: Aula magna <br />
				Sabado - 5pm <br />
			</div>
			<div class="col-sm-4">
				Orquesta Sinfónica <br />
				Lugar: Auditorio central <br />
				Viernes - 7pm <br />
			</div>
			<div class="col-sm-4">
				Teatro de marionetas <br />
				Lugar: auditorio Sur <br />
				Domingo - 4pm <br />
			</div>
		</div>
		
	</div>


		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-right">
				<!--aqui debe haber una validacion si está logueado o no-->
					<button class="btn btn-primary" onclick="openLogin()">INSCRÍBASE AQUI</button>			
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