<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR PROVEEDOR</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
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
					<strong>REGISTRAR PROVEEDOR</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/proveedor/new/proveedor" class="form-horizontal form-border">
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
				<div class="col-sm-4"></div>
				<div class="">
			  		<font color="red"> 
			  			(*) Dato Obligatorio
			  		</font>		  			
				</div>			
			  	</br>
			  	</br>
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" placeholder="Nombre del Proveedor" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="telefonoInput" class="col-sm-4 control-label">RUC</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="ruc" name="ruc" placeholder="RUC" pattern="[0-9]{11}" title="Número de 11 dígitos" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="direccionInput" class="col-sm-4 control-label">Dirección</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" >
			    	</div>
			  	</div>	  	

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Teléfono</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" pattern="[0-9]{7,13}" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Correo</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
			    	</div>
			  	</div>
			  	
			  	<div class="form-group required">
			    	<label for="departamentoInput" class="col-sm-4 control-label">Nombre del Responsable</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text"  class="form-control" id="nombre-responsable" name="nombre_responsable" placeholder="Nombre del Responsable" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">
			    	
			      		<select class="form-control" id="estado" name="estado" >
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value="1" selected>Activo</option>
						<option value="0" >Inactivo</option>				
						
						</select>						
			    	</div>
			  	</div>		
			  	
			  	</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-success" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/proveedor/index" class="btn btn-danger">Cancelar</a>
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

</body>	
</html>