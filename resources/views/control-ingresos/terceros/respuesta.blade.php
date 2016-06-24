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
						<div class="col-sm-6" id="printArea">
							<div class="col-sm-2"></div>
							<p class="lead col-sm-6 text-center"><strong>! BIENVENIDO ¡</strong></p>
	  						<textarea id ="descripcion"  class="form-control" name="descripcion"  placeholder="Descripción"  rows="5" cols="50" style="max-width: 850px; max-height: 300px;" readonly>{{retornar_mensaje_tercero($persona,$sede->nombre,$precio_entrada,$fecha_2)}}</textarea>
						</div>
				</div>
			</div>
			<br><br>
			<div class="btn-inline">
				<div class="btn-group col-sm-5"></div>
				<div class="btn-group">
					<a href="#" class="btn btn-primary" onclick="printDiv('printArea')">Imprimir Comprobante</a>
				</div>				
				<div class="btn-group">
					<a href="{{url('/ingreso-terceros')}}" class="btn btn-info">Regresar</a>
				</div>				
			</div>
			<br><br>
					@else
						<p class="lead col-sm-6 text-center"><strong>! SE HA ALCANZADO EL AFORO ¡</strong></p>
				</div>	
			</div>
			<div class="btn-inline">
				<div class="btn-group col-sm-5"></div>
				
				<div class="btn-group">
					<a href="{{url('/ingreso-terceros')}}" class="btn btn-info">Regresar</a>
				</div>				
			</div>
			<br><br>					
					@endif
					<br/>				
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

		function printDiv(divName) {
		     var printContents = document.getElementById(divName).innerHTML;
		     var originalContents = document.body.innerHTML;

		     document.body.innerHTML = printContents;

		     window.print();

		     document.body.innerHTML = originalContents;
		}  		
	</script>


	
</body>
</html>