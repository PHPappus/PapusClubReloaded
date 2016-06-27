<!DOCTYPE html>
<html>
<head>
	<title>Actividades Papus Club</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	
	<!-- DataTable -->
	{!!Html::style('css/jquery.dataTables.css')!!}
	
</head>

<body>
@extends('layouts.headerandfooter-al-socio')
@section('content')
	
	<div class="content" style="max-width: 100%;">
		<div class="container">
			@include('alerts.errors')
			@include('alerts.success')
		</div>
		<div class="container">
			<div class="row" style="max-width: 920px">
				<div class="col-sm-3">
					<ol class="breadcrumb" style="background:none">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li class="active">Mis inscripciones</li>
					</ol>
				</div>				
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong>M I S &nbsp;&nbsp; I N S C R I P C I O N E S</strong></p>
				</div>
			</div>
		</div>
		<br/>
		<div class="table-responsive">
			<div class="container">
				<table id="talleresTable" class="table table-bordered table-hover text-center display">
					<thead class="active">
						<tr class="active">
							<th><DIV ALIGN=center>Sede</th>
							<th><DIV ALIGN=center>Lugar</th>
							<th><DIV ALIGN=center>Nombre de actividad</th>
							<th><DIV ALIGN=center>Precio</th>
							<th><DIV ALIGN=center>Fecha de inicio</th>
							<!-- <th><DIV ALIGN=center>Fecha y hora de inscripción</th> -->
							<th><DIV ALIGN=center>Anular</th>
						</tr>
					</thead>
					<tbody>
						@foreach($actividades as $actividad)
						<tr>
							<td>{{ $actividad->ambiente->sede->nombre }}</td>
				    		<td>{{ $actividad->ambiente->nombre }}</td>
							<td>{{ $actividad->nombre }}</td>
	 						<td>S/.{{ $actividad->precio($tipo_persona, $actividad->tarifas) }}</td>
	 						<td>{{ $actividad->a_realizarse_en}}</td>
	 						<!-- <td>{{ $actividad->created_at}}</td> -->
	 						
							<td>
								@if($actividad->a_realizarse_en >= $fecha_validable)
								     <a class="btn btn-danger" data-href="{{url('/inscripcion-actividad/'.$actividad->id.'/delete')}}" title="Anular Inscripción" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>
								@else
									 <a class="btn btn-info"  title="El periodo de anulación ya ha caducado" disabled><i class="glyphicon glyphicon-ban-circle"></i></a>
								@endif
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>	
		</div>
		<br/><br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong>I N S C R I P C I O N E S &nbsp;&nbsp; D E &nbsp;&nbsp; M I S &nbsp;&nbsp; F A M I L I A R E S</strong></p>
				</div>
			</div>
		</div>
		<br/>
		<div class="table-responsive">
			<div class="container">
				<table id="talleresTable2" class="table table-bordered table-hover text-center display">
					<thead class="active">
						<tr class="active">
							<th><DIV ALIGN=center>Nombre de familiar</th>
							<th><DIV ALIGN=center>Sede</th>
							<th><DIV ALIGN=center>Lugar</th>
							<th><DIV ALIGN=center>Nombre de actividad</th>
							<th><DIV ALIGN=center>Precio</th>
							<th><DIV ALIGN=center>Fecha de inicio</th>
							<!-- <th><DIV ALIGN=center>Fecha y hora de inscripción</th> -->
							<th><DIV ALIGN=center>Anular</th>
						</tr>
					</thead>
					<tbody>
						@foreach($familiares as $familiar)
							@foreach($familiar->actividades as $actividad_familiar)
							<tr>
								<td>{{ $familiar->nombre }}</td>
								<td>{{ $actividad_familiar->ambiente->sede->nombre }}</td>
					    		<td>{{ $actividad_familiar->ambiente->nombre }}</td>
								<td>{{ $actividad_familiar->nombre }}</td>
		 						<td>S/.{{ $actividad_familiar->precio($familiar->tipopersona->id, $actividad_familiar->tarifas) }}</td>
		 						<td>{{ $actividad_familiar->a_realizarse_en}}</td>
		 						<!-- <td>{{ $actividad_familiar->created_at}}</td> -->
								<td>
									<a class="btn btn-danger" data-href="{{url('/inscripcion-actividad-familiar/'.$actividad_familiar->id.'/'.$familiar->id.'/delete')}}" title="Anular Inscripción" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>
								</td>
							</tr>
							@endforeach
						@endforeach
					</tbody>
				</table>
			</div>	
		</div>


		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<a href="{{url('/inscripcion-actividad/inscripcion-actividades')}}" class="btn btn-lg btn-primary" >Regresar</a>		
				</div>
			</div>
		</div>	
	</div>
@stop
	<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- DataTable -->
	{!!Html::script('js/jquery.dataTables.js')!!}

	<script>
		$(document).ready(function() {
		   $('#talleresTable').DataTable( {
		       "language": {
		           "url": "{!!URL::to('/locales/Spanish.json')!!}"
		       }
		  	});
  		});
  		$(document).ready(function() {
		   $('#talleresTable2').DataTable( {
		       "language": {
		           "url": "{!!URL::to('/locales/Spanish.json')!!}"
		       }
		  	});
  		});
	</script>


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
	        <p>¿Está seguro que desea anular la inscripción?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	
	<script>
		$('#modalEliminar').on('show.bs.modal', function(e) {
   			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>
</body>
</html>