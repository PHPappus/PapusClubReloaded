<!-- Una lista de los oscios para elegir a cual le editare sus pagos -->

 <!DOCTYPE html>
<html>
<head>
	<title>Seleccionar Persona</title>
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
@extends('layouts.headerandfooter-al-admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<br/><br/>
				<p class="lead"><strong>Seleccionar Socio</strong></p>
				<br/>
			</div>
			
		</div>
		<h4>1. Selecciones el socio.</h4>

		</br>
		</br>

		
		<div class="container">
			<table class="table table-bordered table-hover text-center display" id="example">
					<thead class="active">
						<tr>
							<th><DIV ALIGN=center>ID</th>
							<th><DIV ALIGN=center>NOMBRE</th>
							<th><DIV ALIGN=center>APELLIDO PAT.</th>
							<th><DIV ALIGN=center>APELLIDO MAT.</th>
							<!-- <th><DIV ALIGN=center>DETALLE</th> -->
							<th><DIV ALIGN=center>SELECCIONAR</th>
						</tr>
					</thead>
					<tbody>
						@foreach($socios as $socio)		
							
						   	<tr>						    		
							<td><a class="btn btn-info" href="#"  title="OK" ><i class="glyphicon glyphicon-ok"></i></a>
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