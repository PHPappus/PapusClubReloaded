<!DOCTYPE html>
<html>
<head>
	<title>CALIFICAR SERVICIO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
</head>
<body>
@extends('layouts.headerandfooter-al-socio')
@section('content')

<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>CALIFICAR SERVICIO</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/calificar/store" class="form-horizontal form-border">
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

			  	<div class="form-group required">
			    	<label for="idInput" class="col-sm-4 control-label">Monto de la Penalidad (S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'DoubleFormat')" min ="0" step="any" class="form-control" id="ididadInput" name="id" value="{{$id}}" style="max-width: 150px " readonly>
			    	</div>
			  	</div>
			  	
				<div class="form-group required">
			    	<label for="puntajeInput" class="col-sm-4 control-label">Puntaje</label>
			    	<div class="col-sm-5">
				    	<select class="form-control" id="puntajeSelect" name="puntaje" style="max-width: 150px " >
							    @foreach ($puntajes as $puntaje)      
							        <option value="{{$puntaje->valor}}">{{$puntaje->valor}}</option>
							    @endforeach
						</select>
					</div>
			  	</div>

				<div class="form-group ">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			    		<textarea class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" rows="3" cols="50" value="{{old('descripcion')}}"></textarea>
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
						<a href="/servicios/mis-inscripciones" class="btn btn-info">Cancelar</a>
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