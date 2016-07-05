<!DOCTYPE html>
<html>
<head>
	<title>AMBIENTE</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-admin-reserva')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>RESERVAS DE BUNGALOWS</strong></p>
				<br/>
			</div>
			
		</div>
		</br>
		</br>
		<!-- Mensaje de éxito luego de registrar -->
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{session('stored')}}
			</div>
		@endif

		@if (session('delete'))
			<script>$("#modalError").modal("show");</script>						
		@endif

		
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
						<tr>

							
							
							
							
							
							
							

							<th><DIV ALIGN=center>CARNET</th>
							<th><DIV ALIGN=center>SOCIO</th>
							<th><DIV ALIGN=center>AMBIENTE</th>
							<th><DIV ALIGN=center>FECHA INICIO</th>
							<th><DIV ALIGN=center>FECHA FIN</th>
							<th><DIV ALIGN=center>PRECIO (S/.)</th>
							<th><DIV ALIGN=center>ESTADO RESERVA</th>
							<th><DIV ALIGN=center>VER SERVICIOS</th>
							<th><DIV ALIGN=center>AGREGAR SERVICIOS</th>

							<th><DIV ALIGN=center>CANCELAR</th>

							
						</tr>
					</thead>
					<tbody>
							@foreach($reservas as $reserva)						
						    	@if($reserva->ambiente->tipo_ambiente == 'Bungalow')						
							    	<tr>
							    		<td>{{ $reserva->persona->socio($socios)->carnet_actual()->nro_carnet }}</td>
										<td>{{ $reserva->persona->nombre . " " . $reserva->persona->ap_paterno . " " . $reserva->persona->ap_materno }}</td>
										<td>{{ $reserva->ambiente->nombre }}</td>
										<td>{{ $reserva->fecha_inicio_reserva }}</td>
				 						<td>{{ $reserva->fecha_fin_reserva }}</td>
				 						<td>{{ $reserva->facturacion->total}}</td>
				 						<td>{{ $reserva->estadoReserva }}</td>
				 						
							
				 						<td>
								        <a class="btn btn-info"  title="Ver Servicio" href="{{url('/reservar-ambiente/'.$reserva->id.'/verServicios')}}" data-toggle="" data-target=""><i class="glyphicon glyphicon-th"></i></a> 
								        </td>

				 						<td>
								        <a class="btn btn-info"  title="Agregar Servicio" href="{{url('/reservar-ambiente/'.$reserva->id.'/agregarServicios')}}" data-toggle="" data-target=""><i class="glyphicon glyphicon-plus"></i></a> 
								        </td>

								        <td>
								        <a class="btn btn-info"  title="Cancelar" data-href="{{url('/reservar-ambiente/'.$reserva->id.'/deleteBungalowAdminR')}}" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a> 
								        </td>
								            
									</tr>
								@endif
							@endforeach
					</tbody>					
												
					
			</table>		
			</br>
				</br>
				</br>
				</br>
				

			
		</div>
	</div>
</br></br></br></br></br>
		


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
	        <p>¿Está seguro que desea cancelar la reserva?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal Event-->
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

	<div id="modalError" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">¡Error!</h4>
	      </div>
	      <div class="modal-body">
	        <p>{{session('delete')}}</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>           
	      </div>
	    </div>

	  </div>
	</div>


</html>
