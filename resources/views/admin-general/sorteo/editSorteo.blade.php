	<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR SORTEO</title>
	<meta charset="UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		{!!Html::style('../css/bootstrap.css')!!}
		{!!Html::style('../css/datepicker.css')!!}
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
					<strong>MODIFICAR SORTEO</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/sorteo/{{ $sorteo->id }}/edit" class="form-horizontal form-border">
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
				<div class="col-sm-4"></div>
				<div class="">	  			
				</div>			
			  	</br>
			  	</br>
			  	@if(is_null(old('nombre_sorteo')))	
					<div class="form-group">
						<label for="" class="control-label col-sm-5">NOMBRE DEL SORTEO:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="nombre_sorteo" name="nombre_sorteo"   style="max-width: 250px" value="{{$sorteo->nombre_sorteo}}">
						</div>
					</div>
				@else
					<div class="form-group">
						<label for="" class="control-label col-sm-5">NOMBRE DEL SORTEO:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="nombre_sorteo" name="nombre_sorteo"   style="max-width: 250px" value="{{ old('nombre_sorteo') }}">
						</div>
					</div>
				@endif		

				@if(is_null(old('descripcion')))
					<div class="form-group">
						<label for="" class="control-label col-sm-5">DESCRIPCION:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="descripcion" name="descripcion"   style="max-width: 250px" value="{{$sorteo->descripcion}}">
						</div>
					</div>
				@else
					<div class="form-group">
						<label for="" class="control-label col-sm-5">DESCRIPCION:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="descripcion" name="descripcion"   style="max-width: 250px" value="{{ old('descripcion') }}">
						</div>
					</div>
				@endif

				@if(is_null(old('fecha_abierto')))
					<div class="form-group">
						<label for="" class="control-label col-sm-5">FECHA CIERRE DE SORTEO [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input input class="datepicker" type="text" id="fecha_abierto" disabled  readonly name="fecha_abierto" value="{{$sorteo->fecha_fin_sorteo}}">					
						</div>					
					</div>
				@else
					<div class="form-group">
						<label for="" class="control-label col-sm-5">FECHA CIERRE DE SORTEO [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input input class="datepicker" type="text" id="fecha_abierto" disabled  readonly name="fecha_abierto" value="{{ old('fecha_fin_sorteo') }}">					
						</div>					
					</div>
				@endif
				
				@if(is_null(old('fecha_abierto')))
					<div class="form-group">
						<label for="" class="control-label col-sm-5">FECHA INICIO DE RESERVA [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input input class="datepicker" type="text" id="fecha_abierto" disabled  readonly name="fecha_abierto" value="{{$sorteo->fecha_abierto}}">					
						</div>					
					</div>
				@else
					<div class="form-group">
						<label for="" class="control-label col-sm-5">FECHA INICIO DE RESERVA [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input input class="datepicker" type="text" id="fecha_abierto" disabled  readonly name="fecha_abierto" value="{{ old('fecha_abierto') }}">					
						</div>					
					</div>
				@endif

				@if(is_null(old('fecha_cerrado')))
					<div class="form-group  ">
						<label for="" class="control-label col-sm-5">FECHA FIN DE RESERVA [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input class="datepicker" type="text" id="fecha_cerrado" disabled  readonly name="fecha_cerrado" value="{{$sorteo->fecha_cerrado}}">						
						</div>
					</div>
				@else
					<div class="form-group  ">
						<label for="" class="control-label col-sm-5">FECHA FIN DE RESERVA [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input class="datepicker" type="text" id="fecha_cerrado" disabled readonly name="fecha_cerrado" value="{{ old('fecha_cerrado') }}">						
						</div>
					</div>
				@endif
				<div class="form-group ">
						<label for="" class="control-label col-sm-5">SEDE:</label>
						<div class="col-sm-7">
							<input type="text" id="sede" readonly disabled  name="sede" value="{{ $sede->nombre }}">						
						</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-sm-5">COSTO DE INSCRIPCION:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" readonly disabled id="nombre_sorteo" name="nombre_sorteo"   style="max-width: 250px" value="{{$sorteo->costo_inscripcion}}">
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
@stop
<!-- JQuery -->
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
						$('.datepicker').datepicker({
							format: 'dd/mm/yyyy',
					        language: "es",
					        autoclose: true
						});
					});
			});
	</script>
</body>
</html>