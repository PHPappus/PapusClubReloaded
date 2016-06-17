<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE TRASPASO</title>
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
					<strong>DETALLE DE TRASPASO</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre Socio</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{$traspaso->socio->postulante->persona->nombre}}"  readonly>
			    	</div>
			  	</div>
	    		
			  	<div class="form-group">
			    	<label for="dniInput" class="col-sm-4 control-label">DNI Socio</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="dniInput" name="dni" placeholder="Nombre" value="{{$traspaso->socio->postulante->persona->doc_identidad}}"  readonly>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="nombrePInput" class="col-sm-4 control-label">Nombre Postulante</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombrePInput" name="nombreP" placeholder="Nombre" value="{{$traspaso->nombre}}"  readonly>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="dniPInput" class="col-sm-4 control-label">DNI Postulante</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="dniPInput" name="dniP" placeholder="Nombre" value="{{$traspaso->dni}}"  readonly>
			    	</div>
			  	</div>

			  	</br>
			  	</br>
				<div class="form-group">
					<div class="col-sm-6"> </div>
						<a class="btn btn-info" href="/traspasos-p/" title="Editar" >Regresar <i class="glyphicon glyphicon-arrow-left"></i></a>			
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