<!DOCTYPE html>
<html>
<head>
	<title>FAMILIARES</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 

</head>
<body>
@extends('layouts.headerandfooter-al-admin-persona')

@section('content')
	
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>FAMILIARES HABILITADOS PARA REGISTRO DE POSTULACIÓN</strong></p>
				</div>
			</div>
		</div>
		</br>
		</br>
		<div class="container">
			<table class="table table-bordered table-hover text-center display" id="example">
					<thead class="active">
						<tr>
							<th><DIV ALIGN=center>DOC IDENTIDAD</th>
							<th><DIV ALIGN=center>NOMBRE</th>
							<th><DIV ALIGN=center>APELLIDO PATERNO</th>
							<th><DIV ALIGN=center>APELLIDO MATERNO</th>
							<th><DIV ALIGN=center>NACIONALIDAD</th>
							<th><DIV ALIGN=center>VER SOCIO</th>
							<th><DIV ALIGN=center>REGISTRAR POSTULACIÓN</th>
							
						</tr>
					</thead>
					<tbody>
							@foreach($familiares as $familiar)						
						    	<tr>
						    		@if($familiar->nacionalidad =="peruano")
						    			<td>{{ $familiar->doc_identidad }}</td>
						    		
						    		@else
						    			<td>{{ $familiar->carnet_extranjeria }}</td>
						    		@endif
									<td>{{ $familiar->nombre }}</td>
									<td>{{ $familiar->ap_paterno }}</td>
			 						<td>{{ $familiar->ap_materno }}</td>
			 						<td>{{ $familiar->nacionalidad }}</td>
									<td>
							        <a class="btn btn-info" href="{{url('/familiares-habilitados/'.$familiar->id.'/socio')}}"  title="ver socio" ><i class="glyphicon glyphicon-list-alt"></i></a>
							        </td>
									<td>
							        <a class="btn btn-info" href="{{url('/familiares-habilitados/'.$familiar->id.'/new')}}" title="registrar postulación" ><i class="glyphicon glyphicon-pencil"></i></a>
							        </td>							            
								</tr>
							@endforeach
					</tbody>					
												
					
			</table>		
			</br>
				</br>
				</br>
				</br>
		</div>
	</div>

@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}

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