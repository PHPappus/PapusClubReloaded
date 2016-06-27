
<!DOCTYPE html>
<html>
<head>
	<title>Servicios Papus Club Baia Baia</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/bootstrap-datepicker3.css')!!}
	{!!Html::style('css/jquery.dataTables.css')!!}
	<style>
		.table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child> td{
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
					<ol class="breadcrumb" style="background:none;">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li class="active">Solicitar Servicios</li>
					</ol>
				</div>				
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left lead">
				<strong>MIS SERVICIOS SOLICITADOS</strong>
			</div>		
		</div>
		<div class="container">
			@if ($mensaje)
				<script>$("#modalSuccess").modal("show");</script>
		
				<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{$mensaje}}
				</div>
			@endif
	
		</div>
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong>M I S &nbsp;&nbsp; S E R V I C I O S &nbsp;&nbsp; S O L I C I T A D O S  &nbsp;&nbsp;  </strong></p>
				</div>
			</div>
		</div>
		<div class="container">
			@include('alerts.success')
		</div>
		<div class="table-responsive" >
			<div class="container">
				<table id="talleresTable" class="table text-center table-bordered table-hover  display">
					<thead class="active">
						<tr class="active">
							<th><div align=center>NOMBRE</div></th>	
							<th><div align=center>DESCRIPCIÓN</div></th>				
							<th style="max-width:100px;"><div align=center>TIPO DE SERVICIO</div></th>
							
							<th style="max-width:100px;"><div align=center>PRECIO SOCIO S/</div></th>
							
							
							
							<th><div align=center>SEDE</div></th>			
							<th><div align=center>DETALLE</div></th>					
							<th><div align=center>ESTADO SOLICITUD</div></th>					
							<th><div align=center>ELIMINAR SOLICITUD</div></th>					
							
						</tr>
					</thead>
					<tbody>
				
					<?php 
					 for($i=0;$i<$expfila;$i++){
					 	echo "<tr>";
					 	for($j=0;$j<$expcolu-1;$j++){
					 		echo "<td>" ; 
					 		echo $tabla[$i][$j];
					 		echo "</td>";
					 	}
					 	
					 		$indice = $tabla[$i][7];
					 	 ?>
					 	 <td>
						
					 	 	@if($tabla[$i][8])
					 		<a class="btn btn-info" data-href="{!!URL::to('/servicios/mis-inscripciones/'.$indice.'/delete')!!}" title="Anular Solicitud" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove" ></i>
					 		</a>
					 		@else
					 		<a class="btn btn-info"  title="Anular Solicitud" disabled ><i class="glyphicon glyphicon-remove" ></i>
					 		</a>
					 		@endif
					 	</td>
                        <?php 
					 }
					 ?>
							
								
				
					</tbody>
				</table>
			</div>	
		</div>
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-right">					
						<a href="{!!URL::to('/servicios/mis-inscripciones')!!}" title="Ver mis inscripciones" class="btn btn-lg btn-primary">Mis Solicitudes</a>		
					</div>
				<div class="col-sm-6 text-left">
					
					<a href="{{url('/servicioalsocio/index')}}" class="btn btn-lg btn-primary" title="Regresar a página de inicio">Regresar</a>			
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
	<div id="modalEliminar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Confirmar</h4>
	      </div>
	      <div class="modal-body">
	        <p>¿Está seguro que desea eliminar la solicitud?</p>
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