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
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
				<br/>
				

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
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre de la actividad" value="{{old('nombre')}}" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fechaInicioInput" class="col-sm-4 control-label">FECHA INICIO(dd/mm/aaaa)</label>
			    	<div class="col-sm-5">
			      		<!-- <input type="date" class="form-control" id="fechaInicioInput" name="fecha"> -->
			      		<input class="datepicker"  type="text" onkeypress="return inputLimiter(event,'Nulo')" id="fechaInicioInput" name="fecha" placeholder="Fecha Inicio" style="max-width: 250px">
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
			      		<textarea type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" ></textarea> 
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
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidadInput" name="capacidad_maxima" placeholder="Capacidad Maxima" value="{{old('capacidad_maxima')}}" >
			    	</div>
			  	</div>	  	
			  	
			  	
			  	<!-- EL ESTADO SIEMPRE VA EN TRUE PARA EL REGISTRAR -->
			  	
			  	
			  	
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