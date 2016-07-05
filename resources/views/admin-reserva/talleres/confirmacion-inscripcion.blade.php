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
@extends('layouts.headerandfooter-al-admin-reserva')
@section('content')

	<div class="content" style="max-width: 100%;">
		<div class="container">
			<div class="row" style="max-width: 920px">
				<div class="col-sm-4">
					<ol class="breadcrumb">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li><a href="/talleres/index">Consultar Talleres</a></li>
						<li class="active">Inscripción</li>
					</ol>
				</div>				
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong>{{$taller->nombre}}</strong></p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="container">
						@if (count($errors) > 0)
							<div class="alert alert-danger" role="alert">
								@if (count($errors) > 1)
								<strong>Error(es):</strong>
								@else
								<strong>Error:</strong>
								@endif
								<ul>
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach  
								</ul>
							</div>
						@endif
					</div>
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
			<form method="POST" action="/taller-admin-reserva/inscripcion/{{ $taller->id }}/confirmacion/confirm" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>
				<div class="form-group">
			    	<label for="ambienteInput" class="col-sm-4 control-label">AMBIENTE:</label>
			    	<div class="col-sm-5">
			    		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="{{$taller->reserva->ambiente->nombre}}"  required readonly>
			      	</div>		      	
			  	</div>
				<div class="form-group">
					<label for="description" class="col-sm-4 control-label">Descripción:</label>
					<div class="col-sm-5">
						<textarea class="form-control" name="descripcion" id="descriptionInput" rows="3" readonly="true">{{$taller->descripcion}}</textarea>
						<!-- <input type="text" class="form-control" id="fecha_inicio" placeholder="{{$taller->fecha_inicio}}" style="max-width: 250px" readonly="true"> -->
					</div>
				</div>
				<div class="form-group">
			    	<label for="profesorInput" class="col-sm-4 control-label">Profesor:</label>
		    		<div class="col-sm-5">
		    			<input type="text" class="form-control" id="profesor" placeholder="{{$taller->profesor}}" required readonly>
		    		</div>		  				
				</div>
		  		<div class="form-group">
			    	<label for="nombreInput" class="col-sm-4 control-label">Fecha de inicio:</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="fecha_inicio" placeholder='{{date("d-m-Y",strtotime($taller->fecha_inicio))}}' readonly="true">
		    		</div>			
		  		</div>
				<div class="form-group">
			    	<label for="nombreInput" class="col-sm-4 control-label">Fecha de fin:</label>
		    		<div class="col-sm-5">
		    			<input type="text" class="form-control" id="fecha_fin" placeholder='{{date("d-m-Y",strtotime($taller->fecha_fin))}}' readonly="true">
		    		</div>
				</div>
				<div class="form-group">
			    	<label for="sesiones" class="col-sm-4 control-label">Cantidad de sesiones:</label>
		    		<div class="col-sm-5">
		    			<input type="text" class="form-control" id="sesiones" placeholder='{{$taller->cantidad_sesiones}}' style="max-width: 120px" readonly="true">
		    		</div>
				</div>
				<div class="form-group">
			    	<label for="vacantes" class="col-sm-4 control-label">Vacantes Disponibles:</label>
		    		<div class="col-sm-5">
		    			<input type="text" class="form-control" id="vacantes" placeholder='{{$taller->vacantes}}' style="max-width: 120px" readonly="true">
		    		</div>
				</div>
				<div class="form-group required">
					<label for="persona_id" class="control-label col-sm-4"><strong>SOCIO:</strong></label>
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
				<div class="form-group">
		 			<div class="col-sm-12">
				    	<label for="password" class="col-sm-5 control-label">Ingrese su contraseña:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="password" name="password" class="form-control" id="contraseña" style="max-width: 220px">
			    		</div>		  				
		 			</div>
				</div>
									
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-12">
						<div class="col-sm-6 text-right">
							<button type="submit" class="btn btn-primary" >Inscribirse</button>		
						</div>
						<div class="col-sm-6 text-left">
							<a href="{{url('/talleres/'.$taller->id.'/show')}}" class="btn btn-primary" >Regresar</a>		
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

	{!!Html::script('js/jquery.dataTables.js')!!}

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
				<h4 class="modal-title">Seleccione al socio</h4>
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
									<th><div align=center>SELECCIONAR</div></th>
								</thead>
								<tbody>
								@if(count($personas)>0)
									@foreach($personas as $persona)						
										<tr>											
											<td>{{$persona->doc_identidad}}</td>
											<td>{{$persona->nombre}}</td>		
											<td>{{$persona->ap_paterno}}</td>
											<td>{{$persona->ap_materno}}</td>
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