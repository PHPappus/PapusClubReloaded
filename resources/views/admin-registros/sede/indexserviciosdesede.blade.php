	<!--p>@foreach($serviciosdesede as $sdesede)
		{{$sdesede->idsede}}
		{{$sdesede->idservicio}}
		<br/>
	@endforeach
	</p-->
<!DOCTYPE html>
<html>
<head>
	<title>SERVICIOS A LA SEDE 
	 </title>	
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}	
	
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin-registros')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		
		

		<div class="container">
			@if ($mensaje)
					<script>$("#modalSuccess").modal("show");</script>
			
					<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong> {{$mensaje}} </strong> 
					</div>
			@endif
			<div class="col-sm-12 text-left lead">
					<strong>SERVICIOS ADICIONALES DE LA SEDE
					<?php 
					  echo strtoupper($sede->nombre)
					 ?>
					 
					</strong>
			</div>		
			<div></div>
		</div>
		
			<form method="POST" action="agregarservicios/store" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
					
				<div class="table-responsive">
					<div class="container">
						<table class="table table-bordered table-hover text-center display" id=	"example">
							<thead class="active" data-sortable="true">								
								<th><div align=center>NOMBRE</div></th>	
								<th><div align=center>DESCRIPCIÓN</div></th>	
								<th><div align=center>TIPO DE SERVICIO</div></th>	
								
							</thead>	
							<tbody>										@foreach($serviciosdesede as $sdesede)
									@foreach($servicios as $serv)
										@if($serv->id == $sdesede->idservicio)
										<tr>

											<td>{{$serv->nombre}}</td>
											<td>{{$serv->descripcion}}</td>
											<td>
											@foreach($tiposservicio as $tserv)	
	 												@if ($tserv->id == $serv->tipo_servicio)
	 													{{$tserv->valor	}}
	 												@endif
	 											@endforeach
											</td>
										</tr>
											
										@endif
									@endforeach
								@endforeach			
							</tbody>			
						</table>						
					</div>	
				</div>
				<br><br>
				<div class="btn-inline">
					<div class="btn-group col-sm-9"></div>							
					<div class="btn-group">
						 <a class="btn btn-info"  href="{{url('/sedes/'.$sede->id.'/agregarservicios')}}" 
						 title="Agregar Servicios" data-href="" data-toggle="" >Agregar Servicios</a>   
					</div>
					<br/>
					<br/>
				</div>
				<br><br>

				
			</form>
		</div>
	</div>		
@stop
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
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
</body>
<!-- Modal -->
   <div id="modalSuccess" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">¡Éxito!</h4>
	      </div>
	      <div class="modal-body">
	        <p> {{$mensaje}} </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>           
	      </div>
	    </div>

	  </div>
	</div>


	<div id="modalEliminar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Confirmar</h4>
	      </div>
	      <div class="modal-body">
	        <p>¿Está seguro que desea cancelar la creación del sorteo?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal Event-->
	<script>
		$('#modalEliminar').on('show.bs.modal', function(e) {
   			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>

	<!-- Modal Success -->
</html>