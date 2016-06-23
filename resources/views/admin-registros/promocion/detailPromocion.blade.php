<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE PROMOCION</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
</head>

<body>
@extends('layouts.headerandfooter-al-admin-registros')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>DETALLE DE PROMOCION</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>

				<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripcion </label>
			    	<div class="col-sm-5">
			      		<textarea type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder ="{{$promocion->descripcion}}" readonly></textarea>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="estadoInput" name="estado" value="{{$promocion->estado}}" readonly >
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="descuentoInput" class="col-sm-4 control-label">Monto descuento(S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" step = "any" class="form-control" id="descuentoInput" name="descuento" placeholder="Monto descuento" value="{{$promocion->montoDescuento}}" readonly>
			    	</div>
			  	</div>  	

			  	<div class="form-group">
			    	<label for="porcentajeInput" class="col-sm-4 control-label">Porcentaje descuento (%)</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" step = "any" class="form-control" id="porcentajeInput" name="porcentaje" placeholder="Porcentaje descuento" value="{{$promocion->porcentajeDescuento}}" readonly>
			    	</div>
			  	</div>

			  						
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="/promociones/index" class="btn btn-info">Regresar</a>				
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