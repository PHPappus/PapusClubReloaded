<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR PROMOCION</title>
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
					<strong>REGISTRAR PROMOCION</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/promociones/new/promocion" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<!-- Mensajes de error de validación del Request -->
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
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripcion</label>
			    	<div class="col-sm-5">
			      		<textarea   type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"  class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripcion" value="{{old('descripcion')}}"></textarea> 
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="estadoInput" name="estado" placeholder="Estado" value="{{old('estado')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="descuentoInput" class="col-sm-4 control-label">Monto Descuento</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="descuentoInput" name="montoDescuento" placeholder="Monto descuento" value="{{old('descuento')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="porcentajeInput" class="col-sm-4 control-label">Porcentaje Descuento</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="porcentajeInput" name="porcentajeDescuento" placeholder="Porcentaje descuento" value="{{old('porcentaje')}}" >
			    	</div>
			  	</div>	  	
		  	
			  	<div class="form-group">
			    	<label for="fechaInicioInput" class="col-sm-4 control-label">Fecha Registro(dd/mm/aaaa)</label>
			    	<div class="col-sm-5">
			      		<!-- <input type="date" class="form-control" id="fechaInicioInput" name="fecha"> -->
			      		<input class="datepicker"  type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="a_realizarse_en" placeholder="Fecha Inicio" style="max-width: 250px">
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
						<a href="/promociones/index" class="btn btn-info">Cancelar</a>
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