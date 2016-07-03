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

		@media (min-width: 1200px){
			.container {
			    width: 1470px;
			}
		}
		
	</style>
</head>

<body>
@extends('layouts.headerandfooter-al-socio')
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
			<form method="POST" action="/talleres/index" class="form-horizontal form-border"> 
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
				   		<input class="datepicker form-control"  type="text"  id="fecha_inicio" name="fecha_inicio" placeholder="Fecha de Inicio" value="{{old('fecha_inicio')}}" style="max-width: 250px" >

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
				</br></br>
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
		<div class="container" style="max-width:2800px">
			<div class="form-group">
				<div class="text-right">
					<font color="black"> 
						Filtra por todos los campos
					</font>
				</div>
			</div>
			<table id="talleresTable" class="table table-bordered table-hover text-center display">
				<thead class="active">
					<tr style="background:#a3decb; font: caption; color:#FFF;">
						<th><div align=center>Sede</div></th>
						<th><div align=center>Lugar</div></th>
						<th style="max-width:100px;"><div align=center>Nombre del taller</div></th>	
						<th style="max-width:80px;"><div align=center>Profesor</div></th>				
						<th style="max-width:100px;"><div align=center>Empieza</div></th>
						<th style="max-width:100px;"><div align=center>Termina</div></th>
						<th style="max-width:75px;"><div align=center>Vacantes disponibles</div></th>
						
						<th><div align=center>Precio</div></th>
						<th style="max-width:180px;"><div align=center>Fin de la inscripción</div></th>
						<th><div align=center>Estado</div></th>
						<th><div align=center>Detalle</div></th>
						<th style="max-width:75px;"><div align=center>Inscribirse</div></th>
						<th><div align=center>Inscribir a un familiar</div></th>
					</tr>
				</thead>
				<tbody>
					@foreach($talleres as $taller)
						<tr>
							<td>{{$taller->reserva->ambiente->sede->nombre}}</td>
							<td>{{$taller->reserva->ambiente->nombre}}</td>
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
							
							<td>S/.{{ $taller->precio($tipo_persona, $taller->tarifas) }}</td>
							<td>{{date("d-m-Y",strtotime($taller->fecha_fin_inscripciones))}}
							</td>
					    		@if(count($talleresxpersona->where('id',$taller->id))!=0)
					    			<td style="background:#bcd8bc;">Inscrito</td>
					    		@else
					    			<td style="background:#f7e5e5;">No inscrito</td>
					    		@endif
							<td> 
								<a class="btn btn-info" href="{{url('/talleres/'.$taller->id.'/show')}}"  title="Detalle"><i class="glyphicon glyphicon-list-alt"></i></a>

							</td>
							<td>
								@if((count($talleresxpersona->where('id',$taller->id))!=0)||($taller->vacantes<=0))
					    			<a class="btn btn-info"  title="Ya se encuentra inscrito" disabled><i class="glyphicon glyphicon-ban-circle"></i></a>
					    		@else
					    			<a class="btn btn-info" title="Inscribirse" href="{{url('/talleres/'.$taller->id.'/confirm')}}"><i class="glyphicon glyphicon-pencil"></i></a>
					    		@endif					
							</td>
							<td>
								<a class="btn btn-info" title="Inscribir a un familiar" href="{{url('/talleres-familiar/'.$taller->id.'/confirm')}}"><i class="glyphicon glyphicon-pencil"></i></a>
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
						<a href="{!!URL::to('/talleres/mis-inscripciones')!!}" title="Ver mis inscripciones" class="btn btn-md btn-primary" >Mis Inscripciones</a>		
					</div>
				<div class="col-sm-6 text-left">
					<a href="{{url('/socio')}}" class="btn btn-md btn-primary" title="Regresar a página de inicio">Regresar</a>			
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