
<!DOCTYPE html>
<html>
<head>
	<title>Inscripción en Taller</title>
	<meta charset="UTF-8">

	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	
</head>

<body>
@extends('layouts.headerandfooter-al-socio')
@section('content')

	<div class="content" style="max-width: 100%;">
		<div class="container">
			<div class="row" style="max-width: 920px">
				<div class="col-sm-4">
					<ol class="breadcrumb">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li><a href="/servicioalsocio/index">Consultar Servicio</a></li>
						<li class="active">Inscripción</li>
					</ol>
				</div>				
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong> 
						
						@foreach($servicindentificado as $sff)
						{{$sff->nombre}}
						@endforeach 
					 </strong></p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					


					@if (count($errors) > 0)

						<div class="alert alert-danger" role="alert">
							<strong>Errores:</strong>
							<ul>
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach  
							</ul>
						</div>

					@endif
					<!-- @if ($errors->any())
						<ul class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							@foreach ($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					@endif -->
				</div>
			</div>	
		</div>
		<div class="container">		

			<form method="POST" action="/servicioalsocio/{{$id}}/confirm/save" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>
				<div class="form-group">
					<div class="col-sm-7">
							<label for="description" class="col-sm-4 control-label">Descripción:</label>
							<div class="col-sm-7">
								<textarea class="form-control" name="descripcion" id="descriptionInput" rows="6" cols="10" readonly="true"> 
								@foreach($servicindentificado as $sff)
								{{$sff->descripcion}}
								@endforeach 
								</textarea>								
							</div>				
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
				    	<label for="profesorInput" class="col-sm-5 control-label">Tipo Servicio</label>
			    		<div class="col-sm-7 text-center">

			    			<input type="text" class="form-control" id="profesor" placeholder="{{$tip_s}}" 
							style="max-width: 220px" readonly="true"> 			
			    		</div>		  				
		 			</div>
				</div>
		  		<div class="form-group">
		  			<div class="col-sm-6">
				    	<label for="nombreInput" class="col-sm-5 control-label">Estado</label>
			    		<div class="col-sm-7">
			      			<input type="text" class="form-control" id="fecha_inicio" placeholder='ACTIVO' style="max-width: 220px" readonly="true">

			    		</div>			
		  			</div>
		  		</div>
				
				
				<div class="form-group">
		 			<div class="col-sm-6">
				    	<label for="precio" class="col-sm-5 control-label">Precio:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="text" class="form-control" name="precio" id="precio" 
							  placeholder="{{$precio}}"
			    			 style="max-width: 220px" readonly="true">
			    		</div>		  				
		 			</div>
				</div>

				<div class="form-group">
		 			<div class="col-sm-6">
				    	<label for="sede" class="col-sm-5 control-label">Sede:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="text" class="form-control" name="sede" id="sede" 
							  placeholder="{{$sedeindentificado->nombre}}"
			    			 style="max-width: 220px" readonly="true">
			    		</div>		  				
		 			</div>
				</div>

				
				<div class="form-group required">
		 			<div class="col-sm-6">
				    	<label for="codreserva" class="col-sm-5 control-label">Código de Reserva:</label>
			    		<div class="col-sm-6 text-center">
			    			<input type="numeric" class="form-control" name="codreserva" id="codreserva" 
							  placeholder="N Reserva"
			    			 style="max-width: 220px" readonly="true">
			    		</div>
			    		     <a class="btn btn-info" name="buscarReserva" href="#" title="agregarservicio" data-toggle="modal" data-target="#modalBuscar" ><i class="glyphicon glyphicon-search"></i> </a>		  				
		 			</div>
				</div>
		

				<br/><br/>
				<div class="form-group">
		 			<div class="col-sm-12">
				    	<label for="password" class="col-sm-5 control-label">Ingrese su contraseña:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="password" name="password" class="form-control" id="contraseña" style="max-width: 220px">			    			        
							</td> 
			    		</div>		  				
		 			</div>
				</div>
									
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-12">
						<div class="col-sm-6 text-right">
							<button type="submit" class="btn btn-primary">Solicitar</button>						
						</div>
						<div class="col-sm-6 text-left">						
							<a href="{{url('/servicioalsocio/index')}}" class="btn btn-primary" >Regresar</a>		
						</div>
					</div>			
				</div>
			</form>
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
	<script>		
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       },		       
		       "dom": '<"pull-left"f><"pull-right"l>tip',
		       "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
		  	});
  		});		
  		
		function getPersona(){								
								document.getElementById('codreserva').value =  $('#example input:radio:checked').val();
			}
	</script>

<!-- Modal -->
	<div id="modalBuscar" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->	    
	    <div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">ASIGNAR RESERVA</h4>
			</div>

			<div class="modal-body">	      	  
				<div class="container">					
					<div class="table-responsive">
						<div class="container" id="TableContainer">
							<div class="text-left">
					  			<font color="black"> 
					  				Escoge una de tus reservas.
					  			</font>					  			
					  		</div>
					  		<br>
							<table class="table table-bordered table-hover text-center display" id="example" width="100%">
								<thead class="active" data-sortable="true">									
									<th><DIV ALIGN=center>ID</th>
									<th><DIV ALIGN=center>Tipo Reserva</th>
									<th><DIV ALIGN=center>Monto</th>
									<th><DIV ALIGN=center>Descripción</th>
									<th><DIV ALIGN=center>Fecha Inicio</th>
									<th><DIV ALIGN=center>Seleccionar</th>
								</thead>

								<tbody>

							

								@foreach($reservas as $reserva)					
									@if ($sedeindentificado->id == $reserva->ambiente->sede_id)
									
										@if ($reserva->ambiente->tipo_ambiente ==$valtipAmbiente->valor)
									
										
						    			<tr>
										<td>{{ $reserva->id }}</td>
										<td>{{ $reserva->ambiente->nombre }}</td>
										<td>{{ $reserva->precio }}</td>
				 						<td>{{ $reserva->estadoReserva }}</td>
										<td>{{ $reserva->fecha_inicio_reserva }}</td>
										<td>
												<div class="radio">
  													<label><input type="radio" name="optradio" value="{{$reserva->id}}"></label>
												</div>
										</td>
										</tr>
										@endif	
									@endif
								@endforeach
								</tbody>
							</table>																		
						</div>								
					</div>		
				</div>
			</div>								
			<div class="modal-footer">	                    
				<div class="btn-inline">
					<div class="btn-group col-sm-4"></div>														
					<div class="btn-group ">
						<input class="btn btn-primary" onclick="getPersona()" data-dismiss="modal" value="Confirmar">					
					</div>
					<div class="btn-group">
						<a  data-dismiss="modal" class="btn btn-info">Cancelar</a>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
	<style type="text/css">
    @media screen and (min-width: 992px) {
        #modalBuscar .modal-lg {
          width: 90%; /* New width for large modal */         
        }                       

		#TableContainer.container {
	        width: 80%;
	    }        
    }
	</style>
</body>
</html>