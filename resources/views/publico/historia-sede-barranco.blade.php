<!DOCTYPE html>
<html>
<head>
	<title>Historia de sede Barranco </title>
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
			<label class="text-left withoutpadding">BARRANCO</button>

		</div>
		<br/>
	</div>
	<div class="container">
		<div class="row">
  			<div class="col-sm-12 withoutpadding">
  			<!-- bxslider es un plugin que permite crear sucesión de imagenes -->
                   <li><img class="slider img-responsive" src="images/bungalow3.jpg" /></li> 
                 						
  			</div>
  			
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>HISTORIA BARRANCO</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-left">
				<strong>Historia</strong>
				<p>
					<br/>
					Fue inicialmente poblado por pescadores. Oficialmente es incorporado y reconocido como villorrio en el año 1860, nombrándose un primer Gobernador-Alcalde. En 1874, se constituye oficialmente como distrito, llamándose originalmente San José de Surco con su capital La Ermita de Barranco. Su primer alcalde fue el General Pedro Bustamante

Desde sus inicios, Barranco fue un balneario sumamente atractivo para los veraneantes limeños de clase media alta y extranjeros en general, quienes, en su mayoría, se afincaron construyendo grandes ranchos y casonas, emulando estilos europeos. Su lejanía de la ciudad hacía de los trenes y, posteriormente, de los tranvías, una necesidad para el transporte. Con el paso de los años, y la creciente expansión y creación de otros distritos, Barranco se suma a la Metrópoli.
				</p>
			</div>
			<div class="col-sm-12 text-left">
				<strong>Infraestructura</strong>	
				<p>
					<br/>
					En PAPUS CLUB, hacer ejercicio nunca fue tan placentero. No solo por el hecho de practicar deporte, sino por las excelentes instalaciones, la gran sala de máquinas y la fascinante vista hacia todas las direcciones, pero, sobre todo, por el campo de golf. Asimismo, cuenta con profesionales debidamente calificados, equipos de última generación, aire acondicionado, música ambiental, televisores y ascensor. La arquitectura del módulo del gimnasio, camerinos y piscina temperada ganó el primer puesto en el concurso de la XV Bienal de Arquitectura Peruana “Arquitectura en el Desarrollo Nacional + Bienales R.A.G.A”.
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