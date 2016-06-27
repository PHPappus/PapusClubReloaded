
<!DOCTYPE html>
<html>
<head>
	<title>AGREGAR SORTEO</title>
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
					<strong>MANTENIMIENTO PREVENTIVO DE BUNGALOWS</strong>
			</div>		
			<div></div>
		</div>
		
			<form method="POST" action="/mantBungalowPrev/busqueda" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				

					@if ($errors->any())
		  				<ul class="alert alert-danger fade in">
		  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  					@foreach ($errors->all() as $error)
		  						<li>{{$error}}</li>
		  					@endforeach
		  				</ul>
		  			@endif
		  			<br><br>
		  		<div class="form-group">
						<label  class="control-label col-sm-5">FECHA INICIO MANTENIMIENTO [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input class="datepicker" type="text" id="fecha_abierto" readonly name="fecha_abierto" value="{{ old('fecha_abierto') }}"  >						
						</div>					
					</div>
					
					<div class="form-group">
						<label  class="control-label col-sm-5">FECHA FIN MANTENIMIENTO [dd/mm/aaaa]:</label>
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
				<br><br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Filtrar">
					</div>
				</div>
				<br><br>

				
			</form>
		</div>
	</div>		
@stop
	{!!Html::script('js/jquery-1.12.4.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/bootstrap-datepicker-sirve.js')!!}
	
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});
  		});
	</script>
		<script>
			$(document).ready(function(){
					var nowTemp = new Date();		
					var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
			 
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