<!DOCTYPE html>
<html>
<head>
	<title> DETALLE/Editar</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin')
@section('content')

<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>DETALLE AMBIENTE</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/ambiente/new/ambiente" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

			<!-- INICIO INICIO INICIO INICIO -->
			<!-- SE DEBE LEER DATA DE LA BD E INGRESARLOS -->

			<div class="form-group ">
		    	<label for="nombreInput" class="col-sm-4 control-label">NOMBRE</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$ambiente->nombre}}" readonly >
		    	</div>
		  	</div>
		  	<div class="form-group ">
		    	<label for="tipoAmbienteInput" class="col-sm-4 control-label">TIPO AMBIENTE</label>	
		    	<div class="col-sm-5">
		    		<input type="text" class="form-control" id="tipoAmbienteInput" name="tipoAmbiente" value="{{$ambiente->tipo_ambiente}}" readonly >
				</div>
		  	</div>

		  	<div class="form-group ">
		    	<label for="capacidadInput" class="col-sm-4 control-label">CAPACIDAD MAXIMA</label>
		    	<div class="col-sm-5">
		      		<input type="number" class="form-control" id="capacidadInput" name="capacidadMax" value="{{$ambiente->capacidad_actual}}" readonly>
		    	</div>
		  	</div>	  	
		  	<!-- <div class="form-group ">
		    	<label for="capacidadDisponibleInput" class="col-sm-4 control-label">CAPACIDAD DISPONIBLE</label>
		    	<div class="col-sm-5">
		      		<input type="number" class="form-control" id="capacidadDisponibleInput" name="capacidad_disponible" placeholder="Capacidad Disponible" readonly>
		    	</div>
		  	</div> -->
		  	<div class="form-group ">
		    	<label for="ubicacionInput" class="col-sm-4 control-label">UBICACIÓN</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="ubicacionInput" name="ubicacion" value="{{$ambiente->ubicacion}}" readonly>
		    	</div>
		  	</div>
		  	<!-- <div class="form-group">
			    	<label for="activoInput" class="col-sm-4 control-label ">Activo</label>
			    	<div class="col-sm-3">
			      		<input type="checkbox"  class="checkbox" id="activoInput" name="estado" disabled >
			    	</div>	    	
			  	</div> -->
		  	<!-- EL ESTADO SIEMPRE VA EN TRUE PARA EL REGISTRAR -->
		  	
		  	</br>
		  	</br>
		  	
		  	
	  	<!-- FIN FIN FIN -->
				
			<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="/ambiente/index" class="btn btn-info">Regresar</a>				
			</div>
			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	<script src="../js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="../js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="../js/MisScripts.js"></script>


</body>
</html>