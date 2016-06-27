
<!DOCTYPE html>
<html>
<head>
	<title>AGREGAR SORTEO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}	
	
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>AGREGAR BUNGALOWS</strong>
			</div>		
			<div></div>
		</div>
		
			<form method="POST" action="/sorteo/new/sorteo/bungalows/{{ $sorteo->id }}/store" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				

					@if ($errors->any())
		  				<ul class="alert alert-danger fade in">
		  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  					@foreach ($errors->all() as $error)
		  						<li>{{$error}}</li>
		  					@endforeach
		  				</ul>
		  			@endif
				<div class="table-responsive">
					<div class="container">
						<table class="table table-bordered table-hover text-center display" id="example">
							<thead class="active" data-sortable="true">								
								<th><div align=center>NOMBRE</div></th>	
								<th><div align=center>CAPACIDAD</div></th>	
								<th><div align=center>UBICACION</div></th>	
								<th><div align=center>SELECCIONAR</div></th>
							</thead>	
							<tbody>													
								@foreach($ambientes as $ambiente)	
									@if($ambiente->nombre!='nada')
										<tr>																				
											<td>{{$ambiente->nombre}}</td>
											<td>{{$ambiente->capacidad_actual}}</td>
											<td>{{$ambiente->ubicacion}}</td>
											<td>{{ Form::checkbox('ch[]', $ambiente->id, false) }}</td>
														
										</tr>
									@endif								
								 @endforeach
								
							</tbody>			
						</table>						
					</div>	
				</div>
				<br><br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Continuar">
					</div>
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