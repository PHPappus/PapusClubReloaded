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
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
	
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
					<p class="lead"><strong>CONFIGURACION</strong></p>
				</div>
			</div>	
		</div>

		<div class="container">
			<form method="POST" action="/multa/new/save" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
				<div class="col-sm-4"></div>
				<div class=""> 
					@if ($errors->any())
		  				<ul class="alert alert-danger fade in">
		  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  					@foreach ($errors->all() as $error)
		  						<li>{{$error}}</li>
		  					@endforeach
		  				</ul>
		  			@endif
				</div>


				<div class="panel panel-primary">
					<div class="panel-body" style="width: 1140px; height: 500px; overflow: scroll;">
						<p class="lead"><strong>TIPOS DE PUESTOS</strong></p>
							<table   style="margin-left:200px;">
								<tr>
									<td style=" width:300px;">
										<table class="table table-striped text-center display" id="">
											<thead class="active" data-sortable="true">
												<th><div align=center>VALOR</div> </th>
											</thead>
											@foreach($variables->where('grupo', 1) as $grupo1)
												<tr>
													<td>{{ $grupo1->valor }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td style="padding:0 20px 0 100px;" >
										<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="puestos" name="puestos" placeholder="Nuevo Puesto" ><br>
										<button type="submit" name="edit" class="btn btn-primary pull-right">Agregar</button>
									</td>
								</tr>
							</table>
						<hr style="width: 80%; color: black; height: 1px; background-color:black;" />
						<p class="lead"><strong>TIPOS DE AMBIENTES</strong></p>
							<table   style="margin-left:200px;">
								<tr>
									<td style=" width:300px;">
										<table class="table table-striped text-center display" id="">
											<thead class="active" data-sortable="true">
												<th><div align=center>VALOR</div> </th>
											</thead>
											@foreach($variables->where('grupo', 2) as $grupo1)
												<tr>
													<td>{{ $grupo1->valor }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td style="padding:0 20px 0 100px;" >
										<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="puestos" name="puestos" placeholder="Nuevo Puesto" ><br>
										<button type="submit" name="edit" class="btn btn-primary pull-right">Agregar</button>
									</td>
								</tr>
							</table>
						<hr style="width: 80%; color: black; height: 1px; background-color:black;" />
						<p class="lead"><strong>TIPOS DE ACTIVIDADES</strong></p>
							<table   style="margin-left:200px;">
								<tr>
									<td style=" width:300px;">
										<table class="table table-striped text-center display" id="">
											<thead class="active" data-sortable="true">
												<th><div align=center>VALOR</div> </th>
											</thead>
											@foreach($variables->where('grupo', 3) as $grupo1)
												<tr>
													<td>{{ $grupo1->valor }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td style="padding:0 20px 0 100px;" >
										<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="puestos" name="puestos" placeholder="Nuevo Puesto" ><br>
										<button type="submit" name="edit" class="btn btn-primary pull-right">Agregar</button>
									</td>
								</tr>
							</table>
						<hr style="width: 80%; color: black; height: 1px; background-color:black;" />
						<p class="lead"><strong>TIPOS DE SERVICIOS</strong></p>
							<table   style="margin-left:200px;">
								<tr>
									<td style=" width:300px;">
										<table class="table table-striped text-center display" id="">
											<thead class="active" data-sortable="true">
												<th><div align=center>VALOR</div> </th>
											</thead>
											@foreach($variables->where('grupo', 4) as $grupo1)
												<tr>
													<td>{{ $grupo1->valor }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td style="padding:0 20px 0 100px;" >
										<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="puestos" name="puestos" placeholder="Nuevo Puesto" ><br>
										<button type="submit" name="edit" class="btn btn-primary pull-right">Agregar</button>
									</td>
								</tr>
							</table>
						<hr style="width: 80%; color: black; height: 1px; background-color:black;" />
						<p class="lead"><strong>DURACION DE CARNET</strong></p>
							<table   style="margin-left:200px;">
								<tr>
									<td style=" width:300px;">
										<table class="table table-striped text-center display" id="">
											<thead class="active" data-sortable="true">
												<th><div align=center>VALOR</div> </th>
											</thead>
											@foreach($variables->where('grupo', 5) as $grupo1)
												<tr>
													<td>{{ $grupo1->valor }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td style="padding:0 20px 0 100px;" >
										<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="puestos" name="puestos" placeholder="Nuevo Puesto" ><br>
										<button type="submit" name="edit" class="btn btn-primary pull-right">Cambiar</button>
									</td>
								</tr>
							</table>
						<hr style="width: 80%; color: black; height: 1px; background-color:black;" />
						<p class="lead"><strong>TIPOS DE PRODUCTOS</strong></p>
							<table   style="margin-left:200px;">
								<tr>
									<td style=" width:300px;">
										<table class="table table-striped text-center display" id="">
											<thead class="active" data-sortable="true">
												<th><div align=center>VALOR</div> </th>
											</thead>
											@foreach($variables->where('grupo', 6) as $grupo1)
												<tr>
													<td>{{ $grupo1->valor }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td style="padding:0 20px 0 100px;" >
										<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="puestos" name="puestos" placeholder="Nuevo Puesto" ><br>
										<button type="submit" name="edit" class="btn btn-primary pull-right">Agregar</button>
									</td>
								</tr>
							</table>
						<hr style="width: 80%; color: black; height: 1px; background-color:black;" />
						<p class="lead"><strong>TIPOS RELACION FAMILIAR</strong></p>
							<table   style="margin-left:200px;">
								<tr>
									<td style=" width:300px;">
										<table class="table table-striped text-center display" id="">
											<thead class="active" data-sortable="true">
												<th><div align=center>VALOR</div> </th>
											</thead>
											@foreach($variables->where('grupo', 9) as $grupo1)
												<tr>
													<td>{{ $grupo1->valor }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td style="padding:0 20px 0 100px;" >
										<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="puestos" name="puestos" placeholder="Nuevo Puesto" ><br>
										<button type="submit" name="edit" class="btn btn-primary pull-right">Agregar</button>
									</td>
								</tr>
							</table>
						<hr style="width: 80%; color: black; height: 1px; background-color:black;" />
						<p class="lead"><strong>PRECIO ENTRADAS A SEDES (S/.)</strong></p>
							<table   style="margin-left:200px;">
								<tr>
									<td style=" width:300px;">
										<table class="table table-striped text-center display" id="">
											<thead class="active" data-sortable="true">
												<th><div align=center>VALOR</div> </th>
											</thead>
											@foreach($variables->where('grupo', 12) as $grupo1)
												<tr>
													<td>{{ $grupo1->valor }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td style="padding:0 20px 0 100px;" >
										<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="puestos" name="puestos" placeholder="Nuevo Puesto" ><br>
										<button type="submit" name="edit" class="btn btn-primary pull-right">Cambiar</button>
									</td>
								</tr>
							</table>
						<hr style="width: 80%; color: black; height: 1px; background-color:black;" />
						<p class="lead"><strong>TIPOS DE PUNTAJE</strong></p>
							<table   style="margin-left:200px;">
								<tr>
									<td style=" width:300px;">
										<table class="table table-striped text-center display" id="">
											<thead class="active" data-sortable="true">
												<th><div align=center>VALOR</div> </th>
											</thead>
											@foreach($variables->where('grupo', 17) as $grupo1)
												<tr>
													<td>{{ $grupo1->valor }}</td>
												</tr>
											@endforeach
										</table>
									</td>
									<td style="padding:0 20px 0 100px;" >
										<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="puestos" name="puestos" placeholder="Nuevo Puesto" >
										<br>
										<button type="submit" name="edit" class="btn btn-primary pull-right">Agregar</button>
									</td>
								</tr>
							</table>
					</div>
				</div>


			</form>
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
	        <p>¿Está seguro que desea eliminar al Trabajador?</p>
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