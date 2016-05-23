<!DOCTYPE html>
<html>
<head>
	<title>SERVICIO OFRECIDOS</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>SERVICIOS</strong></p>
				<br/>
			</div>
			
		</div>
	</div>
	<div class="container">
		<div class="form-group">
			<div class="col-sm-16 text-right">
				<a class="btn btn-info" href="{{url('/servicios/new')}}" title="Registrar Servicio" > Registrar Nuevo Servicio <i class="glyphicon glyphicon-plus" ></i> </a>	
			</div>
		</div>
		<br/>
	</div>

		<div class="table-responsive">
			<div class="container">
				<table class="table table-bordered table-hover text-center display" id="example">
						<thead class="active">							
							<th><div align=center>NOMBRE</div></th>
							<th><div align=center>DESCRIPCION</div></th>
							<th><div align=center>TIPO SERVICIO</div></th>
							<th><div align=center>DETALLE</div></th>
							<th><div align=center>EDITAR</div></th>
							<th><div align=center>ELIMINAR</div></th>
						</thead>

							
							<tbody>							
								@foreach($servicios as $servicio)						
								<tr>
								<td>{{ $servicio->nombre }}</td>
								<td>{{ $servicio->descripcion }}</td>
	 							<td>{{ $servicio->tipo_servicio }}</td>								
								<td>
					              <a class="btn btn-info" href="{{url('/servicios/'.$servicio->id.'/show')}}"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
					            </td>
								<td>
					              <a class="btn btn-info" href="{{url('/servicios/'.$servicio->id.'')}}" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
					            </td>
					            <td>
					              <a class="btn btn-info" href="{{url('/servicios/'.$servicio->id.'/delete')}}" title="Eliminar" ><i class="glyphicon glyphicon-remove"></i></a>
					            </td>
					    		</tr>
					    		@endforeach        
							</tbody>						
								
						
				</table>			
			</div>		
		</div>
	

		


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