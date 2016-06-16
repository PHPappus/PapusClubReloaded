<!-- Una lista las deudas del socios -->

 <!DOCTYPE html>
<html>
<head>
	<title>Pagos</title>
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
@extends('layouts.headerandfooter-al-admin-pagos')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<br/><br/>
				<p class="lead"><strong>Deudas del Socio</strong></p>
				<br/>
			</div>
			
		</div>
		<h4>1. Lista de deudas del socio.</h4>


		</br>
		</br>

		
		<div class="container">
			<table class="table table-bordered table-hover text-center display" id="example">
					<thead class="active">
						<tr>
							<th><DIV ALIGN=center>ID</th>
							<th><DIV ALIGN=center>Tipo de Pago</th>
							<th><DIV ALIGN=center>Monto</th>
							<th><DIV ALIGN=center>Descripción</th>
							<th><DIV ALIGN=center>estado</th>
							<!-- <th><DIV ALIGN=center>DETALLE</th> -->
							<!-- <th><DIV ALIGN=center>Detalle</th> -->
							<th><DIV ALIGN=center>Registrar Pago</th>
						</tr>
					</thead>
					<tbody>
						@foreach($facturaciones as $facturacion)
							<td> {{$facturacion->id}}</td>
							<td> {{$facturacion->tipo_pago}}</td>
							<td> {{$facturacion->total}}</td>
							<td> {{$facturacion->descripcions}}</td>
							<td> {{$facturacion->estado}} </td>				
						   <!--  <td>
							    <a class="btn btn-info" href="#"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
							</td> -->
							<td>
							    <a class="btn btn-info" href="{{url('/pagos/registrar-pago/'.$facturacion->id.'')}}" title="Registrar Pago" ><i class="glyphicon glyphicon-pencil"></i></a>
							</td>
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