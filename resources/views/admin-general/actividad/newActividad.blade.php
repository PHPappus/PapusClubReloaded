<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR ACTIVIDAD</title>
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
					<strong>REGISTRAR ACTIVIDAD</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/actividad/new/actividad" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="ambienteSelec" value="{{ $ambiente->id }}">

				<!-- VALIDACION CON FE INICIO -->
				<div class="col-sm-4"></div>
				<div class=""> 
					@if ($errors->any())
		  				<ul class="alert alert-danger fade in">
		  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  					@foreach ($errors->all() as $error)
		  						<li>{{$error}}</li>
		  					@endforeach
		  				</ul>
		  			@endif
				</div>

				<!-- VALIDACION CON FE FIN  -->
					<br/><br/>

			  	<div class="form-group required">
			    	<label for="ambienteInput" class="col-sm-4 control-label">AMBIENTE</label>
			    	<div class="col-sm-5">
			    		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="{{$ambiente->nombre}}"   readonly>
			      	</div>
			      	<a class="btn btn-info" name="buscarAmbiente" href="{!!URL::to('/ambiente/search')!!}"  title="Buscar" ><i name="buscarAmbiente" class="glyphicon glyphicon-search"></i></a>
			  	</div>
			  	<div class="form-group required">
			    	<label for="tipoambienteInput" class="col-sm-4 control-label">TIPO DE AMBIENTE</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipoambienteInput" name="tipoambiente" value="{{$ambiente->tipo_ambiente}}"   readonly>
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="sedeInput" class="col-sm-4 control-label">SEDE</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="sedeInput" name="sede" value="{{$ambiente->sede->nombre}}"   readonly>
			    	</div>
			  	</div>

				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">NOMBRE</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre de la actividad" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fechaInicioInput" class="col-sm-4 control-label">FECHA INICIO(dd/mm/aaaa)</label>
			    	<div class="col-sm-5">
			      		<input type="date" class="form-control" id="fechaInicioInput" name="fecha">
			      		
			  	
			    	</div>
			  	</div>
			 
			  	<div class="form-group required">
			    	<label for="horaInicioInput" class="col-sm-4 control-label">HORA INICIO(HH:mm:ss)</label>
			    	<div class="col-sm-5">
			      		<input type="time" class="form-control" id="horaInicioInput" name="hora">
			      		 	
			  	
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">DESCRIPCIÓN</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" >
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="tipoActividadInput" class="col-sm-4 control-label">TIPO DE ACTIVIDAD</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" id="tipoActividadInput" name="tipo_actividad" style="max-width: 150px "  >
							                <option value="-1" default>Seleccione</option>
							                <option value="fiesta">Fiesta</option>
							                <option value="deportiva">Deportiva</option>
							                <option value="reunion">Reunión</option>
						</select>
					</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">CAPACIDAD MAXIMA</label>
			    	<div class="col-sm-5">
			      		<input type="number" class="form-control" id="capacidadInput" name="capacidad_maxima" placeholder="Capacidad Maxima" >
			    	</div>
			  	</div>	  	
			  	
			  	
			  	<!-- EL ESTADO SIEMPRE VA EN TRUE PARA EL REGISTRAR -->
			  	
			  	</br>
			  	<div class="form-group">
			  		<div class="text-right col-sm-4">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>

			  	</div>
			  	
		  	<!-- FIN FIN FIN -->
					
			
				</br></br>
			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/actividad/index" class="btn btn-info">Cancelar</a>
					</div>
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