<!DOCTYPE html>
<html>
<head>
	<title>ACTIVIDAD</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	
	
</head>
<body>
@extends('layouts.headerandfooter-al-socio')
@section('content')

<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<div class="container">
			<div class="row" style="max-width: 1020px">
				<div class="col-sm-5">
					<ol class="breadcrumb" style="background:none">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li><a href="/inscripcion-actividad/inscripcion-actividades">Consultar Actividades</a></li>
						<li class="active">Confirmación de inscripción</li>
					</ol>
				</div>				
			</div>
		</div>
		<!-- Utilizando Bootstrap -->
		<div class="container">
			@include('alerts.errors')
			@include('alerts.success')

		</div>
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>CONFIRMACION DE INSCRIPCIÓN</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->	
			<form method="POST" action="/inscripcion-actividad/{{ $actividad->id }}/confirmacion-inscripcion-actividades-to-familiar/confirm" class="form-horizontal form-border"><!-- accion que regresa a la incial de inscripciones -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

		  	<div class="form-group">
		    	<label for="ambienteInput" class="col-sm-4 control-label">AMBIENTE:</label>
		    	<div class="col-sm-5">
		    		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="{{$actividad->ambiente->nombre}}"  required readonly>
		      	</div>		      	
		  	</div>

		  	<div class="form-group">
		    	<label for="tipoambienteInput" class="col-sm-4 control-label">TIPO DE AMBIENTE:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="tipoambienteInput" name="tipoambiente" value="{{$actividad->ambiente->tipo_ambiente}}"  required readonly>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="sedeInput" class="col-sm-4 control-label">SEDE:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="sedeInput" name="sede" value="{{$actividad->ambiente->sede->nombre}}"  required readonly>
		    	</div>
		  	</div>
			<div class="form-group">
		    	<label for="nombreInput" class="col-sm-4 control-label">NOMBRE DE LA ACTIVIDAD:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$actividad->nombre}}" readonly>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="descripcionInput" class="col-sm-4 control-label">DESCRIPCIÓN:</label>
		    	<div class="col-sm-5">
		      		<textarea type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder ="{{$actividad->descripcion}}" readonly style="max-width:456px"></textarea>
		    	</div> 
		  	</div>
		  	<div class="form-group">
		    	<label for="tipoActividadInput" class="col-sm-4 control-label">TIPO DE ACTIVIDAD:</label>	
		    	<div class="col-sm-5">
			    	<input type="text" class="form-control" id="tipoActividadInput" name="tipo_actividad" value="{{$actividad->tipo_actividad}}" readonly >
				</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="capacidadInput" class="col-sm-4 control-label">CAPACIDAD MAXIMA:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$actividad->capacidad_maxima}}" readonly>
		    	</div>
		  	</div>	
		  	<div class="form-group">
		    	<label for="vacantesInput" class="col-sm-4 control-label">VACANTES DISPONIBLES:</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="vacantesInput" name="vacantes" value="{{$actividad->cupos_disponibles}}" readonly>
		      		<!-- <label for="vacantesInput" class=" control-label">{{$actividad->cupos_disponibles}}</label> -->
		    	</div>
		  	</div>
		  	<div class="form-group">
			 	<label for="fechaInput" class="col-sm-4 control-label">FECHA (dd/mm/aaaa): </label>
			    <div class="col-sm-5">
				  	<div class="input-group">
			   		<input type="text" class="form-control" id="dpd1" name="fecha_inicio" placeholder="Fecha Inicio" value="{{$actividad->a_realizarse_en}}" style="max-width: 180px" readonly>
			   	 	</div>
		    	</div>	
			</div> 
			<div class="form-group required">
				<label for="persona_id" class="control-label col-sm-4"><strong>FAMILIAR:</strong></label>
				<div class="col-sm-5">	
						<input type="text" id="name" name="name" class="form-control" placeholder="Nombre del familiar" readonly="true" value="{{old('name')}}">
				</div>
				<a class="btn btn-info" name="buscarPersona" href="#"  title="Buscar Persona" data-toggle="modal" data-target="#modalBuscar"><i name="buscarPersona" class="glyphicon glyphicon-search"></i></a>
				<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="persona_id" name="persona_id" placeholder="ID de la Persona" value="{{old('persona_id')}}" style="display:none">
			</div>
			<div class="form-group required">
			   	<label for="tipoComprobanteInput" class="col-sm-4 control-label">TIPO DE COMPROBANTE</label>
			   	<div class="col-sm-5">
			    	<select class="form-control" id="tipo_comprobante" name="tipo_comprobante">
						<option value="-1" selected >Seleccionar tipo...</option>
						@foreach($tipo_comprobantes as $tipo_comprobante)
						<option value="{{$tipo_comprobante->valor}}" >{{$tipo_comprobante->valor}}</option>
						@endforeach						
					</select>						
			    </div>
			</div>	
			<br/><br/>
			<div class="form-group required">
	 			<div class="col-sm-12">
			    	<label for="password" class="col-sm-5 control-label">Ingrese su contraseña</label>
		    		<div class="col-sm-7 text-center">
		    			<input type="password" name="password" class="form-control" id="contraseña" style="max-width: 220px">
		    			
		    		</div>	
		    		<div class="col-sm-offset-5 col-sm-7">
		    			<div class="text-danger">{!!$errors->first('password')!!}</div>
		    		</div>	  				
	 			</div>
			</div>
								
			<br/><br/>
			<div class="form-group">
				<div class="col-sm-12">
					<div class="col-sm-6 text-right">
						<button type="submit" class="btn btn-primary">Confirmar</button>
					</div>
					<div class="col-sm-6 text-left">
						<a href="/inscripcion-actividad/inscripcion-actividades" class="btn btn-info">Cancelar</a> <!-- Regresa a la pantalla de consulta de actividades -->
					</div>			
				</div>
			</div>
			
			<br><br>
			
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
	<!-- Data Table -->
	{!!Html::script('js/jquery.dataTables.js')!!}
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
			document.getElementById('persona_id').value =  $('#example input:radio:checked').val();
			document.getElementById('name').value =  $('#example input:radio:checked').attr("alt");
		}
	</script>
	<!-- Modal -->
	<div id="modalBuscar" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->	    
	    <div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Seleccione a su familiar</h4>
			</div>

			<div class="modal-body">	      	  
				<div class="container">					
					<div class="table-responsive">
						<div class="container" id="TableContainer">
							<div class="text-left">
					  			<font color="black"> 
					  				Ingresar alguno de los siguientes campos:
					  				<ul>
					  				<li>DNI</li>
					  				<li>Apellido Paterno</li>
					  				<li>Apellido Materno</li>
					  				<li>Nombre</li>
					  				<li>Tipo de persona</li>
					  				</ul>
					  			</font>					  			
					  		</div>
					  		<br>
							<table class="table table-bordered table-hover text-center display" id="example" width="100%">
								<thead class="active" data-sortable="true">									
									<th><div align=center>DNI</div> </th>
									<th><div align=center>NOMBRES</div></th>
									<th><div align=center>APELLIDO PATERNO</div></th>
									<th><div align=center>APELLIDO MATERNO</div></th>
									<th><div align=center>PARENTEZCO</div></th>
									<th><div align=center>SELECCIONAR</div></th>
								</thead>
								<tbody>
								@if(count($familiares)>0)
									@foreach($familiares as $persona)						
										<tr>											
											<td>{{$persona->doc_identidad}}</td>
											<td>{{$persona->nombre}}</td>		
											<td>{{$persona->ap_paterno}}</td>
											<td>{{$persona->ap_materno}}</td>
											<td>Familiar</td>
											<td>
												<div class="radio">
  													<label><input type="radio" name="optradio" alt="{{$persona->nombre}} {{$persona->ap_paterno}}" value="{{$persona->id}}"></label>
												</div>
											</td>
							            </tr>				            		
									@endforeach
								@endif
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