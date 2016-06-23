<!DOCTYPE html>
<html>
<head>
	<title>DETALLE POSTULANTE</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 

</head>
<body>
@extends('layouts.headerandfooter-al-admin-persona')
@section('content')


	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>DETALLE DE POSTULANTE</strong></p>
				<br/>
			</div>
			
		</div>
	</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-16 text-center">
					<div role="tabpanel">
						<ul class="nav nav-pills nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Básico</a></li>
							<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Nacimiento</a></li>
							<li role="presentation"><a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab">Familia</a></li>
							<li role="presentation"><a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">Vivienda</a></li>
							<li role="presentation"><a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab">Estudio</a></li>
							<li role="presentation"><a href="#seccion6" aria-controls="seccion6" data-toggle="tab" role="tab">Trabajo</a></li>
							<li role="presentation"><a href="#seccion7" aria-controls="seccion7" data-toggle="tab" role="tab">Contacto</a></li>
						
						</ul>
					</div>
					<div class="tab-content">

										<!--DATOS BÁSICOS-->										
						<div role="tabpanel" class="tab-pane active" id="seccion1">
							<form action="" class="form-horizontal form-border">
								<br><br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										
										
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nombre:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{$postulante->persona->nombre}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Paterno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="apellidoPat" name="apellidoPat" placeholder="Apellido Paterno" value="{{$postulante->persona->ap_paterno}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Materno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="apellidoMat" name="apellidoMat" placeholder="Apellido Materno" value="{{$postulante->persona->ap_materno}}" disabled>
										</div>	
									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Sexo:</label>
										</div>
										<div class="col-sm-6 text-left" >
										@if(strcmp($postulante->persona->sexo,'masculino')==0)
												<input type="radio" name="genero" value="Masculino" disabled checked> Masculino
												<input type="radio" name="genero" value="Femenino" style="margin-left: 35px;" disabled> Femenino
										@else
												<input type="radio" name="genero" value="Masculino" disabled > Masculino
												<input type="radio" name="genero" value="Femenino" style="margin-left: 35px;" disabled checked> Femenino
										@endif										
										</div>	
									</div>
								</div>

								@if(strcmp($postulante->persona->nacionalidad,'peruano')==0)
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nacionalidad:</label>
										</div>
										<div class="col-sm-6 text-left" >
												<input  type="radio" name="nacionalidad" value="Peruano"  @{{$nac=per}} checked disabled> Peruano  
												<input  type="radio" name="nacionalidad" value="Extranjero" style="margin-left: 50px;"@{{$nac=otro}} disabled> Extranjero	
										</div>	
									</div>
								</div>
								<!--Debe ir un if si es extranjero-->																
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">DNI:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control inputmodify" id="docidentity" placeholder="#######" style="max-width: 250px" value="{{$postulante->persona->doc_identidad}}"disabled>
										</div>	
									</div>
								</div>
								@else
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nacionalidad:</label>
										</div>
										<div class="col-sm-6 text-left" >
												<input  type="radio" name="nacionalidad" value="Peruano"  @{{$nac=per}}  disabled> Peruano  
												<input  type="radio" name="nacionalidad" value="Extranjero" style="margin-left: 50px;"@{{$nac=otro}} checked disabled> Extranjero	
										</div>	
									</div>
								</div>
								<!--Debe ir un if si es extranjero-->																
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Carnet de Extranjería:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control inputmodify" id="docidentity" placeholder="#######" style="max-width: 250px" value="{{$postulante->persona->carnet_extranjeria}}" disabled>
										</div>	
									</div>
								</div>
								@endif
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Estado Civil:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control inputmodify" id="docidentity" placeholder="#######" style="max-width: 250px" value="{{$estado_civil->valor}}" disabled>
										</div>	
									</div>
								</div>	
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="/postulante/index" title="Editar" >Regresar</a>			
								</div>															
							</form>
						</div>


										<!--DATOS NACIMIENTO-->
						<div role="tabpanel" class="tab-pane" id="seccion2">
							<form action="" class="form-horizontal form-border">
								<br><br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										
								</div>


								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Fecha de Nacimiento(dd/mm/aaaa):</label>
										</div>
										<div class="col-sm-6">
											<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_nacimiento" placeholder="Fecha Nacimiento" value="{{$postulante->persona->fecha_nacimiento}}"style="width: 250px"  disabled>

										</div>	
									</div>
								</div>
								@if(strcmp($postulante->persona->nacionalidad,'peruano')==0)
									<div class="form-group">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Departamento:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="departamento" name="departamento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{array_values($arregloLugar)[0]['nombre']}}" disabled>
												</div>		
											</div>
									</div>

									<div class="form-group">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Provincia:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="provincia" name="provincia" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{array_values($arregloLugar)[1]['nombre']}}" disabled>
												</div>		
											</div>
									</div>

									<div class="form-group">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Distrito:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="distrito" name="distrito" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{array_values($arregloLugar)[2]['nombre']}}" disabled>
												</div>		
											</div>
									</div>

									<div class="form-group">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Direccion Nacimiento:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{$postulante->direccion_nacimiento}}" disabled>
												</div>		
											</div>
									</div>
								@else
										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">País de Nacimiento:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="pais_nacimiento" name="pais_nacimiento" placeholder="Pais de  Nacimiento" style="max-width: 250px" value="{{$postulante->pais_nacimiento}}" disabled="true">
												</div>		
											</div>
										</div>

										<div class="form-group ">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Ciudad de Nacimiento:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Lugar de Nacimiento" style="max-width: 250px" value="{{$postulante->lugar_nacimiento}}" disabled="true">
												</div>		
											</div>
										</div>

								@endif

								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="/postulante/index" title="Editar" >Regresar</a>			
								</div>	
							</form>	
						</div>
										<!--DATOS FAMILIARES-->
						<div role="tabpanel" class="tab-pane" id="seccion3">
							<form action="" class="form-horizontal form-border">
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>

										<br><br><br>
										<p><b>REGISTRO DE FAMILIARES</b></p>
										<br>
										<div class=""> 
											@if ($errors->familia->any())
								  				<ul class="alert alert-danger fade in">
								  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  					@foreach ($errors->familia->all() as $error)
								  						<li>{{$error}}</li>
								  					@endforeach
								  				</ul>
								  			@endif
											@if(session('cambios-fam'))
												<div class="alert alert-success fade in">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong>¡Éxito!</strong> {{session('cambios-fam')}}
												</div>								
											@endif						  			
										</div>

										<div class="table-responsive">
											<div class="container">	
												<table class="table table-bordered table-hover text-center display" id="example">
														<thead class="active">
															<th><div algin=center>DOCUMENTO</div></th>
															<th><div align=center>NOMBRE</div> </th>
															<th><div align=center>APELLIDO PATERNO</div></th>
															<th><div align=center>APELLIDO MATERNO</div></th>
															<th><div align="center">CORREO</div></th>
															<th><div align=center>DETALLE</div></th>													
														</thead>
														<tbody>
															@foreach($postulante->familiarxpostulante as $familiar)
																<tr>
																	@if(strcmp($familiar->nacionalidad,'peruano')==0)
																		<td>{{$familiar->doc_identidad}}</td>
																	@else
																		<td>{{$familiar->carnet_extranjeria}}</td>
																	@endif
																		<td>{{$familiar->nombre}}</td>
																		<td>{{$familiar->ap_paterno}}</td>
																		<td>{{$familiar->ap_materno}}</td>
																		<td>{{$familiar->correo}}</td>
																		<td>
														              		<a class="btn btn-info" href="{{url('/postulante/familiar/'.$familiar->id.'/'.$postulante->persona->id.'/detail')}}"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
														            	</td>	

																</tr>
															@endforeach
														</tbody>
												</table>
												<br><br><br>
											</div>		
										</div>
										
										
								</div>
							</form>
						</div>
										<!--DATOS VIVIENDA-->
						<div role="tabpanel" class="tab-pane" id="seccion4">
							<form action="" class="form-horizontal form-border">
								<br><br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										
								</div>



								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Departamento:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="departamento" name="departamento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{array_values($arregloLugarVivienda)[0]['nombre']}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Provincia:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="provincia" name="provincia" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{array_values($arregloLugarVivienda)[1]['nombre']}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Distrito:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="distrito" name="distrito" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{array_values($arregloLugarVivienda)[2]['nombre']}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Direccion Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{$postulante->domicilio}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Referencia:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{$postulante->referencia_vivienda}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="/postulante/index" title="Editar" >Regresar</a>			
								</div>	
							</form>	
						</div>
										<!--DATOS ESTUDIO-->
						<div role="tabpanel" class="tab-pane" id="seccion5">
							<form action="" class="form-horizontal form-border">
								<br><br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										
										
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Colegio Primaria:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="colegio_primaria" name="colegio_primaria" placeholder="Colegio de Primaria" value="{{$postulante->colegio_primario}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Colegio Secundaria:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="colegio_secundaria" name="colegio_secundaria" placeholder="Colegio de Secundaria" value="{{$postulante->colegio_secundario}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Universidad:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="universidad" name="universidad" placeholder="Universidad" value="{{$postulante->universidad}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Carrera:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="carrera" name="carrera" placeholder="Carrera" value="{{$postulante->profesion}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="/postulante/index" title="Editar" >Regresar</a>			
								</div>																																				
							</form>
						</div>
										<!--DATOS TRABAJO -->
						<div role="tabpanel" class="tab-pane" id="seccion6">
							<form action="" class="form-horizontal form-border">
								<br><br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Centro de Trabajo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="centrotrabajo" name="centrotrabajo" placeholder="Centro de Trabajo" value="{{$postulante->centro_trabajo}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Cargo en Trabajo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="cargocentrotrabajo" name="cargocentrotrabajo" placeholder="Cargo en Trabajo" value="{{$postulante->cargo_trabajo}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Direccion Laboral:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="direccionlaboral" name="direccionlaboral" placeholder="Direccion" value="{{$postulante->direccion_laboral}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="/postulante/index" title="Editar" >Regresar</a>			
								</div>																														
							</form>
						</div>

										<!--DATOS DE CONTACTO -->
						<div role="tabpanel" class="tab-pane" id="seccion7">
							<form action="" class="form-horizontal form-border">
								<br><br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										
										
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Telefono:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="telefono" name="telefono_domicilio" placeholder="Telefono de Contacto" value="{{$postulante->telefono_domicilio}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Telefono Celular:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="celular" name="telefono_celular" placeholder="Celular" value="{{$postulante->telefono_celular}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Correo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" value="{{$postulante->persona->correo}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="/postulante/index" title="Editar" >Regresar</a>			
								</div>																																				
							</form>						
						</div>
						
					</div>
				</div>
			</div> 	
			<br/><br/>


		</div>
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/bootstrap-datepicker.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});

        $('.cont').click(function(){

  		var nextId = $(this).parents('.tab-pane').next().attr("id");
  		$('[href=#'+nextId+']').tab('show');

		})

		$('.back').click(function(){

  		var backId = $(this).parents('.tab-pane').prev().attr("id");
  		$('[href=#'+backId+']').tab('show');

		})



  		});
	</script>	


	<script>
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
		var checkin = $('#dpd1').datepicker({
  			onRender: function(date) {
    			return date.valueOf() < now.valueOf() ? 'disabled' : '';
  			}
		}).on('changeDate', function(ev) {
  			if (ev.date.valueOf() > checkout.date.valueOf()) {
    			var newDate = new Date(ev.date)
    			newDate.setDate(newDate.getDate() + 1);
    			checkout.setValue(newDate);
  			}
 			checkin.hide();
  			$('#dpd2')[0].focus();
		}).data('datepicker');
	</script>
	<script>
		$(function(){
			$('.datepicker').datepicker();
		});
	</script>
	


</body>
</html>