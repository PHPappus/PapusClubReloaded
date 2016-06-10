
<div class="form-group text-left">
		<label for="Nombre" class="control-label col-sm-3 col-sm-offset-2 lead"><strong>Nombre:</strong></label>
		<div class="col-sm-5">
			{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
		</div>
</div>
<div class="form-group">
	<label for="email" class="control-label col-sm-3 col-sm-offset-2 lead"><strong>Correo:</strong></label>
	<div class="col-sm-5">
			{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa su correo electrónico'])!!}
	</div>
	
</div>
<div class="form-group">
	<label for="password" class="control-label col-sm-3 col-sm-offset-2 lead"><strong>Contraseña:</strong></label>
	<div class="col-sm-5">
		{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su contraseña'])!!}	
	</div>
</div>
<div class="form-group">
		<label for="perfil_id" class="control-label col-sm-3 col-sm-offset-2 lead"><strong>Perfil de Usuario:</strong></label>
		<div class="col-sm-5">
			<select id="perfil_id" class="form-control inputmodify" name="perfil_id" type="perfil_id" style="max-width: 250px " >
				<option value="-1" default>Seleccione el perfil</option>
					@foreach ($perfiles as $perfil)      
	                	<option value="{{$perfil->id}}">{{$perfil->description}}</option>
	                @endforeach
			</select>
		</div>	
</div>
