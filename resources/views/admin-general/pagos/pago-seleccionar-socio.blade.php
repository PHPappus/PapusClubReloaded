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

		
		<div class="table-responsive">
			<div class="container">
				<table class="table table-bordered table-hover text-center display" id="example">
						<thead class="active">
							<th><div align=center>CARNET</div> </th>
							<th><div align=center>MEMBRESÍA</div></th>
							<th><div align=center>APELLIDO PATERNO</div></th>
							<th><div align=center>APELLIDO MATERNO</div></th>
							<th><div align=center>NOMBRES</div></th>
							<th><div align=center>ESTADO</div></th>
							<th><div align=center>Seleccionar</div></th>
						</thead>
						<tbody>
							@foreach($socios as $socio)
								@if(strcmp($socio->estado(), $socio->vigente() )==0)						
									<tr>
										<td>{{$socio->carnet_actual()->nro_carnet}}</td>
										<td>{{$socio->membresia->descripcion}}</td>
										<td>{{$socio->postulante->persona->ap_paterno}}</td>
										<td>{{$socio->postulante->persona->ap_materno}}</td>
										<td>{{$socio->postulante->persona->nombre}}</td>
										<td>{{$socio->estado()}}</td>
										<td>
								        <a class="btn btn-info" href="{{url('/pagos/'.$socio->id.'/selectSocio')}}/" title="Seleccionar" ><i class="glyphicon glyphicon-ok"></i></a>
								        </td>
						            	
						            	 
						            </tr>
					            @endif				            		
							@endforeach
						</tbody>
				</table>
				</br></br></br>
										
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