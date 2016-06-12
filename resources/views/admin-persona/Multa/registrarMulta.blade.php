<!DOCTYPE html>
<html>
<head>
	<title>ASIGNAR MULTA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-socio')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>ASIGNAR MULTA</strong></p>
				<br/>
			</div>
			
		</div>
	</div>
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{session('stored')}}
			</div>
		@endif
		@if (session('eliminated'))			
			<div class="alert alert-warning fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Aviso</strong> {{session('eliminated')}}
			</div>
		@endif

		</br>
		</br>

		<div class="table-responsive">
			<div class="container">
				<table class="table table-bordered table-hover text-center display" id="example">
						<thead class="active">
							<th><div align=center>CARNET</div> </th>
							<th><div align=center>APELLIDO PATERNO</div></th>
							<th><div align=center>APELLIDO MATERNO</div></th>
							<th><div align=center>NOMBRES</div></th>
							<th><div align=center>SELECCIONAR</div></th>
						</thead>
						<tbody>
							@foreach($socios as $socio)
								@if(strcmp($socio->estado(), $socio->vigente() )==0)						
									<tr>
										<td>{{$socio->carnet_actual()->nro_carnet}}</td>
										<td>{{$socio->postulante->persona->ap_paterno}}</td>
										<td>{{$socio->postulante->persona->ap_materno}}</td>
										<td>{{$socio->postulante->persona->nombre}}</td>
										<td>{{ Form::checkbox('ch[]', $socio->id, false) }}</td>
						            </tr>
					            @endif				            		
							@endforeach
						</tbody>
				</table>
				</br></br></br>

				<div class="form-group">
			    	<label for="tipoMultaInput" class="col-sm-4 control-label">Tipo Multa</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" id="tipoMultaInput" name="tipoMulta" style="max-width: 150px " onchange="mostrar_precio()" >
				    				<option value="-1" default>Seleccione</option>
							        	@foreach ($multas as $multa)      
							        <option value="{{$multa->id}}">{{$multa->nombre}}</option>
							            @endforeach
						</select>
					</div>
			  	</div>

			  	<div class="form-group">
					<div class="col-sm-6">
						<div class="col-sm-6 text-left">
							<label for="" class="control-label">Tipo Membresía:</label>
						</div>
					<div class="col-sm-6">
					<select class="form-control" id="estado_select" name="estado" onchange="mostrar_precio()">
				   		@foreach ($membresias as $membresia)
				   			<option value={{$membresia->id}}
				   			@if($socio->membresia->id==$membresia->id) selected @endif>{{$membresia->descripcion}}</option>
				   		@endforeach												
					</select>											
					</div>	
					</div>
				</div>

			  	<br></br>
			  	<div class="form-group">
			    	<label for="montoMultaInput" class="col-sm-4 control-label">Monto Multa</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'DoubleFormat')" @if ("tipoMulta" != "Seleccione") value = "{{$multa->montoPenalidad}}" @endif class="form-control" id="montoMultaInput" style="max-width: 150px" name="montoMulta">
			    	</div>
			  	</div>

			  	<br></br>
			  	<br></br>
				<div class="btn-inline">
					<!-- <form method="POST" action="/sedes/new/sede" >
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

					<div class="btn-group col-sm-5"></div>
					
					<div class="btn-group ">
						<a href="{{url('/multas-s/registrar')}}" class="btn btn-info" type="submit">Registrar Multa</a>

					</div>
					
				</div>								
			</div>		
		</div>



	
		</br></br></br></br></br>
		


@stop
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<!-- {!!Html::script('js/jquery.dataTables.min.js')!!} -->

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
	        <p>¿Está seguro que desea eliminar a este Socio?</p>
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
</body>
</html>