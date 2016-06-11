<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR ACTIVIDAD</title>
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
					<strong>REGISTRAR PAGO</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="#" class="form-horizontal form-border">
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
				<br/><br/>
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
				<br/>
				

			  	<div class="form-group required">
			    	<label for="ambienteInput" class="col-sm-4 control-label">Monto</label>
			    	<div class="col-sm-5">
			    		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="250"   readonly>
			      	</div>
			      	<a class="btn btn-info" name="buscarAmbiente" href="{!!URL::to('/ambiente/search')!!}"  title="Buscar" ><i name="buscarAmbiente" class="glyphicon glyphicon-search"></i></a>
			  	</div>
			  	<div class="form-group required">
			    	<label for="tipoambienteInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipoambienteInput" name="tipoambiente" value="Deuda de Alquiler de Bungalow"   readonly>
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="sedeInput" class="col-sm-4 control-label">N° Factura</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="sedeInput" name="sede" value="48265"   readonly>
			    	</div>
			  	</div>

				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">N° Pago</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="nombreInput" name="nombre" placeholder="Código del pago realizado" >
			    	</div>
			  	</div>

			   
			  	
			  	<!-- EL ESTADO SIEMPRE VA EN TRUE PARA EL REGISTRAR -->
			  	
			  	
			  	
		  	<!-- FIN FIN FIN -->
					
			
				</br></br>
			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="btn btn-info" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/pagos/pago-seleccionar-socio" class="btn btn-info">Cancelar</a>
						<!-- DEBERIA REGRESAR A LA LISTA DE LAS FACTURAS DEL SOCIO - FALTA LINQUEAR ESO -->
					</div>
				</div>
			
			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.12.4.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/bootstrap-datepicker-sirve.js')!!}
	{!!Html::script('locales/bootstrap-datepicker.es.min.js')!!}
	
	


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
