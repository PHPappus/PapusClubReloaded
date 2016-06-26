
	<!DOCTYPE html>
	<html>
	<head>
		<title>REGISTRAR SORTEO</title>
		<meta charset="UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/datepicker.css">
		<link rel="stylesheet" type="text/css" href="../css/MisEstilos.css">	
		
		
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
						<strong>REGISTRAR SORTEO</strong>
				</div>		
			</div>
			<div class="container">
				<form method="POST" action="/sorteo/new/sorteo" class="form-horizontal form-border">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
					<div class="col-sm-4"></div>
					<div class="">
				  		<font color="red"> 
				  			(*) Dato Obligatorio
				  		</font>				
					</div>
					<div class="col-sm-4"></div>
					<div>
						El sorteo se ejecutará una semana antes del inicio de las reservas
					</div>			
				  	</br>
					<div class="form-group required">
						<label  class="control-label col-sm-5">NOMBRE DEL SORTEO:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="nombre_sorteo" name="nombre_sorteo" value="{{ old('nombre_sorteo') }}" required style="max-width: 250px" >
						</div>
					</div>				

					<div class="form-group required">
						<label  class="control-label col-sm-5">DESCRIPCION:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" required style="max-width: 250px" >
						</div>
					</div>

					<!--<div class="form-group required">
						<label  class="control-label col-sm-5">FECHA CIERRE SORTEO [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input class="datepicker" type="text" id="fecha_cierre_sorteo" readonly name="fecha_cierre_sorteo" value="{{ old('fecha_cierre_sorteo') }}"  >						
						</div>					
					</div>-->
					
					<div class="form-group required">
						<label  class="control-label col-sm-5">FECHA INICIO RESERVA [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input class="datepicker" type="text" id="fecha_abierto" readonly name="fecha_abierto" value="{{ old('fecha_abierto') }}"  >						
						</div>					
					</div>
					
					<div class="form-group required">
						<label  class="control-label col-sm-5">FECHA FIN RESERVA [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input class="datepicker" type="text" id="fecha_cerrado" readonly name="fecha_cerrado"  value="{{ old('fecha_cerrado') }}" >						
						</div>
					</div>
					<div class="form-group required">
				    	<label  class="control-label col-sm-5">SEDE</label>	
				    	<div class="col-sm-7">
					    	<select class="form-control" name="sedeSelec" style="max-width: 150px "  >					         
				                @foreach ($sedes as $sede)      
				                	<option value="{{$sede->id}}">{{$sede->nombre}}</option>
				                @endforeach
							</select>
						</div>
				  	</div>
				  	<div class="form-group required">
						<label  class="control-label col-sm-5">PRECIO:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" required style="max-width: 250px" >
						</div>
					</div>
					<br><br>
					<div class="btn-inline">
						<div class="btn-group col-sm-7"></div>
						
						<div class="btn-group ">
							<input class="btn btn-primary" type="submit" value="Continuar">
						</div>
						<div class="btn-group">
							<a href="/sorteo/index" class="btn btn-info">Cancelar</a>
						</div>
					</div>
					<br><br>

				</form>
			</div>
		</div>	
	</main>	
	@stop
	{!!Html::script('js/jquery-1.12.4.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/bootstrap-datepicker-sirve.js')!!}
	


		
		
		<script>
			$(document).ready(function(){
					var nowTemp = new Date();		
					var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth()+1, nowTemp.getDate(), 0, 0, 0, 0);
			 
					var checkin = $('#fecha_abierto').datepicker({
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
			  			$('#fecha_cerrado')[0].focus();
					}).data('datepicker');

					var checkout = $('#fecha_cerrado').datepicker({
			  			onRender: function(date) {
			    			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			  			}
					}).on('changeDate', function(ev) {
			  			checkout.hide();
					}).data('datepicker');	
					$(function(){

					$('#fecha_abierto').datepicker('update', now);
					});

					$(function(){
						$('.datepicker').datepicker({
							format: 'dd/mm/yyyy',
					        autoclose: true,
					        setDate: now
						});
					});
			});
			
		</script>	
	</body>
	</html>