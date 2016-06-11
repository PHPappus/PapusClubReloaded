<!DOCTYPE html>
<html>
<head>
	<title>Registros de usuarios</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/MisEstilos.css">
	<!-- {!!Html::style('css/jquery.dataTables.min.css')!!} -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
</head>
<body>
@extends('layouts.headerandfooter-al-admin-registros')
@section('content')

	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		@include('alerts.success')
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>USUARIOS REGISTRADOS</strong></p>
				</div>
			</div>	
		</div>
		
		<div class="table-responsive">
				<div class="container">
					<table id="example" class="table table-bordered display">
							<thead>
								<tr class="active">
									<th>Nombre</th>
									<th>Correo</th>
									<!-- <th>Contraseña</th> -->
									<th>Perfil</th>
								</tr>
							</thead>	
							<tbody>
								@foreach($users as $user)
								<tr>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<!-- <td>{{$user->password}}</td> -->
									<td>{{$perfiles[$user->perfil_id-1]->description}}</td>
									<!-- <td>{{$perfiles->where('id','=',$user->perfil_id)}}</td> -->
								</tr>
								@endforeach
							</tbody>
							
						</table>	
				</div>		
		</div>
		
		<div class="container">
			<div class="form-group">
				<div class="col-sm-12 text-center">
					<button class="btn btn-primary" onclick="registrarNuevoUsuario()">REGISTRAR NUEVO USUARIO</button>	
				</div>
			</div>
		</div>
	</div>		
@stop
<!-- JQuery -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="js/MisScripts.js"></script>
	<!-- {!!Html::script('js/jquery.dataTables.min.js')!!} -->
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
	<<!-- script>
		function registrarNuevoUsuario(){
			location.href="usuario/create";
		}
	</script> -->
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