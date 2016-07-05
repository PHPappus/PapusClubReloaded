
<div class="form-group required">
	<label for="persona_id" class="control-label col-sm-4 col-sm-offset-1 lead"><strong>Nombre</strong></label>
	<div class="col-sm-4">	
			<input type="text" id="name" name="name" class="form-control" placeholder="Nombre del usuario" readonly="true" value="{{old('name')}}">
	</div>
	<a class="btn btn-info" name="buscarPersona" href="#"  title="Buscar Persona" data-toggle="modal" data-target="#modalBuscar"><i name="buscarPersona" class="glyphicon glyphicon-search"></i></a>
	<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="persona_id" name="persona_id" placeholder="ID de la Persona" value="{{old('persona_id')}}" style="display:none">
</div>
<div class="form-group required">
	<label for="email" class="control-label col-sm-4 col-sm-offset-1 lead"><strong>Correo:</strong></label>
	<div class="col-sm-4">
			{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa su correo electrónico'])!!}
	</div>
</div>
<div class="form-group required">
	<label for="password" class="control-label col-sm-4 col-sm-offset-1 lead"><strong>Contraseña:</strong></label>
	<div class="col-sm-4">
		{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su contraseña'])!!}	
	</div>
</div>
<div class="form-group required">
	<label for="password" class="control-label col-sm-4 col-sm-offset-1 lead"><strong>Confirmar Contraseña</strong></label>
	<div class="col-sm-4">
		{!!Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Ingrese nuevamente su contraseña'])!!}	
	</div>
</div>
<div class="form-group required">
		<label for="perfil_id" class="control-label col-sm-3 col-sm-offset-2 lead"><strong>Perfil de Usuario:</strong></label>
		<div class="col-sm-5">
			<select id="perfil_id" class="form-control inputmodify" name="perfil_id" type="perfil_id" style="max-width: 280px " >
				<option value=-1 default>Seleccione el perfil</option>
					@foreach ($perfiles as $perfil)   
						@if($perfil->description!='PUBLICO')   
	                	<option value="{{$perfil->id}}">{{$perfil->description}}</option>
	                	@endif
	                @endforeach
			</select>
		</div>	
</div>
