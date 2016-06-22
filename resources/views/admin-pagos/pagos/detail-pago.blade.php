<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE FACTURACION</title>
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
		    		<label for="idInput" class="col-sm-4 control-label">Id Factura</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="idInput" name="id" value="{{$factura->id}}" readonly>
		    		</div>
		  		</div>

			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="number" class="form-control" id="descripcionInput" name="descripcion" value="{{$factura->descripcion}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="tipo_pagoInput" class="col-sm-4 control-label">Tipo de Pago</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipo_pagoInput" name="tipo_pago" value="{{$factura->tipo_pago}}" readonly>
			    	</div>
			  	</div>	  	

			  	<div class="form-group">
			    	<label for="tipo_comprobanteInput" class="col-sm-4 control-label">Tipo de Comprobante</label>
			    	<div class="col-sm-5">
			      		<input type="number" class="form-control" id="tipo_comprobanteInput" name="tipo_comprobante" value="{{$factura->tipo_comprobante}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="numero_pagoInput" class="col-sm-4 control-label">Número de Pago</label>
			    	<div class="col-sm-5">
			      		<input type="number" class="form-control" id="numero_pagoInput" name="numero_pago" value="{{$factura->numero_pago}}" readonly>
			    	</div>
			  	</div>
			  	
			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="estadoInput" name="estado" value="{{$factura->estado}}" readonly >
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="fecha_pagoInput" class="col-sm-4 control-label">Fecha de registro de pago</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecha_pagoInput" name="fecha_pago" value="" readonly >
			    	</div>
			  	</div>		  	

			  						
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="{{url('/pagos/'.$facturacion->persona_id.'/selectSocio')}}/" class="btn btn-info">Regresar</a>				
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