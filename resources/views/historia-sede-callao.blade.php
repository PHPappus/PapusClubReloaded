<!DOCTYPE html>
<html>
<head>
	<title>Historia de sede Callao </title>
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

<body>
@extends('layouts.headerandfooter')
@section('content')

	<div class="content" style="max-width: 100%;">
	<div class="container" id="ruta-navegacion">
		<br/>
		<div class="row">
			<a class="btn btn-link text-left withoutpadding" href="/">INICIO <span class="glyphicon glyphicon-chevron-right"></span></a>
			<button class="btn btn-link text-left withoutpadding" href="#">SEDES <span class="glyphicon glyphicon-chevron-right"></span></button>
			<label class="text-left withoutpadding">CALLAO</button>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
  			<div class="col-sm-12 withoutpadding">
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
                    <li><img class="slider img-responsive" src="images/bungalow1.jpg" /></li>  
                 						
  			</div>
  			
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>HISTORIA CALLAO</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-left">
				<strong>Historia</strong>
				<p>
					<br/>
					El Callao fue fundada por los colonizadores españoles en 1537, sólo dos años después de Lima (1535). Pronto se convirtió en el principal puerto para el comercio español en el Pacífico. El origen de su nombre es desconocido, tanto la India (especialmente Yunga, o la costa peruana) y fuentes españolas se acreditan, pero lo cierto es que se le conocía por ese nombre desde 1550. 
A la altura del Virreinato, prácticamente todos los bienes producidos en el Perú, Bolivia y Argentina se llevaron a través de los Andes a lomo de mula hasta el Callao, para ser enviado a Panamá, llevado por tierra, y luego transportados a España, vía Cuba. 
El 20 de agosto de 1836, durante la Confederación Perú-Boliviana, el presidente Andrés de Santa Cruz dispuso la creación de la Provincia Litoral del Callao (Provincia Litoral del Callao del), que tiene autonomía política en sus asuntos internos. Durante el gobierno del presidente Ramón Castilla, Callao se le dio el nombre de Provincia Constitucional (Provincia Constitucional), el 22 de abril 1857, antes de eso, Callao tenía el nombre de la provincia del Litoral. Todas las otras provincias peruanas habían dado sus nombres por la ley, mientras que el Callao fue dado por mandato constitucional.
				</p>
			</div>
			<div class="col-sm-12 text-left">
				<strong>Infraestructura</strong>	
				<p>
					<br/>
					La infraestructura del puerto ha mejorado en los últimos años debido a distintas inversiones que se han hecho producto de las concesiones. En El Callao existen cinco muelles (1,2,3,4 y Norte), que son de atraque directo, tipo espigón. Los cuatro primeros muelles tienen exactamente las mismas características: 182.80 metros de lado. Dos muelles tienen 30 metros de ancho y los otros dos tienen 86. Existen dos amarraderos por muelle, entre 31 y 34 pies de profundidad y una longitud de 182.8 metros. Además, el muelle Norte tiene cuatro amarraderos, de una profundidad de entre 34 y 36 pies. Cada amarradero tiene una longitud de entre 20 y 30 metros. Los muelles están especializados para contenedores, graneles y multipropósito.
				</p>
			</div>
		</div>
	</div>
			
	</div>
@stop
  <script src="js/jquery-1.11.3.min.js"></script>
  <!-- Bootstrap -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- BXSlider -->
  <script src="js/jquery.bxslider.min.js"></script>
  <!-- Mis Scripts -->
  <script src="js/MisScripts.js"></script>    
 
  

</body>
</html>