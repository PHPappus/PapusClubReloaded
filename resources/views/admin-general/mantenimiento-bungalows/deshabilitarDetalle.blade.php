
<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE MANTENIMIENTO DE BUNGALOW</title>
	<meta charset="UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		{!!Html::style('css/font-awesome.css')!!}
		{!!Html::style('css/bootstrap.css')!!}
		{!!Html::style('css/datepicker.css')!!}
		{!!Html::style('css/MisEstilos.css')!!}	
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin-reserva')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>DETALLE DE MANTENIMIENTO DE BUNGALOW</strong>
			</div>		
			<div></div>
		</div>
		
		<div class="container">
				<form method="POST" action="/mantBungalowPrev/deshabilitar/{{$id}}/confirmacion" class="form-horizontal form-border">
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
				  			Se eliminaran las reservas y sorteos asociados al bungalow en los dias elegidos
				  		</font>				
					</div>
		
				  	</br>


					<div class="form-group required">
						<label  class="control-label col-sm-5">FECHA INICIO MANTENIMIENTO [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input class="datepicker" type="text" id="fecha_abierto" readonly name="fecha_abierto" value="{{ old('fecha_abierto') }}"  >						
						</div>					
					</div>
					
					<div class="form-group required">
						<label  class="control-label col-sm-5">FECHA FIN MANTENIMIENTO [dd/mm/aaaa]:</label>
						<div class="col-sm-7">
							<input class="datepicker" type="text" id="fecha_cerrado" readonly name="fecha_cerrado"  value="{{ old('fecha_cerrado') }}" >						
						</div>
					</div>
					
					<br><br>
					<div class="btn-inline">
						<div class="btn-group col-sm-7"></div>
						
						<div class="btn-group ">
							<input class="btn btn-primary" type="submit" value="Continuar">
						</div>
						<div class="btn-group">
							<a href="/mantBungalowPrev/index" class="btn btn-info">Cancelar</a>
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
	

	<script>			
			$(document).ready(function(){

					var js_var = "<?php echo $configuracion; ?>";

					var nowTemp = new Date();		

					var now;

					if(js_var == 1){
						now = new Date(nowTemp.getFullYear(), nowTemp.getMonth() +1, nowTemp.getDate(), 0, 0, 0, 0);
					}
					else{
						now = new Date(nowTemp.getFullYear(), nowTemp.getMonth() , nowTemp.getDate(), 0, 0, 0, 0);
					}
			 
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
<!-- Modal -->
	<div id="modalEliminar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Confirmar</h4>
	      </div>
	      <div class="modal-body">
	        <p>¿Está seguro que desea cancelar la creación del sorteo?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal Event-->
	<script>
		$('#modalEliminar').on('show.bs.modal', function(e) {
   			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>

	
</html>