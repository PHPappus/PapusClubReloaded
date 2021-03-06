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
@extends('layouts.headerandfooter-al-admin-registros')
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
			      		<textarea   type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"  class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripcion" value="{{old('descripcion')}}" style="resize: none"  maxlength="100" ></textarea> 
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="tipoPromoInput" class="col-sm-4 control-label">Tipo Promoción</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" id="tipoPromoSelect" name="tipoPromo" style="max-width: 150px " >
							    @foreach ($tipos as $tipo)      
							        <option value="{{$tipo->valor}}">{{$tipo->valor}}</option>
							    @endforeach
						</select>
					</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="porcentajeInput" class="col-sm-4 control-label">Porcentaje Descuento</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'DoubleFormat')" class="form-control" id="porcentajeInput" name="porcentajeDescuento" placeholder="Porcentaje descuento" value="{{old('porcentaje')}}"  maxlength="5"  >
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