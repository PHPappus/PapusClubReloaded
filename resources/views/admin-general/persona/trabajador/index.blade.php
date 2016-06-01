<!DOCTYPE html>
<html>
<head>
	<title>POSTULANTE</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin')

@section('content')

	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>TRABAJADOR</strong></p>
				</div>
			</div>	
		</div>
		<div class="container">
			<div><a class="btn btn-primary" href="{{url('/trabajador/search')}}">Consultar</a> <a class="btn btn-primary" href="{{url('/trabajador/new')}}">Registrar</a></div>
			@yield('content-opcion')
		</div>
	</div>		
@stop
