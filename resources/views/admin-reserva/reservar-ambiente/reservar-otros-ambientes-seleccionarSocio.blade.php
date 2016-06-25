<!DOCTYPE html>
<html>
<head>
	<title>RESERVA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-admin-reserva')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>SELECCIONE AL SOCIO</strong></p>
				<br/>
			</div>
			
		</div>
	</div>
	<input  type="hidden" type="text" id="fechaIni" name="fechaIni" value="{{ $fechaIni}}">
	<input type="hidden" type="text" id="fechaFin" name="fechaFin" value="{{ $fechaFin }}">
	</br>
	</br>
		<div class="table-responsive">
			<div class="container">
				<!-- <table id="example" class="table table-bordered display"> -->
				<!-- <form method="POST" action="/sedes/new/sede" > -->
				<div class="form-group">
			  		<div class="text-right">
			  			<font color="black"> 
			  				Filtra por todos los campos
			  			</font>
			  			
			  		</div>
			  	</div>
				<table class="table table-bordered table-hover text-center display" id="example" width="100%">
								<thead class="active" data-sortable="true">									
									<th><div align=center>DNI</div> </th>
									<th><div align=center>NOMBRES</div></th>
									<th><div align=center>APELLIDO PATERNO</div></th>
									<th><div align=center>APELLIDO MATERNO</div></th>
									<th><div align=center>SELECCIONAR</div></th>
								</thead>
								<tbody>
									
									@foreach($socios as $socio)						
										<tr>											
											<td>{{$socio->postulante->persona->doc_identidad}}</td>
											<td>{{$socio->postulante->persona->nombre}}</td>		
											<td>{{$socio->postulante->persona->ap_paterno}}</td>
											<td>{{$socio->postulante->persona->ap_materno}}</td>
											<td>
							        			<a class="btn btn-info" href="{{url('/reservar-ambiente/'.$ambiente->id.'/'.$socio->id.'/'.$fechaIni.'/'.$fechaFin.'/new-reserva-otro-ambiente-adminR')}}"  title="Detalle" ><i class="glyphicon glyphicon-ok"></i></a>
							       			</td>
							            </tr>				            		
									@endforeach
									
								</tbody>
							</table>

				</br>
				</br>

				</br>


			</div>		
		</div>

		</br></br></br></br>
	

		


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