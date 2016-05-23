<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR PROVEEDOR</title>
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
					<strong>EDITAR PROVEEDOR</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/proveedor/{{ $proveedor->id }}/edit" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

				<!-- INICIO INCIIO -->				                       
				<div class="form-group">
		    		<label for="nombre_proveedorInput" class="col-sm-4 control-label">Nombre</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombre_proveedorInput" name="nombre_proveedor" value="{{$proveedor->nombre_proveedor}}" >
		    		</div>
		  		</div>
			  	<div class="form-group">
			    	<label for="rucInput" class="col-sm-4 control-label">RUC</label>
			    	<div class="col-sm-5">
			      		<input type="number" class="form-control" id="rucInput" name="ruc" value="{{$proveedor->ruc}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="direccionInput" class="col-sm-4 control-label">Dirección</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="direccionInput" name="direccion" value="{{$proveedor->direccion}}">
			    	</div>
			  	</div>	  	
			  	<div class="form-group">
			    	<label for="telefonoInput" class="col-sm-4 control-label">Teléfono</label>
			    	<div class="col-sm-5">
			      		<input type="number" class="form-control" id="telefonoInput" name="telefono" value="{{$proveedor->telefono}}" >
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="correoInput" class="col-sm-4 control-label">Correo</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="correoInput" name="correo" value="{{$proveedor->correo}}">
			    	</div>
			  	</div>
			  	
			  	<div class="form-group">
			    	<label for="nombre_responsableInput" class="col-sm-4 control-label">Nombre del Responsable</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombre_responsableInput" name="nombre_responsable" value="{{$proveedor->nombre_responsable}}" >
			    	</div>
			  	</div>			  
			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label ">Estado</label>
			    	<div class="col-sm-3">			      					      	
			      		
			      		<select class="form-control" id="estado" name="estado" required>
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value="1" @if($proveedor['estado'] == true) selected @endif >Activo</option>
						<option value="0" @if($proveedor['estado'] == false) selected @endif>Inactivo</option>				
						
						</select>							
			    	</div>	    	
			  	</div>
			  	
					<!-- FIN FIN FIN  -->
				
			
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
	{!!Html::script('../js/jquery-1.11.3.min.js')!!}
	{!!Html::script('../js/bootstrap.js')!!}
	{!!Html::script('../js/jquery.bxslider.min.js')!!}
	{!!Html::script('../js/MisScripts.js')!!}



</body>
</html>