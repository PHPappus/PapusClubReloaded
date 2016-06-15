
<div class="form-group required">
		<label for="Nombre" class="control-label col-sm-4 col-sm-offset-1 lead"><strong>Nombre:</strong></label>
		<div class="col-sm-4">
			{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
		</div>
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
		<div class="text-danger">{!!$errors->first('password_confirmation')!!}</div>
	</div>
</div>
<div class="form-group required">
		<label for="perfil_id" class="control-label col-sm-3 col-sm-offset-2 lead"><strong>Perfil de Usuario:</strong></label>
		<div class="col-sm-5">
			<select id="perfil_id" class="form-control inputmodify" name="perfil_id" type="perfil_id" style="max-width: 280px " >
				<option value="-1" default>Seleccione el perfil</option>
					@foreach ($perfiles as $perfil)      
	                	<option value="{{$perfil->id}}">{{$perfil->description}}</option>
	                @endforeach
			</select>
		</div>	
</div>
