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
	{!!Html::style('css/jquery.dataTables.css')!!}
	<style>
		.table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td{
			vertical-align: middle;
		}
	</style>
	
</head>
<body>
@extends('layouts.headerandfooter-al-socio')

@section('content')
	
<main class="main">
<div class="content" style="max-width: 100%;">
	<div class="container">
		<div class="row" style="max-width: 940px">
			<div class="col-sm-3">
				<ol class="breadcrumb" style="background:none;">
					<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
					<li class="active">Consultar Actividades</li>
				</ol>
			</div>				
		</div>
	</div>
	<br/>
	<br/>
	<div class="container">
		@include('alerts.errors')
		@include('alerts.success')
	</div>
	<div class="container">
		<div class="col-sm-12 text-left lead">
			<strong>INSCRIPCIÓN DE ACTIVIDADES</strong>
		</div>		
	</div>
	<br/>

	<div class="container">
		<form method="POST" action="/inscripcion-actividad/inscripcion-actividades" class="form-horizontal form-border"> 
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br/>
			<!-- <div class="form-group">
					  		<div class="text-center ">
					  			<font color="red"> 
					  				(*) Dato Obligatorio
					  			</font>
					  		</div>
			</div> -->
			<br/>
			<div class="form-group ">
			   	<label for="sedeInput" class="col-sm-4 control-label">SEDE</label>	
				<div class="col-sm-5">
				  	<select class="form-control" name="sedeSelec" style="max-width: 170px">
				  		<option value="-1" default>Todas las sedes</option>
				        @foreach ($sedes as $sede)      
				      	<option value="{{$sede->id}}">{{$sede->nombre}}</option>
				        @endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
			 	<label for="fechaInput" class="col-sm-4 control-label">FECHA (dd/mm/aaaa) </label>
			    <div class="col-sm-5">
				  	<div class="input-group">
			   		<input class="datepicker form-control"  type="text"  id="fecha_inicio" name="fecha_inicio" placeholder="Fecha Inicio" value="{{$fecha_inicio}}" style="max-width: 250px" >
			   		<span class="input-group-addon">-</span>
			   		<input class="datepicker form-control" type="text" id="fecha_fin" name="fecha_fin" placeholder="Fecha Fin" value="{{$fecha_fin}}" style="max-width: 250px">

			   	 	</div>
		    	</div>	
			</div>
			<div class="form-group">
			 	<label for="horaInput" class="col-sm-4 control-label">Hora (hh-mm) </label>
			    <div class="col-sm-5">
				   	<div class="input-group">
				   		<input name="horaInicio" id="horaInicio" type="time"  class="form-control">
			       		<span class="input-group-addon">-</span>
			       		<input name="horaFin" id="horaFin" type="time"  class="form-control">
			   	   	</div>
		    	</div>	
			</div>
			<!-- Boton Buscar INICIO -->
			<div class="btn-inline">
				<div class="btn-group col-sm-8"></div>
				<div class="btn-group ">
					<input class="btn btn-primary" type="submit" value="Filtrar">
				</div>
			</div>
			<!-- Boton Buscar FIN -->
			</br>
			</br>
		</form>
	</div>
	</div>
	<br/><br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>A C T I V I D A D E S &nbsp;&nbsp; D I S P O N I B L E S</strong></p>
			</div>
		</div>
	</div>
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
						<tr style="background:#a3decb; font: caption; color:#FFF;">
								<th><DIV ALIGN=center>Sede</th>
								<th style="max-width:70px;"><DIV ALIGN=center>Lugar</th>
								<th style="max-width:90px;"><DIV ALIGN=center>Nombre de la actividad</th>
								<th><DIV ALIGN=center>Fecha&nbsp;&nbsp;</th>
								<th><DIV ALIGN=center>Hora de inicio</th>
								<th><DIV ALIGN=center>Precio</th>
								<th style="max-width:85px;"><DIV ALIGN=center>Cupos disponibles</th>
								<th><DIV ALIGN=center>Estado</th>
								<th><div align=center>Detalle</div></th>
								<th ><DIV ALIGN=center>Inscribirse</th>
								<th><DIV ALIGN=center>Inscribir a un familiar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($actividades as $actividad)						
					    	<tr>
					    		<td>{{ $actividad->ambiente->sede->nombre }}</td>
					    		<td>{{ $actividad->ambiente->nombre }}</td>
								<td>{{ $actividad->nombre }}</td>
								
		 						<td>{{ date("d-m-Y",strtotime($actividad->a_realizarse_en))}}</td>
		 						<td>{{  $actividad->hora_inicio}}</td>		 						
		 						<td>S/.{{ $actividad->precio($tipo_persona, $actividad->tarifas) }}</td>
		 						@if($actividad->cupos_disponibles<=0)
									<td>No hay cupos disponibles</td>
								@else
									<td>{{ $actividad->cupos_disponibles }}</td>
								@endif		 						
		 						@if((count($actividades_persona->where('id',$actividad->id))!=0))
		 						<td style="background:#d5efd5;">Inscrito</td>
		 						<td>  <!-- DETALLE -->
									<a class="btn btn-info" href="{{url('/actividades/'.$actividad->id.'/show')}}"  title="Detalle"><i class="glyphicon glyphicon-list-alt"></i></a>

								</td>
								<td>
						        	<a class="btn btn-info" title="Ya se encuentra inscrito" disabled><i class="glyphicon glyphicon-ban-circle"></i></a>
						        </td>	
						        @elseif($actividad->cupos_disponibles<=0)
						        <td style="background:#f7e5e5;">No Inscrito</td>	
						        <td>  <!-- DETALLE -->
									<a class="btn btn-info" href="{{url('/actividades/'.$actividad->id.'/show')}}"  title="Detalle"><i class="glyphicon glyphicon-list-alt"></i></a>

								</td>
						        <td>
						        	<a class="btn btn-info" title="No hay más cupos disponibles" disabled><i class="glyphicon glyphicon-ban-circle"></i></a>
						        </td>
						        @else
						        <td style="background:#f7e5e5;">No Inscrito</td>
						        <td>  <!-- DETALLE -->
									<a class="btn btn-info" href="{{url('/actividades/'.$actividad->id.'/show')}}"  title="Detalle"><i class="glyphicon glyphicon-list-alt"></i></a>

								</td>
						        <td>
						        	<a class="btn btn-info" href="{{url('/inscripcion-actividad/'.$actividad->id.'/confirmacion-inscripcion-actividades')}}" title="Inscripcion" ><i class="glyphicon glyphicon-pencil"></i></a>
						        </td>
						        @endif
								
						        <td>
							        @if($actividad->cupos_disponibles<=0)
							        	<a class="btn btn-info" title="No hay más cupos disponibles" disabled><i class="glyphicon glyphicon-ban-circle"></i></a>
							        @else
						        	    <a class="btn btn-info" href="{{url('/inscripcion-actividad/'.$actividad->id.'/confirmacion-inscripcion-actividades-to-familiar')}}" title="Inscribir a un familiar" ><i class="glyphicon glyphicon-pencil"></i></a>
							        @endif
						        </td>	
							</tr>
						@endforeach
					</tbody>									
			</table>	
	</div>
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-right">
					<a href="{!!URL::to('/inscripcion-actividad/mis-inscripciones')!!}" title="Ver mis inscripciones" class="btn btn-md btn-primary">Mis Inscripciones</a>		
				</div>
			<div class="col-sm-6 text-left">
				<a href="{{url('/socio')}}" class="btn btn-md btn-primary" title="Regresar a página de inicio">Regresar</a>			
			</div>
		</div>
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
	<!-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script> -->
	{!!Html::script('js/jquery.dataTables.js')!!}
	<script>
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "{!!URL::to('/locales/Spanish.json')!!}"

		       }
		  	});
  		});
	</script>
	<!-- Para Data TAble FIN -->
	

	<!-- Para Fechas INICIO -->
	<!-- <script>
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
	</script> -->
	<script>
		var nowDate = new Date();
		var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
	</script>
	<script>
		$(function(){
			$('.datepicker').datepicker({
				format: "dd/mm/yyyy",
		        language: "es",
		        autoclose: true,
		        startDate: today,
			});
		});
	</script>


	<!-- Para Fecha FIN -->


</body>


</html>