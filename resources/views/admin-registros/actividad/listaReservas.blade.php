 <!DOCTYPE html>
<html>
<head>
	<title>AMBIENTE</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-admin-registros')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<br/><br/>
				<p class="lead"><strong>RESERVAS</strong></p>
				<br/>
			</div>
			
		</div>
		<h4>1. Selecciones la reserva del ambiente para la actividad.</h4>

		</br>
		</br>


		
		<div class="container">
			<table class="table table-bordered table-hover text-center display" id="example">
					<thead class="active">
						<tr>
							<th><DIV ALIGN=center>ID</th>
							<th><DIV ALIGN=center>AMBIENTE</th>
							<th><DIV ALIGN=center>FECHA INICIO</th>
							<th><DIV ALIGN=center>FECHA FIN</th>
							<th><DIV ALIGN=center>HORA INICIO</th>
							
							<th><DIV ALIGN=center>SELECCIONAR</th>
						</tr>
					</thead>
					<tbody>
							@foreach($reservas as $reserva)						
						    	<tr>
						    		<td>{{ $reserva->id }}</td>
						    		<td>{{ $reserva->ambiente->nombre}}</td>
									<td>{{ $reserva->fecha_inicio_reserva }}</td>
									<td>{{ $reserva->fecha_fin_reserva }}</td>
			 						<td>{{ $reserva->hora_inicio_reserva }}</td>
									<td><a class="btn btn-info" href="{{url('/actividad/'.$reserva->id.'/select')}}" ><i class="glyphicon glyphicon-ok"></i></a>
							        </td>
							            
								</tr>
							@endforeach
					</tbody>					
												
					
			</table>		
			
		</div>
	</div>
</br></br></br></br></br>
		


@stop
{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<!-- {!!Html::script('js/jquery.dataTables.min.js')!!} -->
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