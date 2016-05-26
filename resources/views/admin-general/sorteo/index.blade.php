<!DOCTYPE html>
<html>
<head>
	<title>MOSTRAR PROVEEDORES</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/jquery.bxslider.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/MisEstilos.css">
	
</head>

<body>
@extends('layouts.headerandfooter_after_login')
@section('content')
	<div class="content" style="max-width: 100%;">
	<div class="container" id="ruta-navegacion">	
		<!-- Utilizando Bootstrap -->
		<br/><br/>		
			<div class="row">
				<a class="btn btn-link text-left withoutpadding" href="/">INICIO <span class="glyphicon glyphicon-chevron-right"></span></a>
				<button class="btn btn-link text-left withoutpadding" href="#">MANTENIMIENTO <span class="glyphicon glyphicon-chevron-right"></span></button>
				<button class="btn btn-link text-left withoutpadding" href="#">SORTEO<span class="glyphicon glyphicon-chevron-right"></span></button>
				<label class="text-left withoutpadding">MOSTRAR SORTEOS</button></label>
			</div>
			<br/>
			<div class="container">

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="col-sm-12 text-left lead">
						<strong>MOSTRAR SORTEOS</strong>
				</div>		
			</div>
			</div>
		</div>
			<div class="table-responsive">
				<div class="container">
					<table class="table table-bordered table-hover text-center">
						<tr class="active">
							<td>NOMBRE SORTEO</td>
							<td>DESCRIPCION</td>
							<td>FECHA INICIO CONCURSO</td>
							<td>FECHA FIN CONCURSO</td>				
						</tr>				
							@foreach($sorteos as $sorteo)	
							
								<tr>									
									<td>{{$sorteo->nombre_sorteo}}</td>
									<td>{{$sorteo->descripcion}}</td>
									<td>{{$sorteo->fecha_abierto}}</td>
									<td>{{$sorteo->fecha_cerrado}}</td>		
									<td>
					              	<a class="btn btn-info" href="{{url('/sorteo/'.$sorteo->id.'')}}" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
					            </td>
								</tr>
							</form>
							 @endforeach
					</table>
					<br/>
					<br/>
					<br/>
					
				</div>	
			</div>				
	</div>	
@stop
<!-- JQuery -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="js/MisScripts.js"></script>
	
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