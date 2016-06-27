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
@extends('layouts.headerandfooter-al-admin-registros')
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
			<form method="POST" action="/ingreso-servicio/new/ingreso-servicio" class="form-horizontal form-border">
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
			    	<label for="proveedor_id" class="col-sm-4 control-label">ID Proveedor</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="proveedor_id" name="proveedor_id" placeholder="ID del Proveedor" value="{{old('proveedor_id')}}">
			    	</div>
			    	<a class="btn btn-info" name="buscarProveedor" href="#"  title="Buscar Proveedor" data-toggle="modal" data-target="#modalBuscar"><i name="buscarProveedor" class="glyphicon glyphicon-search"></i></a>
			  	</div>			

			  	<div class="form-group required">
			    	<label for="nombreProveedor" class="col-sm-4 control-label">Nombre del Proveedor</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="nombreProveedor" name="nombreProveedor" placeholder="Nombre del Proveedor" value="{{old('proveedor_id')}}" readonly>
			    	</div>
			  	</div>			

			  	<div class="form-group required">			    	
			    	<label for="tipo_solicitud" class="col-sm-4 control-label">Tipo de Solicitud</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="tipo_solicitud" name="tipo_solicitud" value="Servicios" readonly>
			    	</div>
			  	</div>		  	

			  	<div class="form-group required">
			    	<label for="descripcion" class="col-sm-4 control-label">Descripcion</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcon de solicitud" value="{{old('descripcion')}}">
			    	</div>			    	
			  	</div>			
			  						
			  	<div class="form-group required">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">			    				      	
			      		<input type="text" class="form-control" id="estado" name="estado" placeholder="Estado de la solicitud" value="{{$estados->first()->valor}}" readonly>			    		
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
						<a href="/ingreso-servicio/index" class="btn btn-info">Cancelar</a>
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
			$proveedorAux = $('#example input:radio:checked').val();
			$proveedorVal = $proveedorAux.split("|");				
			document.getElementById('proveedor_id').value =  $proveedorVal[0];
			document.getElementById('nombreProveedor').value =  $proveedorVal[1];
		}
	</script>

<!-- Modal -->
	<div id="modalBuscar" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->	    
	    <div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BUSCAR PROVEEDOR</h4>
			</div>

			<div class="modal-body">	      	  
				<div class="container">					
					<div class="table-responsive">
						<div class="container" id="TableContainer">
							<div class="text-left">
					  			<font color="black"> 
					  				Ingresar alguno de los siguientes campos:
					  				<ul>
					  				<li>RUC</li>
					  				<li>Nombre del Proveedor</li>					  				
					  				</ul>
					  			</font>					  			
					  		</div>
					  		<br>
							<table class="table table-bordered table-hover text-center display" id="example" width="100%">
								<thead class="active" data-sortable="true">									
									<th><div align=center>RUC</div> </th>
									<th><div align=center>NOMBRE</div></th>
									<th><div align=center>TELÉFONO</div></th>
									<th><div align=center>CORREO</div></th>
									<th><div align=center>SELECCIONAR</div></th>
								</thead>
								<tbody>
									
									@foreach($proveedores as $proveedor)						
										<tr>											
											<td>{{$proveedor->ruc}}</td>
											<td>{{$proveedor->nombre_proveedor}}</td>		
											<td>{{$proveedor->telefono}}</td>
											<td>{{$proveedor->correo}}</td>
											<td>
												<div class="radio">
  													<label><input type="radio" name="optradio" value="{{$proveedor->id}}|{{$proveedor->nombre_proveedor}}"></label>
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

</html>