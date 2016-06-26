@foreach($servicios as $serv)
{{$serv->id}}
@endforeach

<!DOCTYPE html>
<html>
<head>
	<title>Agegar Servicios</title>
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
				<p class="lead"><strong>Servicios Disponibles para agregar </strong></p>
				<br/>
			</div>
			
		</div>
		</br>
		</br>
		<!-- Mensaje de éxito luego de registrar -->
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="/#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
	<form method="POST" action="/reservar-ambiente/7/agregarServicios/store" class="form-horizontal form-border">
			@if ($errors->any())
			  				<ul class="alert alert-danger fade in">
			  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  					@foreach ($errors->all() as $error)
			  						<li>{{$error}}</li>
			  					@endforeach
			  				</ul>
			  			@endif	
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</br>	

			<div class="table-responsive">
			
			<table class="table table-bordered table-hover text-center display" id="example">
					<thead class="active">
						<tr>
							<th><div align=center>NOMBRE</div></th>	
							<th><div align=center>DESCRIPCIÓN</div></th>	
							<th><div align=center>TIPO DE SERVICIO</div></th>	
							<th><div align=center>SELECCIONAR</div></th>
							
						</tr>
					</thead>
					<tbody>
							@foreach($servicios as $servicio)	
										@if ($servicio->estado == 1)
										<tr>							
											<td>{{$servicio->nombre}}</td>
											<td>{{$servicio->descripcion}}</td>
											<td>
	 											@foreach($tiposServicio as $tserv)	
	 												@if ($tserv->id == $servicio->tipo_servicio)
	 													{{$tserv->valor	}}
	 												@endif
	 											@endforeach
	 										</td>	
											<td>{{ Form::checkbox('Seleccionar[]', $servicio->id, false) }}</td>	
														
										</tr>
										@endif
								 @endforeach
					</tbody>					
												
					
			</table>
			
			</div>
			<div class="btn-inline">
				<div class="btn-group col-sm-7"></div>
			
				<div class="btn-group ">
	  					<input class="btn btn-primary" type="submit" value="Confirmar">
				</div>
				<div class="btn-group">
						 <a  class="btn btn-info"  title="Cancelar" data-href="" data-toggle="modal" data-target="#modalEliminar">Cancelar</a>   
				</div>
				</div>
				<br><br>										
	</form>		
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
