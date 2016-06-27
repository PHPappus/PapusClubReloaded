<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR CONCESIONARIA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/bootstrap-datepicker3.css')!!}
	{!!Html::style('/css/DataTable.css')!!}	

	<style>

		.modal-backdrop.in{
			z-index: 1;
		}
	</style>
</head>

<body>
@extends('layouts.headerandfooter-al-admin-registros')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>EDITAR CONCESIONARIA</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/concesionaria/{{ $concesionaria->id }}/edit" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
				<!-- Mensajes de error de validación del Request -->
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

				<br/><br/>

				<!-- INICIO INCIIO -->				        
				<div class="form-group">
			    	<label for="sede_nombre" class="col-sm-4 control-label">Sede</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="sede_nombre" name="sede_nombre" placeholder="Nombre de la Sede" value="{{$concesionaria->sede->nombre}}" readonly>
			    	</div>
			  	</div>						

			  	<div class="form-group" hidden>
			    	<label for="sede_id" class="col-sm-4 control-label">ID Sede</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="sede_id" name="sede_id" placeholder="ID de la Sede" value="{{$concesionaria->sede_id}}" readonly>
			    	</div>
			  	</div>						

				<div class="form-group">
		    		<label for="nombre_concesionariaInput" class="col-sm-4 control-label">Nombre</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombre" name="nombre" value="{{$concesionaria->nombre}}" readonly>
		    		</div>
		  		</div>
			  	<div class="form-group">
			    	<label for="rucInput" class="col-sm-4 control-label">RUC</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="rucInput" name="ruc" value="{{$concesionaria->ruc}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" value="{{$concesionaria->descripcion}}">
			    	</div>
			  	</div>	  	
			  	<div class="form-group">
			    	<label for="telefonoInput" class="col-sm-4 control-label">Teléfono</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="telefonoInput" name="telefono" value="{{$concesionaria->telefono}}" >
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="correoInput" class="col-sm-4 control-label">Correo</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="correoInput" name="correo" value="{{$concesionaria->correo}}">
			    	</div>
			  	</div>
			  	
			  	<div class="form-group">
			    	<label for="nombre_responsableInput" class="col-sm-4 control-label">Nombre del Responsable</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombre_responsableInput" name="nombre_responsable" value="{{$concesionaria->nombre_responsable}}" >
			    	</div>
			  	</div>			  
			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label ">Estado</label>
			    	<div class="col-sm-3">			      					      	
			      		
			      		<select class="form-control" id="estado" name="estado" >
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value="1" @if($concesionaria['estado'] == true) selected @endif >Activo</option>
						<option value="0" @if($concesionaria['estado'] == false) selected @endif>Inactivo</option>				
						
						</select>							
			    	</div>	    	
			  	</div>
			  	
			  	<div class="form-group required">
			    	<label for="tipoConcesionariaInput" class="col-sm-4 control-label">Tipo de Concesionaria</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipo_concesionaria" name="tipo_concesionaria" value="{{$concesionaria->tipo_concesionaria}}" readonly>
			    	</div>	    	
			  	</div>		

			  	<div class="form-group required">
					<label  class="control-label col-sm-4">Inicio de Concesión [dd/mm/aaaa]:</label>
					<div class="col-sm-5">
						<input class="datepicker" type="text" id="fecha_inicio_concesion" readonly name="fecha_inicio_concesion" value="{{ $concesionaria->fecha_inicio_concesion }}"  >						
					</div>					
				</div>
				
				<div class="form-group required">
					<label  class="control-label col-sm-4">Fin de Concesión [dd/mm/aaaa]:</label>
					<div class="col-sm-5">
						<input class="datepicker" type="text" id="fecha_fin_concesion" readonly name="fecha_fin_concesion"  value="{{ $concesionaria->fecha_fin_concesion }}" >						
					</div>
				</div>
					<!-- FIN FIN FIN  -->
				
			
				</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Aceptar">
					</div>
					<div class="btn-group">
						<a href="/concesionaria/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>

				<!-- Ventana modal de Confirmación -->			  	
				<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" data-backdrop="static">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<!-- Header de la ventana -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="cerrarventana()">&times;</span></button>
								<h4 class="modal-title">EDITAR CONCESIONARIA</h4>
							</div>
							<!-- Contenido de la ventana -->
							<div class="modal-body">
								<p>¿Desea guardar los cambios realizados?</p>
							</div>
							<div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cancelar</button>
						        <button type="submit" class="btn btn-primary">Confirmar</button>
					      	</div>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>		
@stop
	<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('/js/jquery.bxslider.min.js')!!}	
	{!!Html::script('js/MisScripts.js')!!}
	{!!Html::script('js/jquery-1.12.4.min.js')!!}	
	{!!Html::script('js/bootstrap-datepicker-sirve.js')!!}		  
	
	<!-- Javascript -->
	<script>
		function ventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 1;
		}
		function cerrarventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 3;
		}
  	</script>
  	<script>
		$(document).ready(function(){						 		
			var nowTemp = new Date();		
			var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

			var checkin = $('#fecha_inicio_concesion').datepicker({					
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
	  			$('#fecha_fin_concesion')[0].focus();
			}).data('datepicker');

			var checkout = $('#fecha_fin_concesion').datepicker({
				language: "es",
	  			onRender: function(date) {
	    			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
	  			}
			}).on('changeDate', function(ev) {
	  			checkout.hide();
			}).data('datepicker');	
			$(function(){

			$('#fecha_inicio_concesion').datepicker('update', now);
			});

			$(function(){
				$('.datepicker').datepicker({
					format: "dd/mm/yyyy",				        
			        autoclose: true,
			        startDate: today,						
			        setDate: now
				});
			});

		});		

	</script>	
</body>
</html>