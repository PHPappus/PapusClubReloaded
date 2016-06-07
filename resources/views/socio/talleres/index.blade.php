<!DOCTYPE html>
<html>
<head>
	<title>Talleres Papus Club</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<!-- DataTable -->
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

	<div class="content" style="max-width: 100%;">
		<div class="container">
			<div class="row" style="max-width: 920px">
				<div class="col-sm-3">
					<ol class="breadcrumb">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li class="active">Consultar Talleres</li>
					</ol>
				</div>				
			</div>
		</div>
		<div class="container">
			<div class="row">
	  			<div class="col-sm-12 withoutpadding">
	                <img class="slider img-responsive" src="../images/canchafutbol3.jpg" />
	  			</div>
			</div>
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
							<th style="max-width:100px;"><div align=center>FECHA DE INICIO</div></th>
							<th style="max-width:100px;"><div align=center>FECHA DE FIN</div></th>
							<th style="max-width:100px;"><div align=center>VACANTES DISPONIBLES</div></th>
							<th><div align=center>ESTADO</div></th>
							<th><div align=center>PRECIO</div></th>
							<th><div align=center>DETALLE</div></th>
							<th><div align=center>INSCRIBIRSE</div></th>
						</tr>
					</thead>
					<tbody>
						@foreach($talleres as $taller)
							<tr>
								<td>{{$taller->nombre}}</td>
								<td>{{$taller->profesor}}</td>
								<td>{{date("d-m-Y",strtotime($taller->inicio_incripcion))}}</td>
								<td>{{date("d-m-Y",strtotime($taller->fecha_fin))}}</td>
								<td>{{$taller->vacantes}}</td>								
								<td>
						    		@if(count($talleres_user->where('id',$taller->id))!=0)
						    			Inscrito
						    		@elseif($taller->vacantes <= 0)
						    			No hay vancantes
						    		@else
						    			Disponible
						    		@endif
						    	</td>
								<td>{{$taller->precio_base}} Nuevos Soles</td>
								<td> 
									<a class="btn btn-info" href="{{url('/talleres/'.$taller->id.'/show')}}"  title="Detalle"><i class="glyphicon glyphicon-list-alt"></i></a>

								</td>
								<td>
									@if((count($talleres_user->where('id',$taller->id))!=0)||($taller->vacantes<=0))
						    			<a class="btn btn-info" title="Inscribirse" disabled><i class="glyphicon glyphicon-pencil"></i></a>
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
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}
	
	<!-- DataTable -->
	{!!Html::script('js/jquery.dataTables.js')!!}
	<script>
		$(document).ready(function() {
		   $('#talleresTable').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});
  		});
		
	</script>

</body>
</html>