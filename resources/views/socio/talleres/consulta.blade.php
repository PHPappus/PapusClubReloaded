<!DOCTYPE html>
<html>
<head>
	<title>Talleres Papus Club</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	
</head>

<body>
@extends('layouts.headerandfooter-al-socio')
@section('content')

	<div class="content" style="max-width: 100%;">
		<div class="container">
			<div class="row" style="max-width: 1180px">
				<div class="col-sm-3">
					<ol class="breadcrumb">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li><a href="/talleres/index">Consultar Talleres</a></li>
						<li class="active">Detalle</li>
					</ol>
				</div>				
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong>{{$taller->nombre}}</strong></p>
				</div>
			</div>
		</div>
		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>
				<div class="form-group">
					<div class="col-sm-6 text-left">
							<label for="description" class="col-sm-5 control-label text-left">Descripción:</label>
							<div class="col-sm-7">
								<textarea class="form-control" name="descripcion" id="descriptionInput" rows="3" readonly="true">{{$taller->descripcion}}</textarea>
							</div>				
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
				    	<label for="profesorInput" class="col-sm-5 control-label">Profesor:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="text" class="form-control" id="profesor" placeholder="{{$taller->profesor}}" style="max-width: 220px" readonly="true">
			    		</div>		  				
		 			</div>
				</div>
		  		<div class="form-group">
		  			<div class="col-sm-6">
				    	<label for="nombreInput" class="col-sm-5 control-label">Fecha de inicio:</label>
			    		<div class="col-sm-7">
			      			<input type="text" class="form-control" id="fecha_inicio" placeholder='{{date("d-m-Y",strtotime($taller->fecha_inicio))}}' style="max-width: 220px" readonly="true">
			    		</div>			
		  			</div>
		  		</div>
				<div class="form-group">
		 			<div class="col-sm-6">
				    	<label for="nombreInput" class="col-sm-5 control-label">Fecha de fin:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="text" class="form-control" id="fecha_fin" placeholder='{{date("d-m-Y",strtotime($taller->fecha_fin))}}' style="max-width: 220px" readonly="true">
			    		</div>		  				
		 			</div>
				</div>
				<div class="form-group">
		 			<div class="col-sm-6">
				    	<label for="sesiones" class="col-sm-5 control-label">Cantidad de sesiones:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="text" class="form-control" id="sesiones" placeholder='{{$taller->cantidad_sesiones}}' style="max-width: 220px" readonly="true">
			    		</div>		  				
		 			</div>
				</div>
				<div class="form-group">
		 			<div class="col-sm-6">
				    	<label for="vacantes" class="col-sm-5 control-label">Vacantes Disponibles:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="text" class="form-control" id="vacantes" placeholder='{{$taller->vacantes}}' style="max-width: 220px" readonly="true">
			    		</div>		  				
		 			</div>
				</div>
				<!-- <div class="form-group">
		 			<div class="col-sm-6">
				    	<label for="precio" class="col-sm-5 control-label">Precio:</label>
			    		<div class="col-sm-7 text-center">
			    			<input type="text" class="form-control" id="precio" placeholder='{{$taller->precio_base}} Nuevos Soles' style="max-width: 220px" readonly="true">
			    		</div>		  				
		 			</div>
				</div> -->
				

									
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-12">
						@if((count($talleresxpersona->where('id',$taller->id))<=0) and ($taller->vacantes>0))
						<div class="col-sm-6 text-right">
							<a href="{{url('/talleres/'.$taller->id.'/confirm')}}" class="btn btn-primary" >Inscribirse</a>		
						</div>		
						<div class="col-sm-6 text-left">
							<a href="{{url('/talleres/index')}}" class="btn btn-primary" >Regresar</a>		
						</div>
						@else
							<div class="col-sm-12 text-center">
							<a href="{{url('/talleres/index')}}" class="btn btn-primary" >Regresar</a>		
						</div>
						@endif
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
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}
</body>
</html>