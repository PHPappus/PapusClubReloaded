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
				<p class="lead"><strong>MARCAR INGRESO</strong></p>
				<br/>
			</div>
			
		</div>
	</div>

	<div class="container">
		<form id="form2" method="POST" action="#" class="form-horizontal form-border">
												
			<div class="row">
				<div class="col-sm-12 text-left">
					<br/><br/>
					<div class ="col-sm-3"></div>
					@if(Session::get('resultado')=='aceptar')
						<p class="lead col-sm-6 text-center"><strong>! BIENVENIDO ¡</strong></p>
					@else
						<p class="lead col-sm-6 text-center"><strong>! SE HA ALCANZADO EL AFORO ¡</strong></p>					
					@endif
					<br/>
				</div>	
			</div>
			<br><br>
			<div class="btn-inline">
				<div class="btn-group col-sm-5"></div>
				
				<div class="btn-group">
					<a href="{{url('/ingreso-personal')}}" class="btn btn-info">Regresar</a>
				</div>				
			</div>
				
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