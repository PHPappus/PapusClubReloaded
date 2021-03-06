<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE PRODUCTO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	
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
					<strong>DETALLE DE PRODUCTO</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>
				
				<div class="form-group">
			    	<label for="proveedor_id" class="col-sm-4 control-label">ID Proveedor</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="proveedor_id" name="proveedor_id" placeholder="ID del Proveedor" value="{{$producto->proveedor_id}}" readonly="">
			    	</div>			    	
			  	</div>

			  	<div class="form-group">
			    	<label for="nombreProveedor" class="col-sm-4 control-label">Nombre del Proveedor</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="nombreProveedor" name="nombreProveedor" placeholder="Nombre de la Persona" value="{{$producto->proveedor->nombre_proveedor}}" readonly="">
			    	</div>			    	
			  	</div>		

				<div class="form-group">
		    		<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombre" name="nombre" value="{{$producto->nombre}}" readonly>
		    		</div>
		  		</div>
			  
			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" value="{{$producto->descripcion}}" readonly>
			    	</div>
			  	</div>	  	
			  	
			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label ">Estado</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="estadoInput" name="estado" 
			      		@if ($producto['estado']==1) 
			      			value="Activo" 
			      		@else
			      			value="Inactivo" 
			      		@endif readonly>
			    	</div>
			  	</div>
			  	
			  	<div class="form-group">
			    	<label for="tipoProductoInput" class="col-sm-4 control-label" >Tipo de Producto</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipoProductoInput" name="tipoProducto" 
			    		value="{{$producto->tipo_producto}}"
			      		readonly>
			    	</div>			      					      		
			  	</div>	
						
			  	<div class="form-group">
			    	<label for="precioInput" class="col-sm-4 control-label" >Precio</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="precioInput" name="precio" 
			    		value="{{$producto->precioproducto->first()['precio']}}" readonly>
			    	</div>			      					      		
			  	</div>	

			  	<div class="form-group">
			    	<label for="costoInput" class="col-sm-4 control-label">Costo</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="costo" name="costo" placeholder="Costo"  value="{{$producto->precioproducto->first()['costo']}}" readonly="">
			    	</div>
			  	</div>	  

				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="/producto/index" class="btn btn-info">Regresar</a>				
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
</body>
</html>