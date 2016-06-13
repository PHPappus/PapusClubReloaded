<!DOCTYPE html>
<html>
<head>
	<title>DETALLE SOCIO</title>
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
@extends('layouts.headerandfooter-al-admin')
@section('content')


	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>DETALLE DE SOCIO</strong></p>
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
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" disabled><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont" ><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
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
											<select class="form-control inputmodify" name="sede" style="max-width: 250px " disabled>
								                <option value="Soltero" default>Soltero (a)</option>
												<option value="Casado">Casado (a)</option>
												<option value="Divorciado">Divorciado (a)</option>
												<option value="Separado">Separado (a)</option>
												<option value="Unión Libre">Unión Libre</option>
												<option value="Viudo">Viudo (a)</option>
					    					</select>
										</div>	
									</div>
								</div>	
								<div class="form-group">
									<div class="col-sm-5"> </div>
										<a class="btn btn-info" href="/Socio/" title="Editar" >Regresar</a>			
								</div>															
							</form>
						</div>


										<!--DATOS NACIMIENTO-->
						<div role="tabpanel" class="tab-pane" id="seccion2">
								<br><br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont" ><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
								</div>																				
						</div>
										<!--DATOS FAMILIARES-->
						<div role="tabpanel" class="tab-pane" id="seccion3">
							<br><br><br>
							<div class="form-group required" >
									<div class="btn-group col-sm-4" ></div>
									<div class="btn-group col-sm-4"></div>
									<div class="btn-group col-sm-4"></div>
									<div class="btn-group col-sm-4" ></div>
									<div class="btn-group col-sm-4"></div>
									
									<div class="btn-group">
										<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
									</div>
									<div class="btn-group">
										<a href="#" class="btn btn-info cont" ><span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>
							</div>
						</div>
										<!--DATOS VIVIENDA-->
						<div role="tabpanel" class="tab-pane" id="seccion4">
							<br><br><br>
							<div class="form-group required" >
									<div class="btn-group col-sm-4" ></div>
									<div class="btn-group col-sm-4"></div>
									<div class="btn-group col-sm-4"></div>
									<div class="btn-group col-sm-4" ></div>
									<div class="btn-group col-sm-4"></div>
									
									<div class="btn-group">
										<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
									</div>
									<div class="btn-group">
										<a href="#" class="btn btn-info cont" ><span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>
							</div>
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
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont" ><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
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
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont" ><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
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
										<a class="btn btn-info" href="/Socio/" title="Editar" >Regresar</a>			
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
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont" ><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
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
										<a class="btn btn-info" href="/Socio/" title="Editar" >Regresar</a>			
								</div>																																				
							</form>						
						</div>
										<!--DATOS DE INVITADOS-->
						<div role="tabpanel" class="tab-pane" id="seccion8">
							<form action="" class="form-horizontal form-border">
								<br><br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4"></div>
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4"></div>
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont" ><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
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
													            </tr>				            		
														@endforeach
													</tbody>

											</table>
											<div class="form-group">
												<div class="col-sm-5"> </div>
													<a class="btn btn-info" href="/Socio/" title="Editar" >Regresar</a>			
											</div>												
											</br></br>
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
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont" disabled><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
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
										<a class="btn btn-info" href="/Socio/" title="Editar" >Regresar</a>			
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