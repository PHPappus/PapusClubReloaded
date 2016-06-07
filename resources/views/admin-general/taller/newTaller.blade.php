<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR TALLER</title>
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
					<strong>REGISTRAR TALLER</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/taller/new/save" class="form-horizontal form-border">
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
				<div class="col-sm-4"></div>
				<div class="">
			  		<font color="red"> 
			  			(*) Dato Obligatorio
			  		</font>		  			
				</div>			
			  	</br>
			  	
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="dInput" name="descripcion" placeholder="Nombre">
			    	</div>
			  	</div> 

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción">
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="vacantesInput" class="col-sm-4 control-label">Vacantes</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" step="any" class="form-control" id="vacantesInput" name="vacantes" placeholder="Vacantes">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fecIniInsInput" class="col-sm-4 control-label">Fecha Inicio Inscripciones</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecIniInsInput" name="fecIniIns" placeholder="Fecha Inicio Inscripciones">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fecFinInsInput" class="col-sm-4 control-label">Fecha Fin Inscripciones</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecFinInsInput" name="fecFinIns" placeholder="Fecha Fin Inscripciones">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fecIniInput" class="col-sm-4 control-label">Fecha Inicio</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecIniInput" name="fecIni" placeholder="Fecha Inicio">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fecFinInsInput" class="col-sm-4 control-label">Fecha Fin</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecFinInput" name="fecFin" placeholder="Fecha Fin">
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="cantSesInput" class="col-sm-4 control-label">Cantidad de Sesiones</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" step="any" class="form-control" id="cantSesInput" name="cantSes" placeholder="Cantidad de Sesiones">
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
						<a href="/multa/" class="btn btn-info">Cancelar</a>
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