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
			<form method="POST" action="/talleres/new/save" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
				<br/>
				<br/>
				<div class="col-sm-4"></div>
				<div class="">
			  		<font color="red"> 
			  			(*) Dato Obligatorio
			  		</font>		  			
				</div>			
			  	</br>
			  	</br>
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" required>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" required>
			    	</div>
			  	</div>    	

			  	<div class="form-group required">
			    	<label for="vacantesInput" class="col-sm-4 control-label">Vacantes</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" class="form-control" id="vacantesInput" name="vacantes" placeholder="Vacantes" required>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			  		<label for="fechaInicioInsInput" class="col-sm-4 control-label">Fecha Inicio Inscripciones</label>
			  		<div class="col-sm-5">
			  			<input type="date" id="fechaInicioInsInput" name="fechaInicioIns"  placeholder="Fecha Inicio Inscripciones" required>
			  		</div>
			  	</div>

			  	<div class="form-group required">
			  		<label for="fechaFinInsInput" class="col-sm-4 control-label">Fecha Fin Inscripciones</label>
			  		<div class="col-sm-5">
			  			<input type="date" id="fechaFinInsInput" name="fechaFinIns"  placeholder="Fecha Fin Inscripciones" required>
			  		</div>
			  	</div>

			  	<div class="form-group required">
			  		<label for="fechaInicioInput" class="col-sm-4 control-label">Fecha Inicio</label>
			  		<div class="col-sm-5">
			  			<input type="date" id="fechaInicioInput" name="fechaInicio"  placeholder="Fecha Inicio" required>
			  		</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="cantSesionesInput" class="col-sm-4 control-label">Cantidad de Sesiones</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" class="form-control" id="cantSesionesInput" name="cantSesiones" placeholder="Cantidad de Sesiones" required>
			    	</div>
			  	</div>


			  	<div class="form-group required">
			  		<label for="fechaFinInput" class="col-sm-4 control-label">Fecha Fin</label>
			  		<div class="col-sm-5">
			  			<input type="date" id="fechaFinInput" name="fechaFin"  placeholder="Fecha Fin" required>
			  		</div>
			  	</div>


			  	</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>

					<div class="btn-group ">
						<input class="btn btn-success" type="submit" value="Agregar Tarifa">
					</div>
					
					<div class="btn-group ">
						<input class="btn btn-success" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/talleres/" class="btn btn-danger">Cancelar</a>
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