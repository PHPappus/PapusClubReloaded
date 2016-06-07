<!DOCTYPE html>
<html>
<head>
	<title>Cambiar de contraseña</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<style>

		.modal-backdrop.in{
			z-index: 1;
		}
	</style>
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	
</head>
<body>
@extends('layouts.headerandfooter-al-'.$perfil)
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->		
		<div class="container">
			@include('alerts.errors')
		</div>			
	
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>Cambio de Contraseña (mínimo 8 y máximo 32 caracteres).</strong></p>
				</div>
			</div>	
		</div>
		<div class="container">
			
			<form method="POST" action="/password/change" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>
				<div class="form-group required">
					<label for="password" class="control-label col-sm-4 col-sm-offset-1 lead"><strong>Contraseña Actual</strong></label>
					<div class="col-sm-4">
						{!!Form::password('password_current',['class'=>'form-control'])!!}
						<div class="text-danger">{!!$errors->first('password_current')!!}</div>
					</div>

				</div>

				<div class="form-group required">
					<label for="password" class="control-label col-sm-4 col-sm-offset-1 lead"><strong>Contraseña Nueva</strong></label>
					<div class="col-sm-4">
						{!!Form::password('password',['class'=>'form-control'])!!}
						<div class="text-danger">{!!$errors->first('password')!!}</div>	
					</div>
				</div>
				<div class="form-group required">
					<label for="password" class="control-label col-sm-4 col-sm-offset-1 lead"><strong>Confirmar Contraseña Nueva</strong></label>
					<div class="col-sm-4">
						{!!Form::password('password_confirmation',['class'=>'form-control'])!!}	
						<div class="text-danger">{!!$errors->first('password_confirmation')!!}</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6 text-right">
						<button type="submit" class="btn btn-primary btn-lg">
						  Aceptar
						</button>
						
					</div>	
					<div class="col-sm-6 text-left">
						<a href="{!!URL::to('/cuenta')!!}" class="btn btn-primary btn-lg">Cancelar</a>
					</div>
				</div>
				<div class="form-group">
			  		<div class="text-right col-sm-4">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  		</div>
			  	</div>
			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->

	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}

</body>
</html>