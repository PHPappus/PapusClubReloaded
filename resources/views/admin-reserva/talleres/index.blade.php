<!DOCTYPE html>
<html>
<head>
	<title>Talleres Papus Club</title>
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
@extends('layouts.headerandfooter-al-admin-reserva')
@section('content')

	<div class="content" style="max-width: 100%;">
		<div class="container">
			<div class="row" style="max-width: 920px">
				<div class="col-sm-3">
					<ol class="breadcrumb" style="background:none;">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li class="active">Consultar Talleres</li>
					</ol>
				</div>				
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left lead">
				<strong>INSCRIPCIÓN DE TALLERES</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/taller-admin-reserva/index" class="form-horizontal form-border"> <!-- FALTA CAMBIAR LA ACTION =D -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>
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
				   		<input class="datepicker form-control"  type="text"  id="fecha_inicio" name="fecha_inicio" placeholder="Fecha de Inicio" value="{{$fecha_inicio}}" style="max-width: 250px" >
				   		<!-- <span class="input-group-addon">-</span>
				   		<input class="datepicker form-control" type="text" id="fecha_fin" name="fecha_fin" placeholder="Fecha Fin" value="{{old('fecha_fin')}}" style="max-width: 250px"> -->

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
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong>T A L L E R E S &nbsp;&nbsp; D I S P O N I B L E S</strong></p>
				</div>
			</div>
		</div>
		<div class="container">
			@include('alerts.success')
		</div>
		<div class="table-responsive" >
			<div class="container">
				<table id="talleresTable" class="table table-bordered table-hover text-center display">
					<thead class="active">
						<tr class="active">
							<th><div align=center>NOMBRE</div></th>	
							<th><div align=center>PROFESOR</div></th>				
							<th style="max-width:100px;"><div align=center>EMPIEZA</div></th>
							<th style="max-width:100px;"><div align=center>TERMINA</div></th>
							<th style="max-width:100px;"><div align=center>VACANTES DISPONIBLES</div></th>
							<th style="max-width:180px;"><div align=center>FIN DE LA INSCRIPCIÓN</div></th>
							
							<th><div align=center>DETALLE</div></th>
							<th><div align=center>Inscribir a un Socio</div></th>
						</tr>
					</thead>
					<tbody>
						@foreach($talleres as $taller)
							<tr>
								<td>{{$taller->nombre}}</td>
								<td>{{$taller->profesor}}</td>
								<td>{{date("d-m-Y",strtotime($taller->fecha_inicio))}}</td>
								<td>{{date("d-m-Y",strtotime($taller->fecha_fin))}}</td>
								<td>
									@if($taller->vacantes <= 0)
										No hay vacantes
									@else
										{{$taller->vacantes}}
									@endif
								</td>								
								
								
								<td>{{date("d-m-Y",strtotime($taller->fecha_fin_inscripciones))}}
								</td>

								<td> 
									<a class="btn btn-info" href="{{url('/talleres/'.$taller->id.'/show')}}"  title="Detalle"><i class="glyphicon glyphicon-list-alt"></i></a>

								</td>
								<td>
									@if($taller->vacantes<=0)
						    			<a class="btn btn-info"  title="Ya no hay vacantes disponibles" disabled><i class="glyphicon glyphicon-ban-circle"></i></a>
						    		@else
						    			<a class="btn btn-info" title="Inscribirse" href="{{url('/talleres/'.$taller->id.'/confirm')}}"><i class="glyphicon glyphicon-pencil"></i></a>
						    		@endif					
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>	
		</div>
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-right">
						<a href="{!!URL::to('/talleres/mis-inscripciones')!!}" title="Ver mis inscripciones" class="btn btn-lg btn-primary" >Mis Inscripciones</a>		
					</div>
				<div class="col-sm-6 text-left">
					<a href="{{url('/socio')}}" class="btn btn-lg btn-primary" title="Regresar a página de inicio">Regresar</a>			
				</div>
			</div>
		</div>	
	</div>
@stop
	<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}
	 <!-- Languaje -->
    {!!Html::script('js/bootstrap-datepicker.es.min.js')!!}
	<!-- Data Table -->
    {!!Html::script('js/jquery.dataTables.js')!!}
	<script>
		$(document).ready(function() {
		   $('#talleresTable').DataTable( {
		       "language": {
		           "url": "{!!URL::to('/locales/Spanish.json')!!}"
		       }
		  	});
  		});
		
	</script>
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

</body>
</html>