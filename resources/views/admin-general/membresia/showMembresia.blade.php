<!DOCTYPE html>
<html>
<head>
	<title>CONSULTA DE MEMBRESIA</title>
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
					<strong>CONSULTA DE MEMBRESÍA</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>
				<div class="form-group">
					<div class="col-sm-11 text-right">
						<a class="btn btn-info" href="{{url('/membresia/'.$membresia->id)}}/editar" title="Editar" >Editar <i class="glyphicon glyphicon-pencil"></i></a>	
					</div>
					<br/>
				</div>				
	    		
			    <br>
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{$membresia->descripcion}}" readonly required>
			    	</div>
			  	</div>  	

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Número Máximo de Invitados</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" class="form-control" id="numMaxInput" name="numMax" placeholder="Número máximo de Invitados" value="{{$membresia->numMaxInvitados}}" readonly required>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Tarifa (S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="number" min="0" step="any" class="form-control" id="tarifaInput" name="tarifa" placeholder="Tarifa" value="{{$membresia->tarifa->monto}}" readonly required>
			    	</div>
			  	</div>

			  	</br>
			  	</br>
				<div class="form-group">
					<div class="col-sm-6"> </div>
						<a class="btn btn-info" href="/membresia/" title="Editar" >Retornar <i class="glyphicon glyphicon-arrow-left"></i></a>			
				</div>
				</br>
				</br>

			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('/js/jquery-1.11.3.min.js')!!}
	{!!Html::script('/js/bootstrap.js')!!}
	{!!Html::script('/js/jquery.bxslider.min.js')!!}
	{!!Html::script('/js/MisScripts.js')!!}
</body>
</html>