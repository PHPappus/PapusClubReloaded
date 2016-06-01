<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR AMBIENTE</title>
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
					<strong>REGISTRAR AMBIENTE</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/ambiente/new/ambiente" class="form-horizontal form-border">
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

					<!-- INICIO INICIO INICIO INICIO -->
				<div class="form-group required">
			    	<label for="sedeInput" class="col-sm-4 control-label">SEDE</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" name="sedeSelec" style="max-width: 150px "  >
							                <option value="-1" default>Seleccione</option>							         
							                 @foreach ($sedes as $sede)      
							                	<option value="{{$sede->id}}">{{$sede->nombre}}</option>
							                @endforeach
						</select>
					</div>
			  	</div>

				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">NOMBRE</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')"   class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" >
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="tipoAmbienteInput" class="col-sm-4 control-label">TIPO AMBIENTE</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" id="tipoAmbienteInput" name="tipo_ambiente" style="max-width: 150px "   >
							                <option value="-1" default>Seleccione</option>
							                <option value="Bungalow">Bungalow</option>
							                <option value="Canchas">Canchas</option>
							                <option value="Piscina">Piscina</option>
							                <option value="Comedor">Comedor</option>
							                <option value="Salon">Salón</option >
							                


						</select>
					</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">CAPACIDAD MAXIMA</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="capacidadInput" name="capacidad_actual" placeholder="Capacidad Maxima" >
			    	</div>
			  	</div>	  	
			  	<div class="form-group required">
			    	<label for="numHabitacionInput" class="col-sm-4 control-label">NÚMERO DE HABITACIONES</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="numHabitacionInput" name="capacidad_actual" placeholder="Número de habitaciones" >
			    	</div>
			  	</div>	
			  	<div class="form-group required">
			    	<label for="ubicacionInput" class="col-sm-4 control-label">UBICACIÓN</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')"   class="form-control" id="ubicacionInput" name="ubicacion" placeholder="Ubicacion" >
			    	</div>
			  	</div>
			  	</br>
			  	<div class="form-group">
			  		<div class="text-right col-sm-4">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>

			  	</div>
			  	
		  			<!-- FIN FIN FIN -->
					
				</br></br>
			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/ambiente/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>

			  	</br>
			  	</br>
			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	<script src="../js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="../js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="../js/MisScripts.js"></script>


  	

</body>
</html>