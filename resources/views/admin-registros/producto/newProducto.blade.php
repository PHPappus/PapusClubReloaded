<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR PRODUCTO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
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
					<strong>REGISTRAR PRODUCTO</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/producto/new/producto" class="form-horizontal form-border">
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
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Producto" value="{{old('nombre')}}">
			    	</div>
			  	</div>			  	

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"  value="{{old('descripcion')}}">
			    	</div>
			  	</div>	  				  	
			  	
				<div hidden class="form-group required">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">
			    	
			      		<select class="form-control" id="estado" name="estado" >
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value="1" selected>Activo</option>
						<option value="0" >Inactivo</option>									
						</select>						

			    	</div>
			  	</div>		

			  	<div class="form-group required">
			    	<label for="tipoProductoInput" class="col-sm-4 control-label">Tipo de Producto</label>
			    	<div class="col-sm-5">
			    	
			      		<select class="form-control" id="tipo_producto" name="tipo_producto">

						<option value="" selected >Seleccionar tipo...</option>
						@foreach($tipo_productos as $tipo_producto)
							<option value="{{$tipo_producto->valor}}" >{{$tipo_producto->valor}}</option>
						@endforeach						
						</select>						
						
			    	</div>
			    	<a class="btn btn-info" name="agregarTipoProducto" href="#"  title="Agregar Tipo de Producto" data-toggle="modal" data-target="#modalAgregar"><i name="agregarTipoProducto" class="glyphicon glyphicon-plus"></i></a>
			  	</div>		

			  	<div class="form-group required">
			    	<label for="precioInput" class="col-sm-4 control-label">Precio</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" onkeypress="return inputLimiter(event,'DoubleFormat')"  id="precio" name="precio" placeholder="Precio"  value="{{old('precio')}}">
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
						<a href="/producto/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>

			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	<script src="/js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="/js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="/js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="/js/MisScripts.js"></script>

	<!-- Modal -->
	<div id="modalAgregar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->	    
	    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Confirmar</h4>
		</div>
		<div class="container">
			<form method="POST" action="/producto/new/tipoproducto" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br>
				<div class="form-group required">
			    	<label for="valorInput" class="col-sm-1 control-label">Nombre</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="valor" name="valor" placeholder="Nombre del Tipo de Producto" value="{{old('valor')}}">
			    	</div>					    	
				</div>									 

				<div class="btn-inline">
					<div class="btn-group col-sm-4"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a  data-dismiss="modal" class="btn btn-info">Cancelar</a>
					</div>
				</div>
			</form>
		</div>

	    <div class="modal-body">	      
	    </div>
		<div class="modal-footer">	                    
		</div>
	    </div>

	  </div>
	</div>

</body>
</html>