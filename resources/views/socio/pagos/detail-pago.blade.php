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
@extends('layouts.headerandfooter-al-socio')
@section('content')
<!---Cuerpo -->
<main class="main">
	<dv class="content" style="max-width: 100%;">
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
<<<<<<< HEAD
		    		<label for="idInput" class="col-sm-4 control-label">ID FACTURA</label>
=======
		    		<label for="idInput" class="col-sm-4 control-label">Id Factura</label>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="idInput" name="id" value="{{$facturacion->id}}" readonly>
		    		</div>
		  		</div>

			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
<<<<<<< HEAD
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" value="{{$facturacion->descripcion}}" readonly>
=======
			      		<input type="number" class="form-control" id="descripcionInput" name="descripcion" value="{{$facturacion->descripcion}}" readonly>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
			    	</div>
			  	</div>

			  	<div class="form-group">
<<<<<<< HEAD
			    	<label for="descripcionInput" class="col-sm-4 control-label">MONTO (S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="totalInput" name="total" value="{{$facturacion->total}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="tipo_pagoInput" class="col-sm-4 control-label">TIPO DE PAGO</label>
			    	<div class="col-sm-5">
=======
			    	<label for="tipo_pagoInput" class="col-sm-4 control-label">Tipo de Pago</label>
			    	<div class="col-sm-5">
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
			      		<input type="text" class="form-control" id="tipo_pagoInput" name="tipo_pago" value="{{$facturacion->tipo_pago}}" readonly>
			    	</div>
			  	</div>	  	

			  	<div class="form-group">
<<<<<<< HEAD
			    	<label for="tipo_comprobanteInput" class="col-sm-4 control-label">TIPO DE COMPROBANTE</label>
=======
			    	<label for="tipo_comprobanteInput" class="col-sm-4 control-label">Tipo de Comprobante</label>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipo_comprobanteInput" name="tipo_comprobante" value="{{$facturacion->tipo_comprobante}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
<<<<<<< HEAD
			    	<label for="numero_pagoInput" class="col-sm-4 control-label">Número DE PAGO</label>
			    	<div class="col-sm-5">
			    		@if($facturacion->numero_pago)
			      			<input type="text" class="form-control" id="numero_pagoInput" name="numero_pago"  value="{{$facturacion->numero_pago}}" readonly>
			      		@else
			      			<input type="text" class="form-control" id="numero_pagoInput" name="numero_pago"  value = "No se ha cancelado" readonly>
			      		@endif
=======
			    	<label for="numero_pagoInput" class="col-sm-4 control-label">Número de Pago</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="numero_pagoInput" name="numero_pago" value="{{$facturacion->numero_pago}}" readonly>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
			    	</div>
			  	</div>
			  	
			  	<div class="form-group">
<<<<<<< HEAD
			    	<label for="estadoInput" class="col-sm-4 control-label">ESTADO</label>
=======
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="estadoInput" name="estado" value="{{$facturacion->estado}}" readonly >
			    	</div>
			  	</div>
			  	<!-- 
			  	<div class="form-group">
			    	<label for="fecha_pagoInput" class="col-sm-4 control-label">Fecha de registro de pago</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecha_pagoInput" name="fecha_pago" value="" readonly >
			    	</div>
			  	</div>		  	
 -->
			  						
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="{{url('/pagos/facturacion-socio/')}}/" class="btn btn-info">Regresar</a>				
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