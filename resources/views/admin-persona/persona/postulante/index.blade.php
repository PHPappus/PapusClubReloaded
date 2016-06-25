<!DOCTYPE html>
<html>
<head>
	<title>POSTULANTE</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 

</head>
<body>
@extends('layouts.headerandfooter-al-admin-persona')

@section('content')
	
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>POSTULANTE</strong></p>
				</div>
			</div>	
		</div>

			<!-- Mensaje de éxito luego de registrar -->
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{session('stored')}}
			</div>
		@endif

		<div class="container">
			<table class="table table-bordered table-hover text-center display" id="example">
					<thead class="active">
						<tr>
							<th><DIV ALIGN=center>DOC IDENTIDAD</th>
							<th><DIV ALIGN=center>NOMBRE</th>
							<th><DIV ALIGN=center>APELLIDO PATERNO</th>
							<th><DIV ALIGN=center>APELLIDO MATERNO</th>
							<th><DIV ALIGN=center>NACIONALIDAD</th>
							<th><DIV ALIGN=center>DETALLE</th>
							<th><DIV ALIGN=center>EDITAR</th>
							<th><DIV ALIGN=center>ELIMINAR</th>
							<th><DIV ALIGN=center>ACEPTAR MIEMBRO</th>
							
						</tr>
					</thead>
					<tbody>
							@foreach($postulantes as $postulante)						
						    	<tr>
						    		@if($postulante->persona->nacionalidad =="peruano")
						    			<td>{{ $postulante->persona->doc_identidad }}</td>
						    		
						    		@else
						    			<td>{{ $postulante->persona->carnet_extranjeria }}</td>
						    		@endif
									<td>{{ $postulante->persona->nombre }}</td>
									<td>{{ $postulante->persona->ap_paterno }}</td>
			 						<td>{{ $postulante->persona->ap_materno }}</td>
			 						<td>{{ $postulante->persona->nacionalidad }}</td>
									<td>
							        <a class="btn btn-info" href="{{url('/postulante/'.$postulante->id_postulante.'/show')}}"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
							        </td>
									<td>
							        <a class="btn btn-info" href="{{url('/postulante/'.$postulante->id_postulante.'')}}" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
							        </td>
							        <td>
							        <a class="btn btn-info"  title="Eliminar" data-href="{{url('/postulante/'.$postulante->id_postulante.'/delete')}}" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a> 
							        </td>
							        <td>
							        <a class="btn btn-info" href="{{url('/postulante/'.$postulante->id_postulante.'/newSocio')}}" title="Aceptar"><i class="glyphicon glyphicon-ok"></i></a> 
							        </td>
							            
								</tr>
							@endforeach
					</tbody>					
												
					
			</table>		
			</br>
				</br>
				</br>
				</br>
				
				<div class="btn-inline">
					<!-- <form method="POST" action="/sedes/new/sede" >
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

					<div class="btn-group col-sm-10"></div>
					
					<div class="btn-group ">
						<a href="{{url('/postulante/new')}}" class="btn btn-info" type="submit">Registrar Postulante</a>

					</div>
					
				</div>





			<!-- <div><a class="btn btn-primary" href="{{url('/trabajador/search')}}">Consultar</a> <a class="btn btn-primary" href="{{url('/trabajador/new')}}">Registrar</a></div>
			@yield('content-opcion') -->
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

	{!!Html::script('js/bootstrap-datepicker.js')!!}

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
	        <p>¿Está seguro que desea eliminar al Trabajador?</p>
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