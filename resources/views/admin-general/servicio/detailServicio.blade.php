<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE SERVICIO EXTRA</title>
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
					<strong>DETALLE DE SERVICIO EXTRA</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>

				<div class="form-group">
		    		<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$servicio->nombre}}" readonly>
		    		</div>
		  		</div>

			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" value="{{$servicio->descripcion}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="contactoInput" class="col-sm-4 control-label">Tipo de Servicio</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="contactoInput" name="tipo_servicio" value="{{$servicio->tipo_servicio}}" readonly>
			    	</div>
			  	</div>	  	


			  	<div class="form-group">
			    	<label for="activoInput" class="col-sm-4 control-label ">Activo</label>
			    	<div class="col-sm-3">
			      		<input type="checkbox"  class="checkbox" id="activoInput" name="estado" @if($servicio['estado'] == true) checked @endif disabled>
			    	</div>	    	
			  	</div>
									
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="/servicios/index" class="btn btn-info">Aceptar</a>				
				</div>

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