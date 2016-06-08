<!DOCTYPE html>
<html>
<head>
	<title>RESERVAR BUNGALOW</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 

</head>
<body>
@extends('layouts.headerandfooter-al-admin')

@section('content')


<!-- Mensaje de éxito luego de registrar -->
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{session('stored')}}
			</div>
		@endif




	
<main class="main">
<div class="content" style="max-width: 100%;">
	<br/>
	<br/>
	<div class="container">
		<div class="col-sm-12 text-left lead">
			<strong>RESERVAR OTROS AMBIENTES</strong>
		</div>		
	</div>
	<br/>

	<div class="container">
		<form  class="form-horizontal form-border"> <!-- FALTA CAMBIAR LA ACTION =D -->
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
			   	<label for="sedeInput" class="col-sm-4 control-label">Sede</label>	
				<div class="col-sm-5">
				  	<select class="form-control" name="sedeSelec" style="max-width: 150px "  >
				        @foreach ($sedes as $sede)      
				      	<option value="{{$sede->id}}">{{$sede->nombre}}</option>
				        @endforeach
					</select>
				</div>
			</div>
			<div class="form-group required">
			 	<label for="fechaInput" class="col-sm-4 control-label">Fecha (dd/mm/aaaa) </label>
			    <div class="col-sm-5">
				  	<!-- <div class="input-group">
			   		<input name="fechaInicio" id="fechaInicio" type="text" required class="form-control">
			       		<span class="input-group-addon">-</span>
			       		<input name="fechaFin" id="fechaFin" type="text" required class="form-control">
			   	 	</div>
 -->
			   	 	<div class="input-group">
			   		<input class="datepicker"  type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_inicio" placeholder="Fecha Inicio" style="max-width: 250px">
			   		<span class="input-group-addon">-</span>
			   		<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_fin" placeholder="Fecha Fin" style="max-width: 250px">
					</div>			   		
		    	</div>	
			</div>
			<div class="form-group required">
			 	<label for="horaInput" class="col-sm-4 control-label">Hora (hh-mm) </label>
			    <div class="col-sm-5">
				   	<div class="input-group">
				   		<input name="horaInicio" id="horaInicio" type="time" required class="form-control">
			       		<span class="input-group-addon">-</span>
			       		<input name="horaFin" id="horaFin" type="time" required class="form-control">
			   	   	</div>
		    	</div>	
			</div>
			<div class="form-group required">
			   	<label for="numHabitacionInput" class="col-sm-4 control-label">Capacidad</label>
			   	<div class="col-sm-5">
			   		<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="numHabitacionInput" name="capacidad_actual" placeholder="Capacidad" style="max-width: 100px" >
			   	</div>
			</div>	
				
			<!-- Boton Buscar INICIO -->
			<div class="btn-inline">
				<div class="btn-group col-sm-8"></div>
				<div class="btn-group ">
					<input class="btn btn-primary" type="submit" value="Buscar">
				</div>
				<!-- <div class="btn-group">
					<a href="#" class="btn btn-info">Cancelar</a>
				</div> -->
			</div>
			<!-- Boton Buscar FIN -->
			</br>
			</br>
		</form>
	</div>
	</div>
	<br/>
	<br/>

	<!-- <br/>
	<div class="container form-group">
		<div class="text-lleft ">
			<font color="green"> 
				Resultados:
			</font>
		</div>
	</div>
	<br/> -->

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
				<th><DIV ALIGN=center>NOMBRE</th>
				<th><DIV ALIGN=center>TIPO</th>
				<th><DIV ALIGN=center>CAPACIDAD</th>
				
				<th><DIV ALIGN=center>RESERVAR</th>
				</tr>
				</thead>
				<tbody>
					@foreach($ambientes as $ambiente)						
			    	<tr>
		    		<td>{{ $ambiente->sede->nombre }}</td>
					<td>{{ $ambiente->nombre }}</td>
					<td>{{ $ambiente->tipo_ambiente }}</td>
					<td>{{ $ambiente->capacidad_actual }}</td>
					
				
					<td>
					<a class="btn btn-info" href="{{url('/reservar-ambiente/'.$ambiente->id.'/new-reserva-otro-ambiente')}}"  title="Detalle" ><i class="glyphicon glyphicon-ok"></i></a>


			        </td>
					</tr>
					@endforeach
				</tbody>
		</table>		
	</div>

	

	
	


<!-- </div> -->




<br/>
<br/>
 @stop
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}

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

<!-- Modal Success -->
	<div id="modalSuccess" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">¡Éxito!</h4>
	      </div>
	      <div class="modal-body">
	        <p>{{session('stored')}}</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>           
	      </div>
	    </div>

	  </div>
	</div>
</html>
