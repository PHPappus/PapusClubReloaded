<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR TALLER</title>
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
					<strong>MODIFICAR TALLER</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/talleres/{{$taller->id}}/edit" class="form-horizontal form-border">
			{{method_field('PATCH')}}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
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
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{$membresia->descripcion}}" required>
			    	</div>
			  	</div>  	

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Número Máximo de Invitados</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" class="form-control" id="numMaxInput" name="numMax" value="{{$membresia->numMaxInvitados}}" placeholder="Número máximo de Invitados" required>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Tarifa (S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="number" min="0" step="any" class="form-control" id="tarifaInput" name="tarifa" value="{{$membresia->tarifa->monto}}" placeholder="Tarifa" required>
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
						<a href="/membresia/" class="btn btn-danger">Cancelar</a>
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