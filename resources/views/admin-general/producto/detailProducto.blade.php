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
@extends('layouts.headerandfooter-al-admin')
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
			    	<div class="col-sm-3">			      					      	
			      		
			      		<select class="form-control" id="estado" name="estado" readonly>
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value="1" @if($producto['estado'] == true) selected @endif >Activo</option>
						<option value="0" @if($producto['estado'] == false) selected @endif>Inactivo</option>	
						
						</select>							
			    	</div>	    	
			  	</div>
			  	
			  	<div class="form-group ">
			    	<label for="tipoProductoInput" class="col-sm-4 control-label" >Tipo de Producto</label>
			    	<div class="col-sm-5">
			    	
			      		<select class="form-control" id="id_tipo_producto" name="id_tipo_producto"  readonly>
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value=null >Seleccionar tipo...</option>
						<option value="1" @if($producto['id_tipo_producto'] == 1) selected @endif >Ropa</option>
						<option value="2" @if($producto['id_tipo_producto'] == 2) selected @endif>Accesorios</option>									
						<option value="3" @if($producto['id_tipo_producto'] == 3) selected @endif>Útiles de Oficina</option>
						<option value="4" @if($producto['id_tipo_producto'] == 4) selected @endif>Souvenirs</option>
						</select>						
						
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