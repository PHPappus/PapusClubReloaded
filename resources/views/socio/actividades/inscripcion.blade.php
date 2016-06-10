<!DOCTYPE html>
<html>
<head>
	<title>INSCRIPCIÓN</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/bootstrap-datepicker3.css')!!}

   
 
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
	
</head>
<body>
@extends('layouts.headerandfooter-al-socio')

@section('content')
	
<main class="main">
<div class="content" style="max-width: 100%;">
	<br/>
	<br/>
	@include('alerts.errors')
	@include('alerts.success')
	<div class="container">
		<div class="col-sm-12 text-left lead">
			<strong>INSCRIPCIÓN DE ACTIVIDADES</strong>
		</div>		
	</div>
	<br/>

	<div class="container">
		<form method="POST" action="/inscripcion-actividad/inscripcion-actividades" class="form-horizontal form-border"> <!-- FALTA CAMBIAR LA ACTION =D -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br/>
			<div class="form-group">
		  		<div class="text-center ">
		  			<font color="red"> 
		  				(*) Dato Obligatorio
		  			</font>
		  		</div>
			</div>
			<br/>
			<div class="form-group required ">
			   	<label for="sedeInput" class="col-sm-4 control-label">SEDE</label>	
				<div class="col-sm-5">
				  	<select class="form-control" name="sedeSelec" style="max-width: 170px">
				  		<!-- <option value="-1" default>Todas las sedes</option> -->
				        @foreach ($sedes as $sede)      
				      	<option value="{{$sede->id}}">{{$sede->nombre}}</option>
				        @endforeach
					</select>
				</div>
			</div>
			<div class="form-group required">
			 	<label for="fechaInput" class="col-sm-4 control-label">FECHA (dd/mm/aaaa) </label>
			    <div class="col-sm-5">
				  	<div class="input-group">
			   		<input class="datepicker"  type="text"  id="dpd1" name="fecha_inicio" placeholder="Fecha Inicio" style="max-width: 250px">
			   		<span class="input-group-addon">-</span>
			   		<input class="datepicker" type="text" id="dpd2" name="fecha_fin" placeholder="Fecha Fin" style="max-width: 250px">

			   	 	</div>
		    	</div>	
			</div>
		
			<!-- Boton Buscar INICIO -->
			<div class="btn-inline">
				<div class="btn-group col-sm-8"></div>
				<div class="btn-group ">
					<input class="btn btn-primary" type="submit" value="Buscar">
				</div>
			</div>
			<!-- Boton Buscar FIN -->
			</br>
			</br>
		</form>
	</div>
	</div>
	<br/>
	<br/>

	<br/>
	<div class="container">
		<div class="form-group">
				<div class="text-right">
					<font color="black"> 
						Filtra por todos los campos
					</font>
				</div>
		 </div>
		<table class="table table-bordered table-hover text-center display" id="example">
					<thead class="active">
						<tr>
								<th><DIV ALIGN=center>SEDE</th>
								<th><DIV ALIGN=center>AMBIENTE</th>
								<th><DIV ALIGN=center>NOMBRE</th>
								<th><DIV ALIGN=center>CAPACIDAD</th>
								<th><DIV ALIGN=center>FECHA Y HORA</th>
								<th><DIV ALIGN=center>INSCRIBIRSE</th>
						</tr>
					</thead>
					<tbody>
						@foreach($actividades as $actividad)						
					    	<tr>
					    		<td>{{ $actividad->ambiente->sede->nombre }}</td>
					    		<td>{{ $actividad->ambiente->nombre }}</td>
								<td>{{ $actividad->nombre }}</td>
		 						<td>{{ $actividad->capacidad_maxima }}</td>
		 						<td>{{ $actividad->a_realizarse_en}}</td>
								<td>
						        <a class="btn btn-info" href="{{url('/inscripcion-actividad/'.$actividad->id.'/confirmacion-inscripcion-actividades')}}" title="Inscripcion" ><i class="glyphicon glyphicon-ok"></i></a>
						        </td>						            
							</tr>
						@endforeach
					</tbody>									
			</table>	
	</div>
<br/>
<br/>
 @stop
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}
	 <!-- Languaje -->
    {!!Html::script('js/bootstrap-datepicker.es.min.js')!!}
	<!-- {!!Html::script('js/bootstrap-datepicker-sirve.js')!!} -->
	<!-- {!!Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js')!!} -->
	

	<!-- Para Data TAble INICIO -->
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
	<!-- Para Data TAble FIN -->
	

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
    			var newDate = new Date(ev.date);
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
	</script>
	<script>
		$(function(){
			$('.datepicker').datepicker({
				format: "dd/mm/yyyy",
		        language: "es",
		        autoclose: true,
			});
		});
	</script>


	<!-- Para Fecha FIN -->


</body>


</html>