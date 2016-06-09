<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR VENTA</title>
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
					<strong>EDITAR VENTA</strong>
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
			  	</br>

				<!-- INICIO INCIIO -->				                       
				<div class="form-group">
		    		<label for="producto_idInput" class="col-sm-4 control-label">Producto</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="producto_idInput" name="producto_id" value="{{old('producto_id')}}">
		    		</div>
		  		</div>
			  
			  	<div class="form-group">
		    		<label for="facturacion_idInput" class="col-sm-4 control-label">N° de Factura</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="facturacion_idInput" name="facturacion_id" value="{{$factura->id}}" readonly>
		    		</div>
		  		</div>				  				 
			  	
			  	<div class="form-group">
			    	<label for="cantidadInput" class="col-sm-4 control-label" >Cantidad</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="cantidadInput" name="cantidad" value="{{old('cantidad')}}" onkeypress="myFunction()">
			    	</div>			      					      		
			  	</div>	

			  	
				<br/><br/>
				
					<!-- FIN FIN FIN  -->				
			
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
	{!!Html::script('../js/jquery-1.11.3.min.js')!!}
	{!!Html::script('../js/bootstrap.js')!!}
	{!!Html::script('../js/jquery.bxslider.min.js')!!}
	{!!Html::script('../js/MisScripts.js')!!}

</body>
</html>