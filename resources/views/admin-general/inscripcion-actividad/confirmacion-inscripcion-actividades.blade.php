<!DOCTYPE html>
<html>
<head>
	<title>ACTIVIDAD</title>
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
					<strong>CONFIRMACION DE INSCRIPCIÓN</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/sedes/new/sede" class="form-horizontal form-border"><!-- accion que regresa a la incial de inscripciones -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

			<!-- INICIO INICIO INICIO INICIO -->

			<!-- <div class="form-group required">
		    	<label for="buscarInput" class="col-sm-4 control-label">BUSCAR AMBIENTE</label>
		    	<div class="col-sm-5">
		      		<a class="btn btn-info" name="buscarAmbiente" href="{!!URL::to('/ambiente/search')!!}"  title="Buscar" ><i name="buscarAmbiente" class="glyphicon glyphicon-search"></i></a>
		    	</div>
		  	</div> -->
		  	<div class="form-group required">
		    	<label for="ambienteInput" class="col-sm-4 control-label">AMBIENTE</label>
		    	<div class="col-sm-5">
		    		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="{{$actividad->ambiente->nombre}}"  required readonly>
		      	</div>		      	
		  	</div>

		  	<div class="form-group required">
		    	<label for="tipoambienteInput" class="col-sm-4 control-label">TIPO DE AMBIENTE</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="tipoambienteInput" name="tipoambiente" value="{{$actividad->ambiente->tipo_ambiente}}"  required readonly>
		    	</div>
		  	</div>
		  	<div class="form-group required">
		    	<label for="sedeInput" class="col-sm-4 control-label">SEDE</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="sedeInput" name="sede" value="{{$actividad->ambiente->sede->nombre}}"  required readonly>
		    	</div>
		  	</div>
			<div class="form-group required">
		    	<label for="nombreInput" class="col-sm-4 control-label">NOMBRE</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$actividad->nombre}}" readonly>
		    	</div>
		  	</div>
		  	<div class="form-group required">
		    	<label for="descripcionInput" class="col-sm-4 control-label">DESCRIPCIÓN</label>
		    	<div class="col-sm-5">
		      		<textarea type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder ="{{$actividad->descripcion}}" readonly></textarea>
		    	</div> 
		  	</div>
		  	<div class="form-group required">
		    	<label for="tipoActividadInput" class="col-sm-4 control-label">TIPO DE ACTIVIDAD</label>	
		    	<div class="col-sm-5">
			    	<input type="text" class="form-control" id="tipoActividadInput" name="tipo_actividad" value="{{$actividad->tipo_actividad}}" readonly >
				</div>
		  	</div>

		  	<div class="form-group required">
		    	<label for="capacidadInput" class="col-sm-4 control-label">CAPACIDAD MAXIMA</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$actividad->capacidad_maxima}}" readonly>
		    	</div>
		  	</div>	
		  	<div class="form-group required">
			 	<label for="fechaInput" class="col-sm-4 control-label">FECHA (dd/mm/aaaa) </label>
			    <div class="col-sm-5">
				  	<div class="input-group">
			   		<input type="date" class="form-control" id="dpd1" name="fecha_inicio" placeholder="Fecha Inicio" style="max-width: 250px" readonly>
			   		<span class="input-group-addon">-</span>
			   		<input type="date" class="form-control" id="dpd1" name="fecha_fin" placeholder="Fecha Fin" style="max-width: 250px" readonly>
			   	 	</div>
		    	</div>	
			</div> 
		
			</br></br>
			  		<!-- Boton Buscar INICIO -->
			<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/inscripcion-actividad/inscripcion-actividades" class="btn btn-info">Cancelar</a> <!-- Regresa a la pantalla inicial de la reserva -->
					</div>
			</div>
			<!-- Boton Buscar FIN -->

			
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