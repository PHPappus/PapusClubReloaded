<!DOCTYPE html>
<html>
<head>
	<title>Solicitud en Servicio</title>
	<meta charset="UTF-8">

	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	
</head>

<body>
@extends('layouts.headerandfooter-al-socio')
@section('content')

	<div class="content" style="max-width: 100%;">
		<div class="container">
			<div class="row" style="max-width: 920px">
				<div class="col-sm-4">
					<ol class="breadcrumb">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li><a href="/servicioalsocio/index">Consultar Servicio</a></li>
						<li class="active">Inscripción</li>
					</ol>
				</div>				
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong> 
						
						@foreach($servicindentificado as $sff)
						{{$sff->nombre}}
						@endforeach 
					 </strong></p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					


					@if (count($errors) > 0)

						<div class="alert alert-danger" role="alert">
							<strong>Errores:</strong>
							<ul>
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach  
							</ul>
						</div>

					@endif
					<!-- @if ($errors->any())
						<ul class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							@foreach ($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					@endif -->
				</div>
			</div>	
		</div>
		<div class="container">		

			<form method="POST" action="/servicioalsocio/{{$id}}/confirm/save" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>
				<div class="form-group">
					<div class="col-sm-7">
							<label for="description" class="col-sm-4 control-label">Descripción:</label>
							<div class="col-sm-7">
								<textarea class="form-control" name="descripcion" id="descriptionInput" rows="6" cols="10" readonly="true"> 
								@foreach($servicindentificado as $sff)
								{{$sff->descripcion}}
								@endforeach 
								</textarea>								
							</div>				
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
				    	<label for="profesorInput" class="col-sm-5 control-label">Tipo Servicio</label>
			    		<div class="col-sm-7 text-center">

			    			<input type="text" class="form-control" id="tipo_servicio" value="{{$tip_s}}" 
							style="max-width: 220px" readonly="true"> 			
			    		</div>		  				
		 			</div>
				</div>
		  		<div class="form-group">
		  			<div class="col-sm-6">
				    	<label for="nombreInput" class="col-sm-5 control-label">Estado</label>
			    		<div class="col-sm-7">
			      			<input type="text" class="form-control" id="estadoservicio" value='ACTIVO' style="max-width: 220px" readonly="true">

			    		</div>			
		  			</div>
		  		</div>
				
				
				<div class="form-group">
		 			<div class="col-sm-6">
				    	<label for="precio" class="col-sm-5 control-label">Precio:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="text" class="form-control" name="precio" id="precio" 
							  value="{{$precio}}"
			    			 style="max-width: 220px" readonly="true">
			    		</div>		  				
		 			</div>
				</div>

				<div class="form-group required">
			    	
			    	<div class="col-sm-6">
			    		<label for="tipoPagoInput" class="col-sm-5 control-label">Tipo de Pago</label>
			    		<div class="col-sm-7 text-center">
			      		<select style="max-width: 220px" class="form-control" id="tipo_pago" name="tipo_pago" >
						<option value="" selected >Seleccionar tipo...</option>
						@foreach($tipo_pagos as $tipo_pago)							
							<option value="{{$tipo_pago->valor}}" >{{$tipo_pago->valor}}</option>
						@endforeach						
						</select>						
						</div>		  				
			    	</div>
			  	</div>		

			  	<div class="form-group required">
			    	
			    	<div class="col-sm-6">
			    	<label for="tipoComprobanteInput" class="col-sm-5 control-label">Tipo de Comprobante</label>
			    		<div class="col-sm-7 text-center">
			      		<select style="max-width: 220px" class="form-control" id="tipo_comprobante" name="tipo_comprobante">
						<option value="" selected >Seleccionar tipo...</option>
						@foreach($tipo_comprobantes as $tipo_comprobante)
							<option value="{{$tipo_comprobante->valor}}" >{{$tipo_comprobante->valor}}</option>
						@endforeach						
						</select>						
						</div>	
			    	</div>
			  	</div>		
						
			  	<div class="form-group required">
			    	
			    	<div class="col-sm-6">			    	
			    	<label for="estadoInput" class="col-sm-5 control-label">Estado Factura</label>
			    		<div class="col-sm-7 text-center">			      		
						<input type="text" class="form-control" name="estadofactura" id="estadofactura" 
							  value="Emitido"
			    			 style="max-width: 220px" readonly="true">							
						</div>
			    	</div>
			  	
				<br/><br/>
				<br/><br/>

				<div class="form-group">
		 			<div class="col-sm-12">
				    	<label for="password" class="col-sm-5 control-label">Ingrese su contraseña:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="password" name="password" class="form-control" id="contraseña" style="max-width: 220px">
			    		</div>		  				
		 			</div>
				</div>
									
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-12">
						<div class="col-sm-6 text-right">
							<button type="submit" class="btn btn-primary">Solicitar</button>						
						</div>
						<div class="col-sm-6 text-left">						
							<a href="{{url('/servicioalsocio/index')}}" class="btn btn-primary" >Regresar</a>		
						</div>
					</div>			
				</div>
			</form>
		</div>
	</div>
@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}
</body>
</html>