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
	{!!Html::style('css/datepicker.css')!!}
	
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
					<strong>DETALLE DE LA RESERVA </strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/reservar-ambiente/{{ $ambiente->id }}/confirmacion-reserva-otro-ambiente" class="form-horizontal form-border"> <!-- DEBERIA EL ACTION DE REESRVAR =D -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

			<!-- INICIO INICIO INICIO INICIO -->
			<!-- SE DEBE LEER DATA DE LA BD E INGRESARLOS -->

			<div class="form-group ">
		    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$ambiente->nombre}}" readonly >
		    	</div>
		  	</div>
		  	<div class="form-group ">
		    	<label for="tipoAmbienteInput" class="col-sm-4 control-label">Tipo ambiente</label>	
		    	<div class="col-sm-5">
		    		<input type="text" class="form-control" id="tipoAmbienteInput" name="tipoAmbiente" value="{{$ambiente->tipo_ambiente}}" readonly >
				</div>
		  	</div>

		  	<div class="form-group ">
		    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad máxima</label>
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
		    	<label for="ubicacionInput" class="col-sm-4 control-label">Ubicación</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="ubicacionInput" name="ubicacion" value="{{$ambiente->ubicacion}}" readonly>
		    	</div>
		  	</div>
		  	<div class="form-group required">
			 	<label for="fechaInput" class="col-sm-4 control-label">Fecha (dd/mm/aaaa) </label>
			    <div class="col-sm-5">
				  	<!-- <div class="input-group">
			   		<input name="fechaInicio" id="fechaInicio" type="text" required class="form-control">
			       		<span class="input-group-addon">-</span>
			       		<input name="fechaFin" id="fechaFin" type="text" required class="form-control">
			   	 	</div>
 -->
			   	 	<div class="input-group">
			   		<input class="datepicker"  type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_inicio_reserva" placeholder="Fecha Inicio" style="max-width: 250px">
			   		<span class="input-group-addon">-</span>
			   		<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd2" name="fecha_fin_reserva" placeholder="Fecha Fin" style="max-width: 250px">
					</div>			   		
		    	</div>	
			</div>
			<div class="form-group required">
			 	<label for="horaInput" class="col-sm-4 control-label">Hora (hh-mm) </label>
			    <div class="col-sm-5">
				   	<div class="input-group">
				   		<input name="hora_inicio_reserva" id="horaInicio" type="time" required class="form-control">
			       		<span class="input-group-addon">-</span>
			       		<input name="hora_fin_reserva" id="horaFin" type="time" required class="form-control">
			   	   	</div>
		    	</div>	
			</div>
		  	<div class="form-group required">
			   	<label for="contactoInput" class="col-sm-4 control-label">Socio</label>
			  	<div class="col-sm-5">
			   		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="contactoInput" name="nombre_contacto" placeholder="Socio" value="{{old('nombre_contacto')}}">
			   	</div>
			   	<a class="btn btn-info" name="buscarContacto" href="#"  title="Buscar" ><i name="buscarSocio" class="glyphicon glyphicon-search"></i></a>
			    	<!-- deberia ir a una pantalla que liste todos los contactos posibles del Club  -->
			</div>	
			<div class="form-group ">
		    	<label for="precioInput" class="col-sm-4 control-label">Precio</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="precioInput" onkeypress="return inputLimiter(event,'Numbers')" name="ubicacion" value="FALTA CALCULAR EL PRECIO" readonly>
		    	</div>
		  	</div>  
		  	</br>
		  	</br>
		  	
		  	
	  	<!-- FIN FIN FIN -->

			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/reservar-ambiente/reservar-otros-ambientes" class="btn btn-info">Cancelar</a> <!-- Regresa a la pantalla inicial de la reserva -->
					</div>
				</div>

				</br>
				</br>
			</form>
		</div>
	</div>		
@stop
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}

<!-- Para Fechas INICIO -->
	<script>

		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 	
		var checkin = $('#dpd1').datepicker({
  			onRender: function(date) {
    			return date.valueOf() < now.valueOf() ? 'disabled' : '';
  			}
		}).on('changeDate', function(ev) {
  			if (ev.date.valueOf() > checkout.date.valueOf()) {
    			var newDate = new Date(ev.date)
    			newDate.setDate(newDate.getDate() + 1);
    			checkout.setValue(newDate);
  			}
 			checkin.hide();
  			$('#dpd2')[0].focus();
		}).data('datepicker');
		var checkout = $('#dpd2').datepicker({
  			onRender: function(date) {
    			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  			}
		}).on('changeDate', function(ev) {
  			checkout.hide();
		}).data('datepicker');		
		var date = $('#dp1').datepicker({ dateFormat: 'dd-mm-yy' }).val();

	
	</script>
	<script>
		$(function(){
			$('.datepicker').datepicker({
				format: 'dd/mm/yyyy'
			});
		});
	</script>

	<!-- Para Fecha FIN -->

</body>
</html>