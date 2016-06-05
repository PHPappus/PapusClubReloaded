<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin-registros')
@section('content')
<!---Cuerpo -->

<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		@include('alerts.errors')
		@include('alerts.success')
		<br/><br/>
		<div class="container">
			<div class="row">
	  			<div class="col-sm-12 withoutpadding" >
	                <img style="text-align:center;margin: 0 auto;display: block;" class="img-responsive" src="../images/foto-perfil.jpg" />
	  			</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<div class="header">
					  <h1 style="color:green">Bienvenido <strong>{!!Auth::user()->name!!}</strong> a PapusClub system</h1>
					</div>
					
				</div>
			</div>
		</div>	
	</div>		
</main>

<!--Pie de págna-->
@stop
	<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}
</body>
</html>