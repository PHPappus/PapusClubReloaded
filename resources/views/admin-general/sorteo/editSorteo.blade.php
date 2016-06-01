<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR SORTEO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="../css/datepicker.css">
	
	
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
					<strong>MODIFICAR SORTEO</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/sorteo/{{ $datos->id }}/edit" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>
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
				<div class="form-group">
					<label for="" class="control-label col-sm-5">NOMBRE DEL SORTEO:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="nombre_sorteo" name="nombre_sorteo" required style="max-width: 250px" value="{{$datos->nombre_sorteo}}">
					</div>
				</div>				

				<div class="form-group">
					<label for="" class="control-label col-sm-5">DESCRIPCION:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="descripcion" name="descripcion" required style="max-width: 250px" value="{{$datos->descripcion}}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="" class="control-label col-sm-5">FECHA ABIERTO:</label>
					<div class="col-sm-7">
						<input class="datepicker" type="text" id="dpd1" readonly="true" name="fecha_abierto" value="{{$datos->fecha_abierto}}">						
					</div>					
				</div>
				
				<div class="form-group">
					<label for="" class="control-label col-sm-5">FECHA CERRADO:</label>
					<div class="col-sm-7">
						<input class="datepicker" type="text" id="dpd2" readonly="true" name="fecha_cerrado" value="{{$datos->fecha_cerrado}}">						
					</div>
				</div>
				
				<br/>
				<br/>
				<br/>
				<div class="form-group">
					<div class="col-sm-6 text-center">
						<input class="btn btn-success"" type="submit" value="Confirmar">	
					</div>
					<div class="col-sm-6 text-center">
						<a href="/sorteo/index" class="btn btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('../js/jquery-1.11.3.min.js')!!}
	{!!Html::script('../js/bootstrap.js')!!}
	{!!Html::script('../js/jquery.bxslider.min.js')!!}
	{!!Html::script('../js/MisScripts.js')!!}
	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>

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
</body>
</html>