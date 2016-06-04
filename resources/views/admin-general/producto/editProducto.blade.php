<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR PRODUCTO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	<style>

		.modal-backdrop.in{
			z-index: 1;
		}
	</style>
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
					<strong>EDITAR PRODUCTO</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/producto/{{ $producto->id }}/edit" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

				<!-- INICIO INCIIO -->				                       
				<div class="form-group">
		    		<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombre" name="nombre" value="{{$producto->nombre}}" >
		    		</div>
		  		</div>
			  
			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" value="{{$producto->descripcion}}">
			    	</div>
			  	</div>	  	
			  	
			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label ">Estado</label>
			    	<div class="col-sm-3">			      					      	
			      		
			      		<select class="form-control" id="estado" name="estado" required>
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value="1" @if($producto['estado'] == true) selected @endif >Activo</option>
						<option value="0" @if($producto['estado'] == false) selected @endif>Inactivo</option>	
						
						</select>							
			    	</div>	    	
			  	</div>
			  	
			  	<div class="form-group required">
			    	<label for="tipoProductoInput" class="col-sm-4 control-label">Tipo de Producto</label>
			    	<div class="col-sm-5">
			    	
			      		<select class="form-control" id="id_tipo_producto" name="id_tipo_producto" required>
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value=null >Seleccionar tipo...</option>
						<option value="1" @if($producto['id_tipo_producto'] == 1) selected @endif >Ropa</option>
						<option value="2" @if($producto['id_tipo_producto'] == 2) selected @endif>Accesorios</option>									
						<option value="3" @if($producto['id_tipo_producto'] == 3) selected @endif>Útiles de Oficina</option>
						<option value="4" @if($producto['id_tipo_producto'] == 4) selected @endif>Souvenirs</option>
						</select>						
						
			    	</div>
			  	</div>		
					<!-- FIN FIN FIN  -->
				
			
				</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input type="button" class="btn btn-success " data-toggle="modal" data-target="#confirmation" value="Guardar" onclick="ventana()">
					</div>
					<div class="btn-group">
						<a href="/producto/index" class="btn btn-default">Cancelar</a>
					</div>
				</div>
				</br>
				</br>	

				<!-- Ventana Modal de Confirmación -->		
				<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" data-backdrop="static">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<!-- Header de la ventana -->
							<div class="modal-header">										
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" onclick="cerrarventana()">&times;</span></button>
								<h4 class="modal-title">EDITAR PRODUCTO</h4>
							</div>
							<!-- Contenido de la ventana -->
							<div class="modal-body">
								<p>¿Desea guardar los cambios realizados?</p>
							</div>
							<div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
						        <button type="submit" class="btn btn-primary">Confirmar</button>
					      	</div>
						</div>
					</div>
				</div>
				
				
				
			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('../js/jquery-1.11.3.min.js')!!}
	{!!Html::script('../js/bootstrap.js')!!}
	{!!Html::script('../js/jquery.bxslider.min.js')!!}
	{!!Html::script('../js/MisScripts.js')!!}
	
<script>
		function ventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 1;
		}
		function cerrarventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 3;
		}
  	</script>

</body>
</html>