<!DOCTYPE html>
<html>
<head>
	<title>SORTEOS</title>
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
	<div class="container" id="ruta-navegacion">	
		<!-- Utilizando Bootstrap -->
		<br/><br/>		
			<div class="row">
				<a class="btn btn-link text-left withoutpadding" href="/">INICIO <span class="glyphicon glyphicon-chevron-right"></span></a>
				<button class="btn btn-link text-left withoutpadding" href="#">MANTENIMIENTO <span class="glyphicon glyphicon-chevron-right"></span></button>				
				<label class="text-left withoutpadding">SORTEOS</button></label>
			</div>
		<br/>
	</div>
	<div class="container">
		<div class="col-sm-12 text-left lead">
				<strong>SORTEOS</strong>
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
	<div style="text-align:right;padding-right:60px">Filtra por todos los campos</div>
	<div class="table-responsive">
		<div class="container">
			<table class="table table-bordered table-hover text-center display" id="example">
				<thead class="active" data-sortable="true">
					<th><div align=center>NOMBRE SORTEO</div> </th>
					<th><div align=center>FECHA INICIO DE SORTEO</div></th>
					<th><div align=center>FECHA FIN DE SORTEO</div></th>
					<th><div align=center>DESCRIPCION</div></th>
					<th><div align=center>MODIFICAR</div></th>
					<th><div align=center>ELIMINAR</div></th>
				</thead>	
				<tbody>													
					@foreach($sorteos as $sorteo)	
					
						<tr>									
							<td>{{$sorteo->nombre_sorteo}}</td>
							<td>{{$sorteo->fecha_abierto}}</td>
							<td>{{$sorteo->fecha_cerrado}}</td>	
							<td>{{$sorteo->descripcion}}</td>
							<td>
			              		<a class="btn btn-info" href="{{url('/sorteo/'.$sorteo->id.'')}}" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
			              	</td>
			              	<td>
					            <a class="btn btn-info"  title="Eliminar" data-href="{{url('/sorteo/'.$sorteo->id.'/delete')}}" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>    
					        </td>			            	
						</tr>
					</form>
					 @endforeach
				</tbody>			
			</table>						
		</div>	
	</div>
	<div align="center" style="padding:20px">
		<a class="btn btn-info" href="{{url('/sorteo/new')}}" > Agregar Sorteo</a>	
	</div>				
@stop
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	
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
<!-- Modal -->
	<div id="modalEliminar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Confirmar</h4>
	      </div>
	      <div class="modal-body">
	        <p>¿Está seguro que desea eliminar el producto?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal Event-->
	<script>
		$('#modalEliminar').on('show.bs.modal', function(e) {
   			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>

	<!-- Modal Success -->
	<div id="modalSuccess" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">¡Éxito!</h4>
	      </div>
	      <div class="modal-body">
	        <p>{{session('stored')}}</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>           
	      </div>
	    </div>

	  </div>
	</div>
</html>