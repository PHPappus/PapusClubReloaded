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
					<p class="lead"><strong>POSTULANTES</strong></p>
				</div>
			</div>	
		</div>

			<!-- Mensaje de éxito luego de registrar -->
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{session('stored')}}
			</div>
		@endif

		<div class="container">
			<table class="table table-bordered table-hover text-center display" id="example">
					<thead class="active">
						<tr>
							<th><DIV ALIGN=center>DOC IDENTIDAD</th>
							<th><DIV ALIGN=center>NOMBRE</th>
							<th><DIV ALIGN=center>APELLIDO PATERNO</th>
							<th><DIV ALIGN=center>APELLIDO MATERNO</th>
							<th><DIV ALIGN=center>NACIONALIDAD</th>
							<th><DIV ALIGN=center>DETALLE</th>
							<th><DIV ALIGN=center>EDITAR</th>
							<th><DIV ALIGN=center>ELIMINAR</th>
							
						</tr>
					</thead>
					<tbody>
							@foreach($personas as $persona)						
						    	<tr>
						    		@if($persona->nacionalidad =="peruano")
						    			<td>{{ $persona->doc_identidad }}</td>
						    		
						    		@else
						    			<td>{{ $persona->carnet_extranjeria }}</td>
						    		@endif
									<td>{{ $persona->nombre }}</td>
									<td>{{ $persona->ap_paterno }}</td>
			 						<td>{{ $persona->ap_materno }}</td>
			 						<td>{{ $persona->nacionalidad }}</td>
									<td>
							        <a class="btn btn-info" href="{{url('/postulante/'.$persona->id.'/show')}}"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
							        </td>
									<td>
							        <a class="btn btn-info" href="{{url('/postulante/'.$persona->id.'')}}" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
							        </td>
							        <td>
							        <a class="btn btn-info"  title="Eliminar" data-href="{{url('/postulante/'.$persona->id.'/delete')}}" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a> 
							        </td>
							            
								</tr>
							@endforeach
					</tbody>					
												
					
			</table>		
			</br>
				</br>
				</br>
				</br>
				
				<div class="btn-inline">
					<!-- <form method="POST" action="/sedes/new/sede" >
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

					<div class="btn-group col-sm-10"></div>
					
					<div class="btn-group ">
						<a href="{{url('/postulante/new')}}" class="btn btn-info" type="submit">Registrar Postulante</a>

					</div>
					
				</div>





			<!-- <div><a class="btn btn-primary" href="{{url('/trabajador/search')}}">Consultar</a> <a class="btn btn-primary" href="{{url('/trabajador/new')}}">Registrar</a></div>
			@yield('content-opcion') -->
		</div>
	</div>

@stop
