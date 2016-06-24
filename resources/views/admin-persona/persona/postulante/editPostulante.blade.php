<!DOCTYPE html>
<html>
<head>
	<title>EDITAR POSTULANTE</title>
	<meta charset="UTF-8">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/jquery.bxslider.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
	<style>
		.modal-backdrop.in{
			z-index: 1;
		}

		#cuota_select {
        /*for firefox*/
        -moz-appearance: none;
        /*for chrome*/
        -webkit-appearance:none;
      }

		/*for IE10*/
		#cuota_select::-ms-expand {
    	display: none;
		}
		.glyphicon.glyphicon-chevron-left, .glyphicon.glyphicon-chevron-right {
    		font-size: 25px;
		}
}

	</style>

</head>
<body>
@extends('layouts.headerandfooter-al-admin-persona')
@section('content')
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<br/><br/>
					<p class="lead"><strong>EDITAR POSTULANTE</strong></p>
					<p style="color:red"><strong>Puuede guardar los cambios de cada una de las pestañas</strong></p>
					<br>
				</div>
			
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-sm-16 text-center">
					<div role="tabpanel">
						<ul class="nav nav-pills nav-justified" id="pills-edit" role="tablist">
	
							<!--DATOS BASICOS-->
							@if(!Session::has('update') && !$errors->basico->any() && !$errors->nacimiento->any() && !$errors->vivienda->any() && !$errors->estudio->any() && !$errors->trabajo->any() && !$errors->contacto->any())									
								<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Básico</a></li>
							@elseif(Session::get('update')=='basico' || $errors->basico->any())
								<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Básico</a></li>
							@else
								<li role="presentation"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Básico</a></li>
							@endif

							<!--DATOS DE NACIMIENTO-->
							@if(Session::get('update')=='nacimiento' || $errors->nacimiento->any())
								<li role="presentation" class="active"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Nacimiento</a></li>
							@else
								<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Nacimiento</a></li>
							@endif

							<!--DATOS DE FAMILIA-->
							@if(Session::get('update')=='familia' || $errors->familia->any())
								<li role="presentation" class="active"><a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab">Familia</a></li>
							@else
								<li role="presentation"><a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab">Familia</a></li>
							@endif

							<!--DATOS DE VIVIENDA-->
							@if(Session::get('update')=='vivienda' || $errors->vivienda->any())
								<li role="presentation" class="active"><a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">Vivienda</a></li>
							@else
								<li role="presentation"><a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">Vivienda</a></li>
							@endif
							
							<!--DATOS DE ESTUDIOS-->
							@if(Session::get('update')=='estudio' || $errors->estudio->any())
								<li role="presentation" class="active"><a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab">Educación</a></li>
							@else
								<li role="presentation"><a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab">Educación</a></li>
							@endif

							<!--DATOS TRABAJO-->							
							@if(Session::get('update')=='trabajo' || $errors->trabajo->any())
								<li role="presentation" class="active"><a href="#seccion6" aria-controls="seccion6" data-toggle="tab" role="tab">Empleo</a></li>
							@else
								<li role="presentation"><a href="#seccion6" aria-controls="seccion6" data-toggle="tab" role="tab">Empleo</a></li>
							@endif

							<!--DATOS CONTACTO-->
							@if(Session::get('update')=='contacto' || $errors->contacto->any())
								<li role="presentation" class="active"><a href="#seccion7" aria-controls="seccion7" data-toggle="tab" role="tab">Contacto</a></li>
							@else
								<li role="presentation"><a href="#seccion7" aria-controls="seccion7" data-toggle="tab" role="tab">Contacto</a></li>
							@endif
						</ul>
					</div>

					<div class="tab-content">
						@if(!Session::has('update') && !$errors->basico->any() && !$errors->nacimiento->any() && !$errors->vivienda->any() && !$errors->estudio->any() && !$errors->trabajo->any() && !$errors->contacto->any())									
							<div role="tabpanel" class="tab-pane active" id="seccion1">
						@elseif(Session::get('update')=='basico' || $errors->basico->any())
							<div role="tabpanel" class="tab-pane active" id="seccion1">
						@else
							<div role="tabpanel" class="tab-pane" id="seccion1">
						@endif


								<form method="POST" action="/postulante/{{$postulante->persona->id}}/editBasico" class="form-horizontal form-border">
									{{method_field('PATCH')}}
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="col-sm-4"></div>
									<div class=""> 
										@if ($errors->basico->any())
							  				<ul class="alert alert-danger fade in">
							  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  					@foreach ($errors->basico->all() as $error)
							  						<li>{{$error}}</li>
							  					@endforeach
							  				</ul>
							  			@endif
									</div>
									@if(session('cambios-bas'))
										<div class="alert alert-success fade in">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												<strong>¡Éxito!</strong> {{session('cambios-bas')}}
										</div>								
									@endif
																	
									<br><br/><br/>

									<div class="form-group required" >
											<div class="btn-group col-sm-4" ></div>
											<div class="btn-group col-sm-4">
												<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
											</div>

									</div>										
									<br>								
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nombre:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" onkeypress="return inputLimiter(event,'Letters')" id="nombre" name="nombre" placeholder="Nombre" value="{{$postulante->persona->nombre}}" >
											</div>	
										</div>
									</div>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Paterno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="apellidoPat" name="apellidoPat" placeholder="Apellido Paterno" value="{{$postulante->persona->ap_paterno}}" >
											</div>	
										</div>
									</div>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Materno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="apellidoMat" name="apellidoMat" placeholder="Apellido Materno" value="{{$postulante->persona->ap_materno}}" >
											</div>	
										</div>
									</div>
																	
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Sexo:</label>
											</div>
											<div class="col-sm-6 text-left" style="float: right">											
													<div>
														
															{{ Form::radio('sexo', 'masculino', (($postulante->persona['sexo']=="masculino" )? true : false)) }}Masculino
															</div>
															<div>
															{{ Form::radio('sexo', 'femenino', (($postulante->persona['sexo']=="femenino" )? true : false)) }}Femenino
													</div>
											</div>	
										</div>
									</div>


									<div class="form-group">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Nacionalidad:</label>
												</div>
												<div class="col-sm-6 text-left" >
													
													<input onchange="es_peruano()" type="radio" name="nacionalidad" value="peruano" {{ (old('nacionalidad') == "peruano") ? 'checked="true"' : ''}} {{($postulante->persona->nacionalidad == "peruano") ? 'checked="true"':''}}/>Peruano&nbsp&nbsp&nbsp
													
													<input onchange="es_extranjero()" type="radio" name="nacionalidad" value="extranjero" {{ (old('nacionalidad') == "extranjero") ? 'checked="true"' : ''  }} {{($postulante->persona->nacionalidad == "extranjero") ? 'checked="true"':''}}/>Extranjero

												</div>	
											</div>
									</div>

									<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">DNI:</label>
												</div>
												<div class="col-sm-6">
												<!--Se hace validacion para que acepte solo numeros pero que sea un texto-->
														<input  type="text" onkeypress="return inputLimiter(event,'Numbers')"fape  @if ($postulante->persona->nacionalidad!="peruano") disabled  @endif  class="form-control" id="doc_identidad" name="doc_identidad" placeholder="DNI" maxlength="8" style="max-width: 250px" value="{{$postulante->persona->doc_identidad}}" value="{{old('doc_identidad')}}"  >
												</div>	
											</div>
									</div>

									<div class="form-group required">
											<div class="col-sm-6">	
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Carnet de extranjeria:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" onkeypress="return inputLimiter(event,'Numbers')" @if ($postulante->persona->nacionalidad!="extranjero") disabled  @endif class="form-control" id="carnet_extranjeria" name="carnet_extranjeria" placeholder="Carnet de Extranjeria" maxlength="12" style="max-width: 250px" value="{{$postulante->persona->carnet_extranjeria}}" value="{{old('carnet_extranjeria')}}" >
												</div>	
											</div>
									</div>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Estado Civil:</label>
											</div>
											<div class="col-sm-6">
												<select class="form-control" id="estado_civil" name="estado_civil" style="max-width: 150px "   >
													<option value="-1">Seleccione</option>
														@foreach ($estadocivil as $estcivil)      

										                	<option value="{{$estcivil->id}}" @if($postulante['estado_civil']==$estcivil->id) selected @endif >{{$estcivil->valor}}</option>

										                @endforeach
												</select>
											</div>
										</div>
									</div>
			
									<!--MODAL CONFIRMACION-->
									<!-- Modal -->
									<div class = "modal fade" id = "confirmation" tabindex = "-1" role = "dialog" 
									   aria-labelledby = "myModalLabel" aria-hidden = "true">
									   
									   <div class = "modal-dialog">
									      <div class = "modal-content">
									         
									         <div class = "modal-header">
									            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
													<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
									            </button>
									            
									            <h4 class = "modal-title" id = "myModalLabel">
									               EDITAR POSTULANTE
									            </h4>
									         </div>
									         
									         <div class = "modal-body">
									            <p>¿Desea guardar los cambios realizados?</p>
									         </div>
									         
									         <div class = "modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
									            
									            <button type = "submit" class = "btn btn-primary">
									               Confirmar
									            </button>
									         </div>
									         
									      </div><!-- /.modal-content -->
									   </div><!-- /.modal-dialog -->
									  
									</div><!-- /.modal -->							
									<br><br>
									<div class="form-group required" >
											<div class="btn-group col-sm-5" ></div>
											
											<div class="btn-group">
												<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Confirmar">
											</div>
											<div class="btn-group">
												<a href="/postulante/index" class="btn btn-info">Retornar</a>
											</div>
									</div>																
								</form>
							</div>
							<!--=============================================-->
						
						@if(Session::get('update')=='nacimiento' || $errors->nacimiento->any())
							<div role="tabpanel" class="tab-pane active" id="seccion2">
						@else
							<div role="tabpanel" class="tab-pane" id="seccion2">
						@endif

								<form method="POST" action="/postulante/{{$postulante->persona->id}}/editNacimiento" class="form-horizontal form-border">
									{{method_field('PATCH')}}
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
									<div class="form-group" style="display:none;">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left" >
														
													<input type="radio" name="nacionalidad1" value="peruano" {{ (old('nacionalidad1') == "peruano") ? 'checked="true"' : ''}} {{($postulante->persona->nacionalidad == "peruano") ? 'checked="true"':''}}/>Peruano&nbsp&nbsp&nbsp
														
													<input type="radio" name="nacionalidad1" value="extranjero" {{ (old('nacionalidad1') == "extranjero") ? 'checked="true"' : ''  }} {{($postulante->persona->nacionalidad == "extranjero") ? 'checked="true"':''}}/>Extranjero
												</div>	
											</div>
									</div>

									<div class="col-sm-4"></div>
										<div class=""> 
										@if ($errors->nacimiento->any())
							  				<ul class="alert alert-danger fade in">
							  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  					@foreach ($errors->nacimiento->all() as $error)
							  						<li>{{$error}}</li>
							  					@endforeach
							  				</ul>
							  			@endif
										</div>
										@if(session('cambios-nac'))
											<div class="alert alert-success fade in">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													<strong>¡Éxito!</strong> {{session('cambios-nac')}}
											</div>								
										@endif
									
									<br><br><br>
									<div class="form-group required" >
											<div class="btn-group col-sm-4" ></div>
											<div class="btn-group col-sm-4">
												<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
											</div>


									</div>																				

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Fecha de Nacimiento(dd/mm/aaaa):</label>
											</div>
											<div class="col-sm-6">
												<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" name="fecha_nacimiento" placeholder="Fecha Nacimiento" value="{{$postulante->persona->fecha_nacimiento}}" style="width: 250px" readonly="true" >

											</div>	
										</div>
									</div>

									@if(strcmp($postulante->persona->nacionalidad,'peruano')==0)
										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Departamento:</label>
												</div>
												<div class="col-sm-6">
													<select class="form-control" id="departamento" name="departamento" style="max-width: 250px" data-link="{{ url('/provinciasEdit') }}">
														<option value="-1" default>--Departamento--</option>
															@foreach ($departamentos as $depa)      
											                	<option value="{{$depa->id}}"  @if($postulante->departamento==$depa->id) selected @endif>{{$depa->nombre}}</option>
											                @endforeach
													</select>
												</div>
											</div>
										</div>

										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Provincia:</label>
												</div>
												<div class="col-sm-6">
													<select class="form-control" id="provincia" name="provincia" style="max-width: 250px " data-link="{{ url('/distritosEdit') }}">
														<option  value="-1" default disab>--Provincia--</option>
															@foreach ($postulante->Departamento->provincias as $provincia)      
											                	<option value="{{$provincia->id}}"  @if($postulante->provincia==$provincia->id) selected @endif>{{$provincia->nombre}}</option>
											                @endforeach												
													</select>
												</div>
											</div>
										</div>

										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Distrito:</label>
												</div>

												<div class="col-sm-6">
													<select class="form-control" id="distrito" name="distrito" style="max-width: 250px">
														<option  value="-1" default>--Distrito--</option>
															@foreach ($postulante->Provincia->distritos as $distrito)      
											                	<option value="{{$distrito->id}}"  @if($postulante->distrito==$distrito->id) selected @endif>{{$distrito->nombre}}</option>
											                @endforeach													
													</select>
												</div>
											</div>
										</div>

										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Direccion de Nacimiento:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{$postulante->direccion_nacimiento}}">
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
													<input type="text" class="form-control" id="pais_nacimiento" name="pais_nacimiento" placeholder="Pais de  Nacimiento" style="max-width: 250px" value="{{$postulante->pais_nacimiento}}">
												</div>		
											</div>
										</div>

										<div class="form-group ">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Ciudad de Nacimiento:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Lugar de Nacimiento" style="max-width: 250px" value="{{$postulante->lugar_nacimiento}}">
												</div>		
											</div>
										</div>		
									@endif
									<div class = "modal fade" id = "confirmationNacimiento" tabindex = "-1" role = "dialog" 
									   aria-labelledby = "myModalLabel" aria-hidden = "true">
									   
									   <div class = "modal-dialog">
									      <div class = "modal-content">
									         
									         <div class = "modal-header">
									            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
													<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
									            </button>
									            
									            <h4 class = "modal-title" id = "myModalLabel">
									               EDITAR SOCIO
									            </h4>
									         </div>
									         
									         <div class = "modal-body">
									            <p>¿Desea guardar los cambios realizados?</p>
									         </div>
									         
									         <div class = "modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
									            
									            <button type = "submit" class = "btn btn-primary">
									               Confirmar
									            </button>
									         </div>
									         
									      </div><!-- /.modal-content -->
									   </div><!-- /.modal-dialog -->
									  
									</div><!-- /.modal -->							
									<br><br>
									<div class="form-group required" >
											<div class="btn-group col-sm-5" ></div>
											
											<div class="btn-group">
												<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationNacimiento" onclick="ventana()" value="Confirmar">
											</div>
											<div class="btn-group">
												<a href="/postulante/index" class="btn btn-info">Retornar</a>
											</div>
									</div>	
								</form>
							</div>
						<!--===================================-->
						@if(Session::get('update')=='familia' || $errors->familia->any())
							<div role="tabpanel" class="tab-pane active" id="seccion3">
						@else
							<div role="tabpanel" class="tab-pane" id="seccion3">
						@endif
								<form method="POST" action="/postulante/{{$postulante->persona->id}}/editFamilia" class="form-horizontal form-border">
									{{method_field('PATCH')}}
<!-- 
									<div class="col-sm-4"></div> -->
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
														<th><div align=center>ELIMINAR</div></th>													
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
													              		<a class="btn btn-info" href="{{url('/postulante/familiar/'.$familiar->id.'/'.$postulante->persona->id)}}"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
													            	</td>
													            	<td>												           
																		<a class="btn btn-info"  title="Eliminar" data-href="{{url('/postulante/'.$familiar->id.'/'.$postulante->id_postulante.'/familiar/delete')}}" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>
													            	</td>		

															</tr>
														@endforeach
													</tbody>
											</table>
											<br><br><br>
											<div class="btn-inline">
												<div class="btn-group col-sm-10"></div>										
												<div class="btn-group ">
													<a href="{{url('postulante/	'.$postulante->persona->id.'/familiar/new')}}" class="btn btn-info" type="submit">Registrar Familiar</a>
												</div>
											</div>
											<br><br><br>								
										</div>		
									</div>
								</form>
							</div>
						<!--===================================-->
						@if(Session::get('update')=='vivienda' || $errors->vivienda->any())
							<div role="tabpanel" class="tab-pane active" id="seccion4">
						@else
							<div role="tabpanel" class="tab-pane" id="seccion4">
						@endif
								<form method="POST" action="/postulante/{{$postulante->persona->id}}/editVivienda" class="form-horizontal form-border">
									{{method_field('PATCH')}}
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="col-sm-4"></div>
									<div class=""> 
										@if ($errors->vivienda->any())
							  				<ul class="alert alert-danger fade in">
							  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  					@foreach ($errors->vivienda->all() as $error)
							  						<li>{{$error}}</li>
							  					@endforeach
							  				</ul>
							  			@endif
										@if(session('cambios-viv'))
											<div class="alert alert-success fade in">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													<strong>¡Éxito!</strong> {{session('cambios-viv')}}
											</div>								
										@endif						  			
									</div>
									<br><br><br>
									<div class="form-group required" >
											<div class="btn-group col-sm-4" ></div>
											<div class="btn-group col-sm-4">
												<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
											</div>


									</div>
										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Departamento:</label>
												</div>
												<div class="col-sm-6">
													<select class="form-control" id="departamento_vivienda" name="departamento_vivienda" style="max-width: 250px" data-link="{{ url('/provincias_viviendaEdit') }}">
														<option value="-1" default>--Departamento--</option>
															@foreach ($departamentos as $depa_vivienda)   
											                	<option value="{{$depa_vivienda->id}}"  @if($postulante->departamento_vivienda==$depa_vivienda->id) selected @endif>{{$depa_vivienda->nombre}}</option>
											                @endforeach
													</select>
												</div>
											</div>
										</div>

										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Provincia:</label>
												</div>
												<div class="col-sm-6">
													<select class="form-control" id="provincia_vivienda" name="provincia_vivienda" style="max-width: 250px " data-link="{{ url('/distritos_viviendaEdit') }}">
														<option  value="-1" default disab>--Provincia--</option>
															@foreach ($postulante->DepartamentoVivienda->provincias as $provincia_vivienda)      
											                	<option value="{{$provincia_vivienda->id}}"  @if($postulante->provincia_vivienda==$provincia_vivienda->id) selected @endif>{{$provincia_vivienda->nombre}}</option>
											                @endforeach												
													</select>
												</div>
											</div>
										</div>

										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Distrito:</label>
												</div>

												<div class="col-sm-6">
													<select class="form-control" id="distrito_vivienda" name="distrito_vivienda" style="max-width: 250px">
														<option  value="-1" default>--Distrito--</option>
															@foreach ($postulante->ProvinciaVivienda->distritos as $distrito_vivienda)      
											                	<option value="{{$distrito_vivienda->id}}"  @if($postulante->distrito_vivienda==$distrito_vivienda->id) selected @endif>{{$distrito_vivienda->nombre}}</option>
											                @endforeach													
													</select>
												</div>
											</div>
										</div>

										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Direccion Vivienda</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Direccion Laboral" style="max-width: 250px" value="{{$postulante->domicilio}}" value="{{old('domicilio')}}">
												</div>		
											</div>
										</div>

										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Referencia Vivienda</label>
												</div>
												<div class="col-sm-6">
													<textarea rows="4" cols="50" id="referencia_vivienda" name="referencia_vivienda" placeholder="Referencia" style="max-width: 820px; max-height: 300px;">{{$postulante->referencia_vivienda}}</textarea>
												</div>		
											</div>
										</div>

										<div class = "modal fade" id = "confirmationVivienda" tabindex = "-1" role = "dialog" 
									   aria-labelledby = "myModalLabel" aria-hidden = "true">
									   
										   	<div class = "modal-dialog">
										      <div class = "modal-content">
										         
										         <div class = "modal-header">
										            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
														<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
										            </button>
										            
										            <h4 class = "modal-title" id = "myModalLabel">
										               EDITAR POSTULANTE
										            </h4>
										         </div>
										         
										         <div class = "modal-body">
										            <p>¿Desea guardar los cambios realizados?</p>
										         </div>
										         
										         <div class = "modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
										            
										            <button type = "submit" class = "btn btn-primary">
										               Confirmar
										            </button>
										         </div>
										         
										     	</div><!-- /.modal-content -->
									   		</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->

										<br><br>
										<div class="form-group required" >
												<div class="btn-group col-sm-5" ></div>
												
												<div class="btn-group">
													<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationVivienda" onclick="ventana()" value="Confirmar">
												</div>
												<div class="btn-group">
													<a href="/postulante/index" class="btn btn-info">Retornar</a>
												</div>
										</div>	
								</form>
							</div>
						<!--===================================-->
						@if(Session::get('update')=='estudio' || $errors->estudio->any())
							<div role="tabpanel" class="tab-pane active" id="seccion5">
						@else
							<div role="tabpanel" class="tab-pane" id="seccion5">
						@endif
								<form method="POST" action="/postulante/{{$postulante->persona->id}}/editEstudio" class="form-horizontal form-border">
									{{method_field('PATCH')}}
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="col-sm-4"></div>
									<div class=""> 
										@if ($errors->estudio->any())
							  				<ul class="alert alert-danger fade in">
							  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  					@foreach ($errors->estudio->all() as $error)
							  						<li>{{$error}}</li>
							  					@endforeach
							  				</ul>
							  			@endif
										@if(session('cambios-est'))
											<div class="alert alert-success fade in">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													<strong>¡Éxito!</strong> {{session('cambios-est')}}
											</div>								
										@endif						  			
									</div>
									<br><br/><br/>
									<div class="form-group required" >
											<div class="btn-group col-sm-4" ></div>
											<div class="btn-group col-sm-4">
												<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
											</div>

									</div>
									<br>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Colegio Primaria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="colegio_primario" name="colegio_primario" placeholder="Colegio de Primaria" value="{{$postulante->colegio_primario}}" >
											</div>	
										</div>
									</div>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Colegio Secundaria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="colegio_secundario" name="colegio_secundario" placeholder="Colegio de Secundaria" value="{{$postulante->colegio_secundario}}" >
											</div>	
										</div>								
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Universidad:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="universidad" name="universidad" placeholder="Universidad" value="{{$postulante->universidad}}" >
											</div>	
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Carrera:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="carrera" name="carrera" placeholder="Carrera" value="{{$postulante->profesion}}" >
											</div>	
										</div>
									</div>

									<!--MODAL CONFIRMACION-->
									<!-- Modal -->
									<div class = "modal fade" id = "confirmationEstudio" tabindex = "-1" role = "dialog" 
									   aria-labelledby = "myModalLabel" aria-hidden = "true">
									   
									   <div class = "modal-dialog">
									      <div class = "modal-content">
									         
									         <div class = "modal-header">
									            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
													<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
									            </button>
									            
									            <h4 class = "modal-title" id = "myModalLabel">
									               EDITAR POSTULANTE
									            </h4>
									         </div>
									         
									         <div class = "modal-body">
									            <p>¿Desea guardar los cambios realizados?</p>
									         </div>
									         
									         <div class = "modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
									            
									            <button type = "submit" class = "btn btn-primary">
									               Confirmar
									            </button>
									         </div>
									         
									      </div><!-- /.modal-content -->
									   </div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									<br><br>
									<div class="form-group required" >
											<div class="btn-group col-sm-5" ></div>
											
											<div class="btn-group">
												<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationEstudio" onclick="ventana()" value="Confirmar">
											</div>
											<div class="btn-group">
												<a href="/postulante/index" class="btn btn-info">Retornar</a>
											</div>
									</div>	
								</form>
							</div>

						@if(Session::get('update')=='trabajo' || $errors->trabajo->any())
							<div role="tabpanel" class="tab-pane active" id="seccion6">
						@else
							<div role="tabpanel" class="tab-pane" id="seccion6">
						@endif
								<form method="POST" action="/postulante/{{$postulante->persona->id}}/editTrabajo" class="form-horizontal form-border">
										{{method_field('PATCH')}}
										<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<div class="col-sm-4"></div>
										<div class=""> 
											@if ($errors->trabajo->any())
								  				<ul class="alert alert-danger fade in">
								  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  					@foreach ($errors->trabajo->all() as $error)
								  						<li>{{$error}}</li>
								  					@endforeach
								  				</ul>
								  			@endif
											@if(session('cambios-trab'))
												<div class="alert alert-success fade in">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong>¡Éxito!</strong> {{session('cambios-trab')}}
												</div>								
											@endif	
										</div>
										<br><br/><br/>
										<div class="form-group required" >
												<div class="btn-group col-sm-4" ></div>
												<div class="btn-group col-sm-4">
													<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
												</div>

										</div>
										<br>
										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Centro de Trabajo:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="centrotrabajo" name="centrotrabajo" placeholder="Centro de Trabajo" value="{{$postulante->centro_trabajo}}" >
												</div>	
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Cargo en Trabajo:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="cargocentrotrabajo" name="cargocentrotrabajo" placeholder="Cargo en Trabajo" value="{{$postulante->cargo_trabajo}}" >
												</div>	
											</div>									
										</div>
										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Direccion Laboral:</label>
												</div>
												<div class="col-sm-6">	
													<input type="text" class="form-control" id="direccionlaboral" name="direccionlaboral" placeholder="Direccion" value="{{$postulante->direccion_laboral}}" >
												</div>	
											</div>
										</div>



										<div class = "modal fade" id = "confirmationTrabajo" tabindex = "-1" role = "dialog" 
									   aria-labelledby = "myModalLabel" aria-hidden = "true">
									   
										   <div class = "modal-dialog">
										      <div class = "modal-content">
										         
										         <div class = "modal-header">
										            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
														<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
										            </button>
										            
										            <h4 class = "modal-title" id = "myModalLabel">
										               EDITAR POSTULANTE
										            </h4>
										         </div>
										         
										         <div class = "modal-body">
										            <p>¿Desea guardar los cambios realizados?</p>
										         </div>
										         
										         <div class = "modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
										            
										            <button type = "submit" class = "btn btn-primary">
										               Confirmar
										            </button>
										         </div>
										         
										      </div><!-- /.modal-content -->
										   </div><!-- /.modal-dialog -->								  
										</div><!-- /.modal -->
										<br><br>
										<div class="form-group required" >
												<div class="btn-group col-sm-5" ></div>
												
												<div class="btn-group">
													<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationTrabajo" onclick="ventana()" value="Confirmar">
												</div>
												<div class="btn-group">
													<a href="/postulante/index" class="btn btn-info">Retornar</a>
												</div>
										</div>	
								</form>
							</div>



						@if(Session::get('update')=='contacto' || $errors->contacto->any())
							<div role="tabpanel" class="tab-pane active" id="seccion7">
						@else
							<div role="tabpanel" class="tab-pane" id="seccion7">
						@endif		

								<form method="POST" action="/postulante/{{$postulante->persona->id}}/editContacto" class="form-horizontal form-border">
									{{method_field('PATCH')}}
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="col-sm-4"></div>
									<div class=""> 
										@if ($errors->contacto->any())
							  				<ul class="alert alert-danger fade in">
							  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  					@foreach ($errors->contacto->all() as $error)
							  						<li>{{$error}}</li>
							  					@endforeach
							  				</ul>
							  			@endif
										@if(session('cambios-cont'))
											<div class="alert alert-success fade in">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													<strong>¡Éxito!</strong> {{session('cambios-cont')}}
											</div>								
										@endif							  			
									</div>
									<br><br/><br/>
									<div class="form-group required" >
											<div class="btn-group col-sm-4" ></div>
											<div class="btn-group col-sm-4">
												<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
											</div>

									</div>

									<br>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Telefono:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="telefono"  maxlength="7" name="telefono_domicilio" placeholder="Telefono de Contacto" value="{{$postulante->telefono_domicilio}}" >
											</div>	
										</div>
									</div>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Telefono Celular:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" maxlength="9" id="celular" name="telefono_celular" placeholder="Celular" value="{{$postulante->telefono_celular}}" >
											</div>	
										</div>									
									</div>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Correo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" value="{{$postulante->persona->correo}}" >
											</div>	
										</div>
									</div>


									<!--MODAL CONFIRMACION-->
									<!-- Modal -->
									<div class = "modal fade" id = "confirmationContacto" tabindex = "-1" role = "dialog" 
									   aria-labelledby = "myModalLabel" aria-hidden = "true">
									   
									   <div class = "modal-dialog">
									      <div class = "modal-content">
									         
									         <div class = "modal-header">
									            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
													<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
									            </button>
									            
									            <h4 class = "modal-title" id = "myModalLabel">
									               EDITAR POSTULANTE
									            </h4>
									         </div>
									         
									         <div class = "modal-body">
									            <p>¿Desea guardar los cambios realizados?</p>
									         </div>
									         
									         <div class = "modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
									            
									            <button type = "submit" class = "btn btn-primary">
									               Confirmar
									            </button>
									         </div>
									         
									      </div><!-- /.modal-content -->
									   </div><!-- /.modal-dialog -->
									  
									</div><!-- /.modal -->
									<br><br>
									<div class="form-group required" >
											<div class="btn-group col-sm-5" ></div>
											
											<div class="btn-group">
												<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationContacto" onclick="ventana()" value="Confirmar">
											</div>
											<div class="btn-group">
												<a href="/postulante/index" class="btn btn-info">Retornar</a>
											</div>
									</div>						
								</form>
							</div>



					</div>
				</div>
			</div>
		</div>

@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/bootstrap-datepicker.js')!!}
	{!!Html::script('js/MisScripts.js')!!}

	<script>$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} })</script>
	{!!Html::script('js/bootstrap-datepicker.js')!!}
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>


	<script>
		$(document).ready(function(){
			$("#departamento").change(function(event){
				document.getElementById("provincia").disabled = false;
				document.getElementById("distrito").disabled = true;
			    $("#distrito").empty();
			    $("#distrito").append("<option  value='-1' default>--Distrito--</option>");
				var url = $(this).attr("data-link");
				$departamento_id=event.target.value;
							//alert($departamento_id);
				//alert(url);
				$.ajax({
			        url: "provinciasEdit",
			        type:"POST",
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },			        
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');
			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $departamento_id},
			        success:function(data){
			        	$("#provincia").empty();
			        	$("#provincia").append("<option  value='-1' default>--Provincia--</option>");
			        	$.each(data,function(index,elememt){
			        		
			        		$("#provincia").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			           		 console.log("mensaje que quieras");
				       	});
				       },error:function(){ 
				           alert("error!!!!");
				       }
				   }); //end of ajax
			});


			$("#provincia").change(function(event){
				document.getElementById("distrito").disabled = false;
				var url = $(this).attr("data-link");
				$provincia_id=event.target.value;
							//alert($provincia_id);
				//alert(url);
				//alert($provincia_id);
				
				$.ajax({
			        url: "distritosEdit",
			        type:"POST",
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },				        
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');
			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $provincia_id},
			        success:function(data){
			        	$("#distrito").empty();
			        	$("#distrito").append("<option  value='-1' default>--Distrito--</option>");
			        	$.each(data,function(index,elememt){
								//alert(elememt.id);
				        		//alert(element.nombre);
			        		$("#distrito").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			        	});
				            //alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});
		});

	</script>


		<script>
		$(document).ready(function(){
			$("#departamento_vivienda").change(function(event){
				document.getElementById("provincia_vivienda").disabled = false;
				document.getElementById("distrito_vivienda").disabled = true;
			    $("#distrito_vivienda").empty();
			    $("#distrito_vivienda").append("<option  value='-1' default>--Distrito--</option>");
				var url = $(this).attr("data-link");
				$departamento_id=event.target.value;
			           		 
				//			alert($departamento_id);
				//alert(url);
				$.ajax({
			        url: "provincias_viviendaEdit",
			        type:"POST",
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },			        
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');
			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $departamento_id},
			        success:function(data){
			        	$("#provincia_vivienda").empty();
			        	$("#provincia_vivienda").append("<option  value='-1' default>--Provincia--</option>");
			        	$.each(data,function(index,elememt){
			        		
			        		$("#provincia_vivienda").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			           		 console.log(elememt);
				       	});
				       },error:function(){ 
				           alert("error!!!!");
				       }
				   }); //end of ajax
			});


			$("#provincia_vivienda").change(function(event){
				document.getElementById("distrito_vivienda").disabled = false;
				var url = $(this).attr("data-link");
				$provincia_id=event.target.value;
							//alert($provincia_id);
				//alert(url);
				//alert($provincia_id);
				
				$.ajax({
			        url: "distritos_viviendaEdit",
			        type:"POST",
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },				        
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');
			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $provincia_id},
			        success:function(data){
			        	$("#distrito_vivienda").empty();
			        	$("#distrito_vivienda").append("<option  value='-1' default>--Distrito--</option>");
			        	$.each(data,function(index,elememt){
								//alert(elememt.id);
				        		//alert(element.nombre);
			        		$("#distrito_vivienda").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			        	});
				            //alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});
		});

	</script>




	<script>
		function ventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 1;
		}
		function cerrarventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 3;
		}
  	</script>

  	<script>
		function es_peruano(){
			document.getElementById('doc_identidad').disabled = false; 
			document.getElementById('carnet_extranjeria').disabled = true;
			document.getElementById('carnet_extranjeria').value = '';

			document.getElementById('nacimiento_peruano').style.display="block";
			document.getElementById('nacimiento_extranjero').style.display="none";
		}

		function es_extranjero(){
			document.getElementById('carnet_extranjeria').disabled = false; 
			document.getElementById('doc_identidad').disabled = true; 
			document.getElementById('doc_identidad').value = '';

			document.getElementById('nacimiento_peruano').style.display="none";
			document.getElementById('nacimiento_extranjero').style.display="block"; 
		}
	</script>

	<script>
		$(document).ready(function(){
			$(function(){
				$('.datepicker').datepicker({
					format: "dd/mm/yyyy",
			        language: "es",
			        autoclose: true,
			        //beforeShowDay:function (date){return false}
				});

			});

		});
		$('.datepicker').on('changeDate', function(ev){
			    $(this).datepicker('hide');
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
	        <p>¿Está seguro que desea eliminar a este persona de su lista de Familiares?</p>
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