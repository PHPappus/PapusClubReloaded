<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE SEDE</title>
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
					<strong>DETALLE DEL PAGO </strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>

				<div class="form-group">
		    		<label for="nombreInput" class="col-sm-4 control-label">Id Factura</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombreInput" name="nombre" value="" readonly>
		    		</div>
		  		</div>

			  	<div class="form-group">
			    	<label for="telefonoInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="number" class="form-control" id="telefonoInput" name="telefono" value="" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="contactoInput" class="col-sm-4 control-label">Tipo de Pago</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="contactoInput" name="nombre_contacto" value="" readonly>
			    	</div>
			  	</div>	  	

			  	<div class="form-group">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Tipo de Comprobante</label>
			    	<div class="col-sm-5">
			      		<input type="number" class="form-control" id="capacidadInput" name="capacidad_maxima" value="" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Número de Pago</label>
			    	<div class="col-sm-5">
			      		<input type="number" class="form-control" id="capacidadSocioInput" name="capacidad_socio" value="" readonly>
			    	</div>
			  	</div>
			  	
			  	<div class="form-group">
			    	<label for="departamentoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="departamentoInput" name="departamento" value="" readonly >
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="provinciaInput" class="col-sm-4 control-label">Fecha de registro de pago</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="provinciaInput" name="provincia" value="" readonly >
			    	</div>
			  	</div>		  	

			  						
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="{{url('/pagos/facturacion-socio')}}/" class="btn btn-info">Regresar</a>				
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