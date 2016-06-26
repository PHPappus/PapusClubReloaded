<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE TRASPASO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
</head>

<body>
@extends('layouts.headerandfooter-al-admin-persona')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>DETALLE DE TRASPASO</strong>
			</div>		
		</div>

		<div class="container">
			<form method="POST" action="/traspaso/new/save" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre Socio</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{$traspaso->socio->postulante->persona->nombre}}"  readonly>
			    	</div>
			  	</div>
	    		
			  	<div class="form-group">
			    	<label for="dniInput" class="col-sm-4 control-label">DNI Socio</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="dniInput" name="dni" placeholder="Nombre" value="{{$traspaso->socio->postulante->persona->doc_identidad}}"  readonly>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="nombrePInput" class="col-sm-4 control-label">Nombre Postulante</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombrePInput" name="nombreP" placeholder="Nombre" value="{{$traspaso->nombre}}"  readonly>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="dniPInput" class="col-sm-4 control-label">DNI Postulante</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="dniPInput" name="dniP" placeholder="Nombre" value="{{$traspaso->dni}}"  readonly>
			    	</div>
			  	</div>

			  	</br>
			  	</br>
				<div class="form-group">
					<div class="btn-group ">
						<input type="submit" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Confirmar">
					</div>
					<div class="col-sm-6"></div>
						<a class="btn btn-info" href="/traspasos-p/" title="Editar" >Regresar <i class="glyphicon glyphicon-arrow-left"></i></a>			
					
				</br>
				</br>

			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/bootstrap-datepicker.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
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
				});
		});
			
	</script>	
	<script>
		$(function(){
			$('.datepicker').datepicker({
				format: "dd/mm/yyyy",
		        language: 'es',
		        autoclose: true
		        //beforeShowDay:function (date){return false}
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