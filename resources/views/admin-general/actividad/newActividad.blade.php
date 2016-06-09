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
			    	<label for="ambienteInput" class="col-sm-4 control-label">Ambiente</label>
			    	<div class="col-sm-5">
			    		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="{{$ambiente->nombre}}"   readonly>
			      	</div>
			      	<a class="btn btn-info" name="buscarAmbiente" href="{!!URL::to('/ambiente/search')!!}"  title="Buscar" ><i name="buscarAmbiente" class="glyphicon glyphicon-search"></i></a>
			  	</div>
			  	<div class="form-group required">
			    	<label for="tipoambienteInput" class="col-sm-4 control-label">Tipo de Ambiente</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipoambienteInput" name="tipoambiente" value="{{$ambiente->tipo_ambiente}}"   readonly>
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="sedeInput" class="col-sm-4 control-label">Sede</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="sedeInput" name="sede" value="{{$ambiente->sede->nombre}}"   readonly>
			    	</div>
			  	</div>

				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre de la actividad" value="{{old('nombre')}}" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fechaInicioInput" class="col-sm-4 control-label">Fecha Inicio(dd/mm/aaaa)</label>
			    	<div class="col-sm-5">
			      		<!-- <input type="date" class="form-control" id="fechaInicioInput" name="fecha"> -->
			      		<input class="datepicker"  type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="a_realizarse_en" placeholder="Fecha Inicio" style="max-width: 250px">
			    	</div>
			  	</div>
			 
			  	<div class="form-group required">
			    	<label for="horaInicioInput" class="col-sm-4 control-label">Hora Inicio(HH:mm:ss)</label>
			    	<div class="col-sm-5">
			      		<input type="time" class="form-control" id="horaInicioInput" name="hora">
			      		 	
			  	
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<textarea type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" style="resize: none"></textarea> 
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="tipoActividadInput" class="col-sm-4 control-label">Tipo de Actividad</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" id="tipoActividadInput" name="tipo_actividad" style="max-width: 150px "  >
				    						<option value="-1" default>Seleccione</option>
							               	@foreach ($values as $value)      
							                	<option value="{{$value->id}}">{{$value->valor}}</option>
							               	@endforeach
						</select>
					</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="cant_ambientesInput" class="col-sm-4 control-label">Cantidad de ambientes a usar</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="cant_ambientesInput" name="cant_ambientes" placeholder="Cantidad de ambientes" >
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad máxima</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidadInput" name="capacidad_maxima" placeholder="Capacidad Maxima" value="{{old('capacidad_maxima')}}" >
			    	</div>
			  	</div>	  	
			  	
			  	
			  	<!-- EL ESTADO SIEMPRE VA EN TRUE PARA EL REGISTRAR -->
			  	

			  	<!-- INICIO  PRECIO POR TIPO DE PERSONA -->

			  	<br/>
			<div class="form-group "> 
				<label for="precioTipo1" class="col-sm-4 control-label" width: 100px >Precios </label>
			</div>
			<div class="form-group required">
			   	<label for="precioTipo1" class="col-sm-4 control-label">Trabajador</label>
			   	<div class="col-sm-5">
			   		<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="precioTipo1" name="precioTipo1" placeholder="Precio (S/.)" value="{{old('capacidad_actual')}}" >
			   	</div>
			</div>	
			<div class="form-group required">
			   	<label for="precioTipo2" class="col-sm-4 control-label">Postulante</label>
			   	<div class="col-sm-5">
					<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="precioTipo2" name="precioTipo2" placeholder="Precio (S/.)" value="{{old('capacidad_actual')}}" >
			   	</div>
			</div>	
			<div class="form-group required">
			   	<label for="precioTipo3" class="col-sm-4 control-label">Socio</label>
			   	<div class="col-sm-5">
			   		<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="precioTipo3" name="precioTipo3" placeholder="Precio (S/.)" value="{{old('capacidad_actual')}}" >
			   	</div>
			</div>	
			  	
			  	<!-- FIN     PRECIO POR TIPO DE PERSONA -->
			  
			  	
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
	{!!Html::script('js/jquery-1.12.4.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/bootstrap-datepicker-sirve.js')!!}
	{!!Html::script('locales/bootstrap-datepicker.es.min.js')!!}
	
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
				format: 'dd/mm/yyyy', 
				language: 'es'
			});
			$('.datepicker').on('changeDate', function(ev){
			    $(this).datepicker('hide');
			});
		});
	</script>




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
