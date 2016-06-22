<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR SOLICITUD</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	{!!Html::style('/css/DataTable.css')!!}	
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
					<strong>REGISTRAR SOLICITUD</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/venta-producto/new/venta-producto" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<div class="col-sm-4"></div>
				<div class="">
			  		
		  			@if ($errors->any())
		  				<ul class="alert alert-danger fade in">
		  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  					@foreach ($errors->all() as $error)
		  						<li>{{$error}}</li>
		  					@endforeach
		  				</ul>
		  			@endif
			  		
				</div>

				<br/>
				<br/>
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
			  	</br>
			  	</br>								

				<div class="form-group required">
			    	<label for="persona_id" class="col-sm-4 control-label">ID Persona</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="persona_id" name="persona_id" placeholder="ID de la Persona" value="{{old('persona_id')}}">
			    	</div>
			    	<a class="btn btn-info" name="buscarPersona" href="#"  title="Buscar Persona" data-toggle="modal" data-target="#modalBuscar"><i name="buscarPersona" class="glyphicon glyphicon-search"></i></a>
			  	</div>			  	

			  	<div class="form-group required">
			    	<label for="tipoPagoInput" class="col-sm-4 control-label">Tipo de Pago</label>
			    	<div class="col-sm-5">
			    	
			      		<select class="form-control" id="tipo_pago" name="tipo_pago" >
						<option value="" selected >Seleccionar tipo...</option>
						@foreach($tipo_pagos as $tipo_pago)							
							<option value="{{$tipo_pago->valor}}" >{{$tipo_pago->valor}}</option>
						@endforeach						
						</select>						
						
			    	</div>
			  	</div>		

			  	<div class="form-group required">
			    	<label for="tipoComprobanteInput" class="col-sm-4 control-label">Tipo de Comprobante</label>
			    	<div class="col-sm-5">
			    	
			      		<select class="form-control" id="tipo_comprobante" name="tipo_comprobante">
						<option value="" selected >Seleccionar tipo...</option>
						@foreach($tipo_comprobantes as $tipo_comprobante)
							<option value="{{$tipo_comprobante->valor}}" >{{$tipo_comprobante->valor}}</option>
						@endforeach						
						</select>						
						
			    	</div>
			  	</div>		
						
			  	<div class="form-group required">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">			    	
			      		<select class="form-control" id="estado" name="estado" >
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value="" selected>Seleccionar tipo...</option>
						@foreach($estados as $estado)
							@if ($estado['valor'] != 'Anulado')
								<option value="{{$estado->valor}}">{{$estado->valor}}</option>
							@endif
						@endforeach						
						</select>													
						
			    	</div>
			  	</div>		

			  	</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/venta-producto/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>

			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
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
							}
	</script>

<!-- Modal -->
	<div id="modalBuscar" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->	    
	    <div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BUSCAR PERSONA</h4>
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
									
									@foreach($personas as $persona)						
										<tr>											
											<td>{{$persona->doc_identidad}}</td>
											<td>{{$persona->nombre}}</td>		
											<td>{{$persona->ap_paterno}}</td>
											<td>{{$persona->ap_materno}}</td>
											<td>
												<div class="radio">
  													<label><input type="radio" name="optradio" value="{{$persona->id}}"></label>
												</div>
											</td>
							            </tr>				            		
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
<!--
	<a id="{{$persona->id}}" href="#" class="btn btn-default"><i class="glyphicon glyphicon-unchecked"></i></a>
						<script>
							$('#{{$persona->id}}').click(function(){
							    $(this).find('i').toggleClass('glyphicon-unchecked').toggleClass('glyphicon-check');
							});
						</script>
-->
</html>