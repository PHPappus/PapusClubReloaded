<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR SEDE</title>
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
					<strong>REGISTRAR SEDE</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/sedes/new/sede" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<!-- VALIDACION CON FE INICIO -->
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

				<!-- VALIDACION CON FE FIN  -->
				<br/>
				<br/>
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
				<br/>
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="telefonoInput" class="col-sm-4 control-label">Teléfono</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="telefonoInput" name="telefono" placeholder="Teléfono" value="{{old('telefono')}}">
			    	</div>

			  	</div>

			  	<div class="form-group required">
			    	<label for="contactoInput" class="col-sm-4 control-label">Contacto</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="contactoInput" name="nombre_contacto" placeholder="Contacto" value="{{old('nombre_contacto')}}">
			    	</div>
			    	<a class="btn btn-info" name="buscarContacto" href="#"  title="Buscar" ><i name="buscarContacto" class="glyphicon glyphicon-search"></i></a>
			    	<!-- deberia ir a una pantalla que liste todos los contactos posibles del Club  -->
			  	</div>	  	

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad maxima</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidad_maxima" name="capacidad_maxima" placeholder="Capacidad" value="{{old('capacidad_maxima')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Capacidad por socio</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidadSocioInput" name="capacidad_socio" placeholder="Capacidad por Socio" value="{{old('capacidad_socio')}}">
			    	</div>
			  	</div>
			  	
			  	<div class="form-group required">
			    	<label for="departamentoInput" class="col-sm-4 control-label">Departamento</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="departamentoInput" name="departamento" placeholder="Departamento" value="{{old('departamento')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="provinciaInput" class="col-sm-4 control-label">Provincia</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="provinciaInput" name="provincia" placeholder="Provincia" value="{{old('provincia')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="distritoInput" class="col-sm-4 control-label">Distrito</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="distritoInput" name="distrito" placeholder="Distrito" value="{{old('distrito')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="direccionInput" class="col-sm-4 control-label">Dirección</label>
			    	<div class="col-sm-5">
			      		<textarea   type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"  class="form-control" id="direccionInput" name="direccion" placeholder="Dirección" value="{{old('direccion')}}"></textarea> 
			    	</div>
			  	</div>

			  	<div class="form-group ">
			    	<label for="referenciaInput" class="col-sm-4 control-label">Referencia </label>
			    	<div class="col-sm-5">
			      		<textarea  type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"   class="form-control" id="referenciaInput" name="referencia" placeholder="Referencia" value="{{old('referencia')}}"></textarea> 
			    	</div>
			  	</div>

			  	</br>
			  	
			  	</br></br>
			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/sedes/index" class="btn btn-info">Cancelar</a>
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

	<script src="/js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="/js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="/js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="/js/MisScripts.js"></script>




</body>
</html>