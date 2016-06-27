<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR SOLICITUD</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	{!!Html::style('/css/DataTable.css')!!}	
	<style>

		.modal-backdrop.in{
			z-index: 1;
		}
	</style>
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
			<!--@include('errors.503')-->		
			<form method="POST" action="add" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<!-- Mensajes de error de validación del Request -->
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

				<!-- INICIO INCIIO -->				                       				
				<div class="form-group required">
		    		<label for="producto_idInput" class="col-sm-4 control-label">ID Servicio</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="producto_id" name="producto_id" placeholder="ID del Servicio" onkeypress="return inputLimiter(event,'Numbers')" value="{{old('producto_id')}}">
		    		</div>
		    		<a class="btn btn-info" name="buscarProducto" href="#"  title="Buscar Producto" data-toggle="modal" data-target="#modalBuscar"><i name="buscarProducto" class="glyphicon glyphicon-search"></i></a>
		  		</div>			  	
			  
		  		<div class="form-group required">
		    		<label for="nombreProductoInput" class="col-sm-4 control-label">Nombre del Servicio</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Nombre del Servicio" readonly value="{{old('nombreProducto')}}">
		    		</div>
		  		</div>			  	

			  	<div class="form-group required">
		    		<label for="ingresoproducto_idInput" class="col-sm-4 control-label">N° de Solicitud</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="ingresoproducto_idInput" name="ingresoproducto_id" value="{{$ingresoproducto->id}}" readonly>
		    		</div>
		  		</div>				  				 
			  	
			  	<div class="form-group required" hidden>
			    	<label for="cantidadInput" class="col-sm-4 control-label" >Cantidad</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="cantidadInput" name="cantidad" placeholder="Cantidad del producto comprado" onkeypress="return inputLimiter(event,'Numbers')"  value="1">
			    	</div>			      					      		
			  	</div>				  								
					<!-- FIN FIN FIN  -->				
			
				</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">						
						<a href="{{url('/ingreso-producto/'.$ingresoproducto->id.'/back')}}" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>

				
				
			</form>
		</div>
	</div>		
@stop
	<!-- JQuery -->
	{!!Html::script('../js/jquery-1.11.3.min.js')!!}
	{!!Html::script('../js/bootstrap.js')!!}
	{!!Html::script('../js/jquery.bxslider.min.js')!!}
	{!!Html::script('../js/MisScripts.js')!!}
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
			$productoAux = $('#example input:radio:checked').val();
			$productoVal = $productoAux.split("|");										
			document.getElementById('producto_id').value =  $productoVal[0];
			document.getElementById('nombreProducto').value =  $productoVal[0];
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
					  				<li>Nombre</li>
					  				<li>Descripción</li>
					  				<li>Tipo de producto</li>
					  				</ul>
					  			</font>					  			
					  		</div>
					  		<br>
							<table class="table table-bordered table-hover text-center display" id="example" width="100%">
								<thead class="active" data-sortable="true">									
									<th><div align=center>NOMBRE</div> </th>
									<th><div align=center>DESCRIPCION</div></th>
									<th><div align=center>TIPO PRODUCTO</div></th>									
									<th><div align=center>SELECCIONAR</div></th>
								</thead>
								<tbody>
									
									@foreach($productos as $producto)						
										<tr>											
											<td>{{$producto->nombre}}</td>
											<td>{{$producto->descripcion}}</td>		
											<td>{{$producto->tipo_producto}}</td>											
											<td>
												<div class="radio">
  													<label><input type="radio" name="optradio" value="{{$producto->id}}|{{$producto->nombre}}"></label>
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