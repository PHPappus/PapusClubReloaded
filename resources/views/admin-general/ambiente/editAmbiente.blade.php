<!DOCTYPE html>
<html>
<head>
	<title> Ambiente/Editar</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	<!-- PARA VENTANA EMMERGENTE INCIIO -->
	<style>

		.modal-backdrop.in{
			z-index: 1;
		}
	</style>
	<!-- PAR AVENTANA EMERGENTE FIN -->
	
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
					<strong>EDITAR AMBIENTE</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/ambiente/{{ $ambiente->id }}/edit" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

			<!-- INICIO INICIO INICIO INICIO -->
			<!-- SE DEBE LEER DATA DE LA BD E INGRESARLOS -->

			<div class="form-group ">
		    	<label for="nombreInput" class="col-sm-4 control-label">NOMBRE</label>
		    	<div class="col-sm-5">
		      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombreInput" name="nombre" value="{{$ambiente->nombre}}" >
		    	</div>
		  	</div>
		  <!-- 	<div class="form-group ">
		    	<label for="tipoAmbienteInput" class="col-sm-4 control-label">TIPO AMBIENTE</label>	
		    	<div class="col-sm-5">
			    	<select class="form-control" name="tipo_ambiente" style="max-width: 150px " readonly >
						                <option value="-1" default>Seleccione</option>
						                <option value="Bungalow">Bungalow</option>
							            <option value="Canchas">Canchas</option>
							            <option value="Piscina">Piscina</option>
							            <option value="Comedor">Comedor</option>
							            <option value="Salon">Salón</option>
					</select>
				</div>
		  	</div> -->
		  	<div class="form-group ">
		    	<label for="tipoAmbienteInput" class="col-sm-4 control-label">TIPO AMBIENTE</label>
		    	<div class="col-sm-5">
		      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombreInput" name="nombre" value="{{$ambiente->tipo_ambiente}}" readonly >
		    	</div>
		  	</div>


		  	<div class="form-group ">
		    	<label for="capacidadInput" class="col-sm-4 control-label">CAPACIDAD MAXIMA</label>
		    	<div class="col-sm-5">
		      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="capacidadInput" name="capacidad_actual" value="{{$ambiente->capacidad_actual}}" >
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
		      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="ubicacionInput" name="ubicacion" value="{{$ambiente->ubicacion}}" >
		    	</div>
		  	</div>
		  	

		  	
	  	<!-- FIN FIN FIN -->
				
			</br>
			 </br>
			<div class="btn-inline">
				<div class="btn-group col-sm-7"></div>
				
				<div class="btn-group ">
					<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Guardar">
				</div>
				<div class="btn-group">
					<a href="/ambiente/index" class="btn btn-info">Cancelar</a>
				</div>
			</div>
			</br>
			</br>

				<!-- VENTANA EMERGENTE INiCiO -->
			  	 <div class="form-group">
					<div class="col-sm-12 text-center">
						
						<!-- style="z-index:2; padding-top:100px;"
						 --><!-- <button type="submit" class="btn btn-lg btn-primary">Registrar</button> -->
						<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmationLabel" data-keyboard="false" data-backdrop="static" style="position:relative">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<!-- Header de la ventana -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="cerrarventana()">&times;</span></button>
										<h4 class="modal-title">EDITAR AMBIENTE</h4>
									</div>
									<!-- Contenido de la ventana -->
									<div class="modal-body">
										<p>¿Desea guardar los cambios realizados?</p>
									</div>
									<div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
								        <button type="submit" class="btn btn-primary">Confirmar</button>
							      	</div>
								</div>
							</div>
						</div>
					</div>	
				</div>


			  	
			  	<!-- VENTANA EMERGENTE FIN -->
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

	<script>
		function ventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 1;
		}
		function cerrarventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 3;
		}
  	</script>

</body>
</html>