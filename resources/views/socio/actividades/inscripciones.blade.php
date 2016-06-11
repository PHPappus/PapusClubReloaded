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
					<ol class="breadcrumb">
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
		<br/><br/>
		
			<div class="table-responsive">
				<div class="container">
					<table id="talleresTable" class="table table-bordered table-hover text-center display">
						<thead class="active">
							<tr class="active">
								<th><DIV ALIGN=center>SEDE</th>
								<th><DIV ALIGN=center>AMBIENTE</th>
								<th><DIV ALIGN=center>NOMBRE</th>
								<th><DIV ALIGN=center>CAPACIDAD</th>
								<th><DIV ALIGN=center>FECHA Y HORA</th>
								<th><DIV ALIGN=center>Anular</th>
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
									<a class="btn btn-info" data-href="{{url('/inscripcion-actividad/'.$actividad->id.'/delete')}}" title="Anular Inscripción" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>	
			</div>

			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<a href="{{url('/socio')}}" class="btn btn-lg btn-primary" >Regresar</a>		
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
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
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