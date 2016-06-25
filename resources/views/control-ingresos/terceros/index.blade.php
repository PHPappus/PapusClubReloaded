<!DOCTYPE html>
<html>
<head>
	<title>INGRESO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-control-ingresos')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>INGRESO DE TERCEROS</strong></p>
				<br/>
			</div>
			
		</div>
	</div>

	<div class="container">
		<form id="form1" method="POST" action="{{url('/resultado-busqueda-tercero')}}" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">		
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
			<br><br><br><br><br>
			<div class="col-sm-6"></div>
			<div class="">
		  		<font color="red"> 
		  			(*) Dato Obligatorio
		  		</font>		  			
			</div>
			<br><br>						

			<div class="form-group required">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="col-sm-8 text-center">
						<label for="" class="control-label">Seleccione Sede:</label>
					</div>
					<div class="col-sm-4">
			      		<select class="form-control" id="sede_id" name="sede" >
			      		<option value=-1>Seleccione Sede</option>
			    		@foreach ($sedes as $sede)
			    			<option value={{$sede->id}}>{{$sede->nombre}}</option>
			    		@endforeach												
						</select>											
					</div>										
				</div>									
			</div>
			<div class="form-group required">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="col-sm-8 text-left">
			      		<select class="form-control" id="documento" name="documento" >
			      			<option value=-1>Seleccione Documento</option>
			    			<option value="DNI">DNI</option>
			    			<option value="EXTRANJERO">CARNERT EXTRANJERIA</option>												
						</select>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="numerodoc"onkeypress="return inputLimiter(event,'Numbers')" name="numerodoc" placeholder="Documento" value="{{old('numerodoc')}}">									
						</select>											
					</div>										
				</div>									
			</div>
			<br><br><br>
			<div class="btn-inline">
				<div class="btn-group col-sm-5"></div>
				
				<div class="btn-group ">
					<input class="btn btn-primary" type="submit" value="Buscar">
				</div>
				<div class="btn-group">
					<a href="{{url('/control-ingresos')}}" class="btn btn-info">Regresar</a>
				</div>
			</div>
			<br><br><br>			
		</form>

		<br><br><br>
				
			
	</div>
		
		


@stop
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}

	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});
  		});
	</script>


	
</body>
</html>