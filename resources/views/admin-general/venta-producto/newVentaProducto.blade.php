<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR PRODUCTO</title>
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
					<strong>REGISTRAR PRODUCTO</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/venta-producto/new/venta-producto" class="form-horizontal form-border">
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
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
			  	</br>
			  	</br>								

				<div class="form-group required">
			    	<label for="persona_id" class="col-sm-4 control-label">Persona</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="persona_id" name="persona_id" placeholder="Nombre del Producto" value="{{old('nombre')}}">
			    	</div>
			  	</div>			  	

			  	<div class="form-group required">
			    	<label for="tipoPagoInput" class="col-sm-4 control-label">Tipo de Pago</label>
			    	<div class="col-sm-5">
			    	
			      		<select class="form-control" id="tipo_pago" name="tipo_pago" >
						<option value="" selected >Seleccionar tipo...</option>
						@foreach($configuracion as $tipo_pago)
							@if ($tipo_pago['grupo'] == '8')
								<option value="{{$tipo_pago->valor}}" >{{$tipo_pago->valor}}</option>
							@endif
						@endforeach						
						</select>						
						
			    	</div>
			  	</div>		
						
			  	<div class="form-group required">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">			    	
			      		<select class="form-control" id="estado" name="estado" >
						<!-- Las opciones se deberían extraer de la tabla configuracion-->
						<option value="" selected>Seleccionar tipo...</option>
						@foreach($configuracion as $estado)
							@if ($estado['grupo'] == '7' and $estado['valor'] != 'Anulado')
							<option value="{{$estado->valor}}">{{$estado->valor}}</option>
							@endif
						@endforeach						
						</select>													
						
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
						<a href="/venta-producto/index" class="btn btn-info">Cancelar</a>
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