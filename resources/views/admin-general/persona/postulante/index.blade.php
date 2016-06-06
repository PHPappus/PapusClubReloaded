<!DOCTYPE html>
<html>
<head>
	<title>POSTULANTE</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin')

@section('content')

	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>POSTULANTE</strong></p>
				</div>
			</div>	
		</div>

		<div class="table-responsive">
			<div class="container">
				<table class="table table-bordered table-hover text-center display" id="example">
						<thead class="active">
							<th><div align=center>APELLIDO PATERNO</div></th>
							<th><div align=center>APELLIDO MATERNO</div></th>
							<th><div align=center>NOMBRES</div></th>
						</thead>
						<tbody>
							@foreach($postulantes as $postulante)						
								<tr>
									<td>{{$postulante->persona->ap_paterno}}</td>
									<td>{{$postulante->persona->ap_materno}}</td>
									<td>{{$postulante->persona->nombre}}</td>
					            </tr>				            		
							@endforeach
						</tbody>
				</table>
				</br></br></br></br>
				<div class="btn-inline">
					<!-- <form method="POST" action="/sedes/new/sede" >
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

					<div class="btn-group col-sm-10"></div>
					
					<div class="btn-group ">
						<a href="#" class="btn btn-info" type="submit">Registrar postulante</a>

					</div>
					
				</div>								
			</div>		
		</div>


	</div>		
@stop
