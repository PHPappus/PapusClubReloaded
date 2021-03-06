<!DOCTYPE html>
<html>
<head>
	<title>CUENTA</title>
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
@extends('layouts.headerandfooter-al-socio')
@section('content')


	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>CUENTA</strong></p>
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
							<li role="presentation"><a href="#seccion8" aria-controls="seccion8" data-toggle="tab" role="tab">Invitados</a></li>							
							<li role="presentation"><a href="#seccion9" aria-controls="seccion9" data-toggle="tab" role="tab">Membresía</a></li>
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
											<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{$socio->postulante->persona->nombre}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Paterno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="apellidoPat" name="apellidoPat" placeholder="Apellido Paterno" value="{{$socio->postulante->persona->ap_paterno}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Materno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="apellidoMat" name="apellidoMat" placeholder="Apellido Materno" value="{{$socio->postulante->persona->ap_materno}}" disabled>
										</div>	
									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Sexo:</label>
										</div>
										<div class="col-sm-6 text-left" >
										@if(strcmp($socio->postulante->persona->sexo,'masculino')==0)
												<input type="radio" name="genero" value="Masculino" disabled checked> Masculino
												<input type="radio" name="genero" value="Femenino" style="margin-left: 35px;" disabled> Femenino
										@else
												<input type="radio" name="genero" value="Masculino" disabled > Masculino
												<input type="radio" name="genero" value="Femenino" style="margin-left: 35px;" disabled checked> Femenino
										@endif										
										</div>	
									</div>
								</div>
								@if(strcmp($socio->postulante->persona->nacionalidad,'peruano')==0)
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nacionalidad:</label>
										</div>
										<div class="col-sm-6 text-left" >
												<input  type="radio" name="nacionalidad" value="peruano"  @{{$nac=per}} checked disabled> peruano  
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
											<input type="text" class="form-control inputmodify" id="docidentity" placeholder="#######" style="max-width: 250px" value="{{$socio->postulante->persona->doc_identidad}}"disabled>
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
												<input  type="radio" name="nacionalidad" value="peruano"  @{{$nac=per}}  disabled> peruano  
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
											<input type="text" class="form-control inputmodify" id="docidentity" placeholder="#######" style="max-width: 250px" value="{{$socio->postulante->persona->carnet_extranjeria}}"disabled>
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
										<a class="btn btn-info" href="{{url('/socio')}}" title="Editar" >Regresar</a>			
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
											<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_nacimiento" placeholder="Fecha Nacimiento" value="{{$socio->postulante->persona->fecha_nacimiento}}"style="width: 250px"  disabled>

										</div>	
									</div>
								</div>
							@if(strcmp($socio->postulante->persona->nacionalidad,'peruano')==0)	
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Departamento:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="departamento" name="departamento" placeholder="Departamento" value="{{$socio->postulante->Departamento->nombre}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Provincia:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" value="{{$socio->postulante->Provincia->nombre}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Distrito:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="distrito" name="distrito" placeholder="Distrito" value="{{$socio->postulante->Distrito->nombre}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Dirección de Nacimiento:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="Direccion de nacimiento" value="{{$socio->postulante->direccion_nacimiento}}" disabled>
										</div>	
									</div>
								</div>
							@else
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">País de Nacimiento:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="pais_nacimiento" name="pais_nacimiento" placeholder="Pais de  Nacimiento" style="max-width: 250px" value="{{$socio->postulante->pais_nacimiento}}" disabled>
										</div>		
									</div>
								</div>

								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Ciudad de Nacimiento:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Lugar de Nacimiento" style="max-width: 250px" value="{{$socio->postulante->lugar_nacimiento}}" disabled>
										</div>		
									</div>
								</div>							
							@endif
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="{{url('/socio')}}" title="Editar" >Regresar</a>			
								</div>																							
							</form>

						</div>
										<!--DATOS FAMILIARES-->
						<div role="tabpanel" class="tab-pane" id="seccion3">
							<form action="" class="form-horizontal form-border">

								<div class="form-group required" >
									<br><br><br>
									<p><b>FAMILIARES</b></p>
									<br>
										
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
														<th><div align=center>ELIMINAR</div></th>													
													</thead>
													<tbody>
														@foreach($socio->postulante->familiarxpostulante as $familiar)					
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

													              	<a class="btn btn-info" href="{{url('/socio/familiar/'.$familiar->id.'/'.$socio->postulante->id_postulante)}}"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
													            	</td>
													            	<td>												           
																		<a class="btn btn-info"  title="Eliminar" data-href="{{url('/socio/'.$familiar->id.'/'.$socio->postulante->id_postulante.'/familiar/delete')}}" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>
													            	</td>																	
													            </tr>				            		
														@endforeach
													</tbody>
											</table>
											<br><br><br>
											<div class="btn-inline">
												<div class="btn-group col-sm-10"></div>										
												<div class="btn-group ">
													<a href="{{url('socio/'.$socio->id.'/familiar/new')}}" class="btn btn-info" type="submit">Registrar Familiar</a>
												</div>
											</div>
											<br><br><br>								
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
												<input type="text" class="form-control" id="departamento" name="departamento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{$socio->postulante->DepartamentoVivienda->nombre}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Provincia:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="provincia" name="provincia" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{$socio->postulante->ProvinciaVivienda->nombre}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Distrito:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="distrito" name="distrito" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{$socio->postulante->DistritoVivienda->nombre}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Direccion Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{$socio->postulante->domicilio}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Referencia:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="Referencia" style="max-width: 250px" value="{{$socio->postulante->referencia_vivienda}}" disabled>
											</div>		
										</div>
								</div>

								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="{{url('/socio')}}" title="Editar" >Regresar</a>			
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
											<input type="text" class="form-control" id="colegio_primaria" name="colegio_primaria" placeholder="Colegio de Primaria" value="{{$socio->postulante->colegio_primario}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Colegio Secundaria:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="colegio_secundaria" name="colegio_secundaria" placeholder="Colegio de Secundaria" value="{{$socio->postulante->colegio_secundario}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Universidad:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="universidad" name="universidad" placeholder="Universidad" value="{{$socio->postulante->universidad}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Carrera:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="carrera" name="carrera" placeholder="Carrera" value="{{$socio->postulante->profesion}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="/Socio/" title="Editar" >Regresar</a>			
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
											<input type="text" class="form-control" id="centrotrabajo" name="centrotrabajo" placeholder="Centro de Trabajo" value="{{$socio->postulante->centro_trabajo}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Cargo en Trabajo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="cargocentrotrabajo" name="cargocentrotrabajo" placeholder="Cargo en Trabajo" value="{{$socio->postulante->cargo_trabajo}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Direccion Laboral:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="direccionlaboral" name="direccionlaboral" placeholder="Direccion" value="{{$socio->postulante->direccion_laboral}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="{{url('/socio')}}" title="Editar" >Regresar</a>			
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
											<input type="text" class="form-control" id="telefono" name="telefono_domicilio" placeholder="Telefono de Contacto" value="{{$socio->postulante->telefono_domicilio}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Telefono Celular:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="celular" name="telefono_celular" placeholder="Celular" value="{{$socio->postulante->telefono_celular}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Correo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" value="{{$socio->postulante->persona->correo}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="{{url('/socio')}}" title="Editar" >Regresar</a>			
								</div>																																				
							</form>						
						</div>
										<!--DATOS DE INVITADOS-->
						<div role="tabpanel" class="tab-pane" id="seccion8">
							<form action="" class="form-horizontal form-border">
								<div class="form-group required" >
									<br><br><br>
									<p><b>INVITADOS</b></p>
									<br>
										
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
														<th><div align=center>ELIMINAR</div></th>													
													</thead>
													<tbody>
														@foreach($socio->postulante->persona->invitados as $invitado)					
																<tr>
																@if(strcmp($invitado->nacionalidad,'peruano')==0)
																	<td>{{$invitado->doc_identidad}}</td>
																@else
																	<td>{{$invitado->carnet_extranjeria}}</td>
																@endif
																	<td>{{$invitado->nombre}}</td>
																	<td>{{$invitado->ap_paterno}}</td>
																	<td>{{$invitado->ap_materno}}</td>
																	<td>{{$invitado->correo}}</td>
																	<td>
													              	<a class="btn btn-info" href="{{url('/socio/invitado/'.$invitado->pivot->id.'/')}}"  title="Detalle"><i class="glyphicon glyphicon-list-alt"></i></a>
													            	</td>
													            	<td>												           
																		<a class="btn btn-info"  title="Eliminar" data-href="{{url('/socio/'.$invitado->pivot->id.'/invitado/delete')}}" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>
													            	</td>																	
													            </tr>				            		
														@endforeach
													</tbody>
											</table>
											<br><br><br>
											<div class="btn-inline">
												<div class="btn-group col-sm-10"></div>										
												<div class="btn-group ">
													<a href="{{url('socio/'.$socio->id.'/invitado/new')}}" class="btn btn-info" type="submit">Registrar Invitado</a>
												</div>
											</div>
											<br><br><br>								
										</div>		
									</div>														
							</form>							
						</div>


										<!--DATOS DE MEMBRESIA -->
						<div role="tabpanel" class="tab-pane" id="seccion9">
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
											<label for="" class="control-label">Número de Carnet:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="numerocarnet" name="numerocarnet" placeholder="Numero de Carnet" value="{{$socio->carnet_actual()->nro_carnet}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Tipo Membresía:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="tipomembresia" name="tipomembresia" placeholder="Tipo de Membresía" value="{{$socio->membresia->descripcion}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Cuota:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="cuota" name="cuota" placeholder="Cuota" value="{{$socio->membresia->tarifa->monto}}" disabled>
										</div>	
									</div>
								</div>	
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Estado:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{$socio->estado()}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Descripción:</label>
										</div>
										<div class="col-sm-6">
			      						<textarea id ="descripcion"  class="form-control" name="descripcion"  placeholder="Descripción" required rows="5" cols="50" style="max-width: 850px; max-height: 300px;" readonly>
			      							{{$socio->carnet_actual()->descripcion}}
			      						</textarea>
										</div>											

									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Emisión Carnet(dd/mm/aaaa):</label>
										</div>
										<div class="col-sm-6">
											<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_emision" placeholder="Fecha Emisión" value="{{$socio->carnet_actual()->fecha_emision}}"style="width: 250px"  disabled>

										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Vencimiento Carnet(dd/mm/aaaa):</label>
										</div>
										<div class="col-sm-6">
											<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_vencimiento" placeholder="Fecha Vencimiento" value="{{$socio->carnet_actual()->fecha_vencimiento}}"style="width: 250px"  disabled>

										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="{{url('/socio')}}" title="Editar" >Regresar</a>			
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
	        <p>¿Está seguro que desea eliminar a este persona de su lista de Invitados?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal Event-->
	<!-- Modal Event-->
	<script>
		$('#modalEliminar').on('show.bs.modal', function(e) {
   			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>

</body>
</html>