<?php
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',

]);*/

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('login2', 'FrontController@login2');*/
Route::get('/', 'FrontController@home');
/*
Route::get('/{nombre}', function ($nombre) {
     return view($nombre);
});*/


Route::group(['middleware' => ['auth']], function () {
	Route::get('cuenta','UsuarioController@cuenta');
	Route::get('password/change','UsuarioController@changepassword');
	Route::post('password/change','UsuarioController@confirmchangepassword');
});



//Socio
Route::group(['middleware' => ['auth', 'socio']], function () {
	Route::resource('socio','SocioController');
	Route::get('ambientes-s','SocioController@ambientes');
	Route::get('anular-reserva-ambiente-s','SocioController@anularReservaAmbiente');
	Route::get('anular-reserva-ambiente-b-s','SocioController@anularReservaAmbienteB');
	Route::get('pagos-s','SocioController@pagos');
	//Socio.talleres  : INSCRIPCION DE TALLERES
	Route::get('talleres/index','InscriptionTallerController@index');
	Route::post('talleres/index','InscriptionTallerController@filterTalleres');
	Route::get('talleres/{id}/show','InscriptionTallerController@show');
	Route::get('talleres/{id}/confirm','InscriptionTallerController@confirmInscription');
	Route::post('talleres/{id}/confirm/save','InscriptionTallerController@makeInscriptionToUser');
	Route::get('talleres/{id}/delete', 'InscriptionTallerController@removeInscriptionToUser');
	Route::get('talleres/mis-inscripciones','InscriptionTallerController@misinscripciones');
		//Socio.bungalows
	Route::get('bungalows-s','SocioController@bungalow');
	Route::get('reserva-bungalows-s','SocioController@bungalowReserva');
	Route::get('reserva-bungalows-b-s','SocioController@bungalowReservaB');
	//Socio.atividades : INSCRIPCION DE ACTIVIDADES
	Route::get('inscripcion-actividad/inscripcion-actividades', 'InscriptionActividadController@inscriptionActividad'); // REservar
	Route::get('inscripcion-actividad/{id}/confirmacion-inscripcion-actividades', 'InscriptionActividadController@storeInscriptionActividad');
	Route::post('inscripcion-actividad/inscripcion-actividades','InscriptionActividadController@filterActividades');
	Route::post('inscripcion-actividad/{id}/confirmacion-inscripcion-actividades/confirm','InscriptionActividadController@makeInscriptionToPersona');

	Route::get('inscripcion-actividad/mis-inscripciones','InscriptionActividadController@misinscripciones');
	Route::get('inscripcion-actividad/{id}/delete', 'InscriptionActividadController@removeInscriptionToPersona');


	//Trámites Socio
	Route::get('traspaso/','SocioController@traspmembresia');
	Route::post('traspaso/nuevo','SocioController@storeTraspaso');
	Route::get('mis-multas/','SocioController@misMultas');


	//RESERVA DE AMBIENTES
	Route::get('reservar-ambiente/reservar-bungalow', 'ReservarAmbienteController@reservarBungalow');
	Route::post('reservar-ambiente/reservar-bungalow/search', 'ReservarAmbienteController@reservarBungalowFiltrados'); 
	Route::get('reservar-ambiente/reservar-otros-ambientes', 'ReservarAmbienteController@reservarOtrosAmbientes'); // REservar otros ambientes distinto de bungalows
	Route::post('reservar-ambiente/reservar-otros-ambientes/search','ReservarAmbienteController@reservarOtrosAmbientesFiltrados');
	Route::get('reservar-ambiente/{id}/new-reserva-bungalow', 'ReservarAmbienteController@createBungalow');//
	Route::post('reservar-ambiente/{id}/confirmacion-reserva-bungalow', 'ReservarAmbienteController@storeBungalow');//confirmacion para la reserva del bungalos
	Route::get('reservar-ambiente/{id}/new-reserva-otro-ambiente', 'ReservarAmbienteController@createOtroTipoAmbiente');//
	Route::post('reservar-ambiente/{id}/confirmacion-reserva-otro-ambiente', 'ReservarAmbienteController@storeOtroTipoAmbiente');//confirmacion para la reserva de otros ambientes distintos de bungalows
	Route::get('reservar-ambiente/searchSocio', 'SocioController@searchSocio');
	//Lista de Reservas Hechas
	Route::get('reservar-ambiente/lista-reservas', 'ReservarAmbienteController@listaReservas');
	Route::get('reservar-ambiente/{id}/show', 'ReservarAmbienteController@showReserva'); // Detalle del la reserva hecha por el socio
	Route::get('reservar-ambiente/{id}/delete','ReservarAmbienteController@eliminarReserva');
	//PAGOS (deudas del socio)
	Route::get('pagos/facturacion-socio/','PagosController@listarFacturacionSocio');//se lista a los socios
	Route::get('pagos-del-socio/{id}/show', 'PagosController@showAlSocio'); // Detalle del pago
		
	
});



//Administrados de registros
Route::group(['middleware' => ['auth', 'adminregistros']], function () {
	
	Route::resource('admin-registros','AdminRegistrosController');
	Route::get('ambientes-ar','AdminRegistrosController@ambientes');
	Route::get('registrar-ambiente','AdminRegistrosController@registrar');
	Route::get('modificar-ambiente','AdminRegistrosController@modificar');


	//MANTENIMIENTO DE PROMOCIONES
	Route::get('promociones/index', 'PromocionesController@index');
	Route::get('promociones/new', 'PromocionesController@create');
	Route::post('promociones/new/promocion', 'PromocionesController@store');
	Route::get('promociones/{id}', 'PromocionesController@edit');
	Route::post('promociones/{id}/edit', 'PromocionesController@update');
	Route::get('promociones/{id}/delete', 'PromocionesController@destroy');
	Route::get('promociones/{id}/show', 'PromocionesController@show');

	// Mantenimiento de Servicios Lol by Brayan
	Route::get('servicios/index', 'ServiciosController@index');	
	Route::get('servicios/new', 'ServiciosController@create');
	Route::post('servicios/new/servicio', 'ServiciosController@store');
	Route::get('servicios/{id}', 'ServiciosController@edit');
	Route::post('servicios/{id}/edit', 'ServiciosController@update');
	Route::get('servicios/{id}/delete', 'ServiciosController@destroy');
	Route::get('servicios/{id}/show', 'ServiciosController@show');	


	//MANTENIMIENTO DE TALLERES
	Route::get('taller/','TallerController@index');
	Route::get('taller/new','TallerController@create');
	Route::get('taller/{id}/editar','TallerController@edit');
	Route::get('taller/{id}/','TallerController@show');
	Route::post('taller/new/save','TallerController@store');
	Route::patch('taller/{id}/edit','TallerController@update');
	Route::get('taller/{taller}/delete', 'TallerController@destroy');


	///MANTENIMIENTO DE ACTIVIDADES
	Route::get('actividad/index', 'ActividadController@index');
	Route::get('actividad/new', 'ActividadController@create');
	Route::post('actividad/new/actividad', 'ActividadController@store');
	Route::get('actividad/{id}', 'ActividadController@edit');
	Route::post('actividad/{id}/edit', 'ActividadController@update');
	Route::get('actividad/{id}/delete', 'ActividadController@destroy');
	Route::get('actividad/{id}/show', 'ActividadController@show');
	Route::post('actividad/new/{id}/tipoactividad', 'ActividadController@storeTipoActividad');
	Route::get('actividad/searchReservas', 'ActividadController@searchReservas');/*lista todas las reservas*/	
	Route::get('actividad/{id}/select', 'ActividadController@select');/*lleva a la pantalla principal de registrar*/

	//MANTENIMIENTO DE AMBIENTES
	Route::get('ambiente/index', 'AmbienteController@index');
	Route::get('ambiente/search', 'AmbienteController@search');/*PAra buscar el ambiente y seleccionarlo para ACtividad*/	
	Route::get('ambiente/new', 'AmbienteController@create');
	Route::post('ambiente/new/ambiente', 'AmbienteController@store');
	Route::get('ambiente/{id}', 'AmbienteController@edit');
	Route::post('ambiente/{id}/edit', 'AmbienteController@update');
	Route::get('ambiente/{id}/delete', 'AmbienteController@destroy');
	Route::get('ambiente/{id}/show', 'AmbienteController@show');
	Route::get('ambiente/{id}/select', 'AmbienteController@select');/*Para el seleccionar ambiente desde  Actividad*/
	Route::post('ambiente/new/tipoambiente', 'AmbienteController@storeTipoAmbiente');

});

//Gerente
Route::group(['middleware' => ['auth', 'gerente']], function () {
	Route::resource('gerente','GerenteController');
});

//Administrados de pagos
Route::group(['middleware' => ['auth', 'adminpagos']], function () {
	Route::resource('admin-pagos','AdminPagosController');


	//MATENIMIENTO DE PAGOS
	Route::get('pagos/pago-seleccionar-socio/','PagosController@seleccionarSocio');//se lista a los socios
	Route::get('pagos/{id}/selectSocio/', 'PagosController@selectSocio');//lista las deudas de los socios
	Route::get('pagos/registrar-pago/{id}', 'PagosController@registrarPago');
    Route::post('pagos/registrar-pago/update/{id}', 'PagosController@storePago');
    Route::get('pagos/{id}/show', 'PagosController@showSocio'); // Detalle del pago
    /*Route::post('pagos/{id}/createPago', 'PagosController@createPago');*/
});



//Administrador general
Route::group(['middleware' => ['auth', 'admingeneral']], function () {
	Route::resource('admin-general','AdminGeneralController');
/*	Route::get('postulante-al-admin','AdminGeneralController@postulante');*/



	//MANTENIMIENTO DE MULTAS
	Route::get('multa/','MultaController@index');
	Route::get('multa/all','MultaController@indexAll');
	Route::get('multa/new','MultaController@create');
	Route::get('multa/{id}/','MultaController@show');
	Route::post('multa/new/save','MultaController@store');
	Route::get('multa/{id}/editar','MultaController@edit');
	Route::get('multa/{multa}/delete', 'MultaController@destroy');
	Route::get('multa/{id}/activate','MultaController@activate');
	Route::patch('multa/{id}/edit','MultaController@update');


	//MANTENIMIENTO DE SEDES 
	Route::post('sedes/test', function()
	{
	    return 'Success! ajax in laravel 5';
	});
	Route::post('sedes/provincias', function(){
		$dep_id=Input::get('id');
    	return papusclub\Models\Provincia::where('departamento_id','=', $dep_id)->get();
	});
	Route::post('sedes/distritos', function(){
		$prov_id=Input::get('id');
    	return papusclub\Models\Distrito::where('provincia_id','=', $prov_id)->get();
	});
	Route::get('sedes/index', 'SedesController@index');
	Route::get('sedes/new', 'SedesController@create');
	Route::get('sedes/contactos', 'SedesController@contactosSede');
	Route::post('sedes/new/sede', 'SedesController@store');
	Route::get('sedes/{id}', 'SedesController@edit');
	Route::post('sedes/{id}/edit', 'SedesController@update');
	Route::get('sedes/{id}/delete', 'SedesController@destroy');
	Route::get('sedes/{id}/show', 'SedesController@show');
	


	

	// Agregar Servicios a las sedes2
	 Route::get('select/sede', 'SedesController@indexselecttoservicio');
	  Route::get('sedes/{id}/agregarservicios', 'SedesController@agregarservicios');
	  Route::post('sedes/{id}/agregarservicios/store','SedesController@storeservicios');
	  Route::get('sedes/{id}/verservicios', 'SedesController@indexserviciosdesede');
	
	//MANTENIMIENTO DE PROVEEDORES
	Route::get('proveedor/index/', 'ProveedorController@index');
	Route::get('proveedor/new', 'ProveedorController@create');
	Route::post('proveedor/new/proveedor', 'ProveedorController@store');
	Route::get('proveedor/{id}', 'ProveedorController@edit');
	Route::post('proveedor/{id}/edit', 'ProveedorController@update');
	Route::get('proveedor/{id}/delete', 'ProveedorController@destroy');
	Route::get('proveedor/{id}/show', 'ProveedorController@show');
	//MANTENIMIENTO DE PRODUCTOS
	Route::get('producto/index', 'ProductoController@index');
	Route::get('producto/new', 'ProductoController@create');
	Route::post('producto/new/producto', 'ProductoController@store');
	Route::get('producto/{id}', 'ProductoController@edit');
	Route::post('producto/{id}/edit', 'ProductoController@update');
	Route::get('producto/{id}/delete', 'ProductoController@destroy');
	Route::get('producto/{id}/show', 'ProductoController@show');
	Route::post('producto/new/tipoproducto', 'ProductoController@storeTipoProducto');
	//VENTA DE PRODUCTOS
	Route::get('venta-producto/index', 'VentaProductoController@index');
	Route::get('venta-producto/new', 'VentaProductoController@create');
	Route::post('venta-producto/new/venta-producto', 'VentaProductoController@store');
	Route::get('venta-producto/{id}', 'VentaProductoController@edit');
	Route::post('venta-producto/{id}/edit', 'VentaProductoController@update');
	Route::get('venta-producto/{id}/delete', 'VentaProductoController@destroy');
	Route::get('venta-producto/{id}/show', 'VentaProductoController@show');
	Route::get('venta-producto/new/venta-producto/{id}', 'VentaProductoController@createVentaProducto');
	Route::post('venta-producto/new/venta-producto/add', 'VentaProductoController@storeVentaProducto');
	Route::get('venta-producto/{id}', 'VentaProductoController@editProducto');
	Route::post('venta-producto/{id}/edit', 'VentaProductoController@updateProducto');
	Route::get('venta-producto/{id}/deleteProducto', 'VentaProductoController@destroyProducto');
	Route::get('venta-producto/{id}/back', 'VentaProductoController@back');
	Route::get('venta-producto/{id}/cancel', 'VentaProductoController@cancel');
	//INGRESO DE PRODUCTOS
	Route::get('ingreso-producto/index', 'IngresoProductoController@index');

	//Inscribirse en Sorteo
	Route::get('sorteo/inscripcion','SorteoController@indexInscripcion');
	Route::post('sorteo/inscripcion/store','SorteoController@inscripcionStore');
	Route::post('sorteo/inscripcion/delete','SorteoController@inscripcionDelete');
	Route::get('sorteo/inscripcion/mis_sorteos','SorteoController@indexMisInscripciones');

	//MANTENIMIENTO DE SORTEO
	Route::get('sorteo/index/{id}/ejecutar','SorteoController@loscohibaspapa');
	Route::get('sorteo/index','SorteoController@index');
	Route::get('sorteo/new','SorteoController@create');	
	Route::post('sorteo/new/sorteo','SorteoController@store');
	Route::get('sorteo/{id}','SorteoController@edit');
	Route::post('sorteo/{id}/edit', 'SorteoController@update');
	Route::get('sorteo/editSorteo/{id}','SorteoController@showEditSorteo');
	Route::get('sorteo/{id}/delete', 'SorteoController@destroy');
	Route::get('sorteo/{id}/nuke', 'SorteoController@nuke');
	Route::get('sorteo/{id}/atras', 'SorteoController@atras');
	Route::get('sorteo/{id}/show', 'SorteoController@show');


	//Transaccional Sorteo
	Route::get('sorteo/new/sorteo/bungalows/{id}','SorteoController@bungalows');
	Route::post('sorteo/new/sorteo/bungalows/{id}/store','SorteoController@storeBungalows');
		//Modificar Sorteo
		Route::get('sorteo/edit/remove/sorteo/bungalows/{id}','SorteoController@removebungalows');
		Route::post('sorteo/new/sorteo/bungalows/{id}/remove','SorteoController@removeCheckedBungalows');
		//Agregar Sorteo


	//MANTENIMIENTO DE MEMBRESIA
	Route::get('membresia/','MembresiaController@index');
	Route::get('membresia/all','MembresiaController@indexAll');
	Route::get('membresia/new','MembresiaController@create');
	Route::get('membresia/{id}/','MembresiaController@show');
	Route::post('membresia/new/save','MembresiaController@store');
	Route::get('membresia/{id}/editar','MembresiaController@edit');
	Route::get('membresia/{membresia}/delete', 'MembresiaController@destroy');
	Route::get('membresia/{id}/activate','MembresiaController@activate');
	Route::patch('membresia/{id}/edit','MembresiaController@update'); 
		

	
	

	

});


//Administrador de Persona
Route::group(['middleware' => ['auth', 'adminpersona']], function () {
	Route::resource('admin-persona','AdminPersonaController');

	//ASIGNAR MULTAS A SOCIOS
	Route::resource('usuario','UsuarioController');
	Route::get('multas-s/','SocioAdminController@indexRegMulta');
	Route::post('multas-s/save','SocioAdminController@storeMulta');

	//EVALUAR TRASPASO DE MEMBRESIA
	Route::get('traspasos-p/','SocioAdminController@indexTraspasos');
	Route::get('traspaso/{id}/ver','SocioAdminController@showTraspaso');
	Route::post('traspaso/new/save','SocioAdminController@validarTraspaso');
	Route::get('traspaso/{id}/rechazar', 'SocioAdminController@cancelarTraspaso');

	//MANTENIMIENTO DE TRABAJADOR
	Route::get('trabajador/index','TrabajadorController@index');//ya
	Route::get('trabajador/new','TrabajadorController@registrar');//ya
	Route::post('trabajador/new/trabajador', 'TrabajadorController@store');//ya
	Route::get('trabajador/{id}','TrabajadorController@edit');//ya
	Route::post('trabajador/{id}/edit', 'TrabajadorController@update');
	Route::get('trabajador/{id}/delete', 'TrabajadorController@destroy');
	Route::get('trabajador/{id}/show', 'TrabajadorController@show');//ya

		//MANTENIMIENTO DE POSTULANTE
	Route::get('postulante/index','PostulanteController@index');//ya
	Route::get('postulante/new','PostulanteController@registrar');//ya
	Route::post('postulante/new/postulante', 'PostulanteController@store');//ya
	Route::get('postulante/{id}','PostulanteController@edit');//
	Route::get('postulante/{id}/delete', 'PostulanteController@destroy');
	Route::get('postulante/{id}/show', 'PostulanteController@show');//

	/*editar*/
	Route::patch('postulante/{id}/editBasico','PostulanteController@updateBasico');
	Route::patch('postulante/{id}/editNacimiento','PostulanteController@updateNacimiento');
	Route::patch('postulante/{id}/editEstudio','PostulanteController@updateEstudio');
	Route::patch('postulante/{id}/editTrabajo','PostulanteController@updateTrabajo');
	Route::patch('postulante/{id}/editContacto','PostulanteController@updateContacto');
	
/*	Route::patch('Socio/{id}/editMembresia','SocioAdminController@updateMembresia');*/

	//Route::get('/provincias','PostulanteController@getProvincias');
	
	Route::post('postulante/test', function()
	{
	    return 'Success! ajax in laravel 5';
	});
	/*Ajax para el registro de nacimiento en registrar postulante*/
	Route::post('postulante/provincias', function(){
		$dep_id=Input::get('id');
    	return papusclub\Models\Provincia::where('departamento_id','=', $dep_id)->get();
	});
	Route::post('postulante/distritos', function(){
		$prov_id=Input::get('id');
    	return papusclub\Models\Distrito::where('provincia_id','=', $prov_id)->get();
	});

	/*Ajax para el registro de vivienda en registrar postulante*/
	Route::post('postulante/provincias_vivienda', function(){
		$dep_id=Input::get('id');
    	return papusclub\Models\Provincia::where('departamento_id','=', $dep_id)->get();
	});
	Route::post('postulante/distritos_vivienda', function(){
		$prov_id=Input::get('id');
    	return papusclub\Models\Distrito::where('provincia_id','=', $prov_id)->get();
	});

	/*===============================================*/

	/*Ajax para que funcion los list de departamento en el editar*/
	Route::post('postulante/provinciasEdit', function(){
		$dep_id=Input::get('id');
    	return papusclub\Models\Provincia::where('departamento_id','=', $dep_id)->get();
	});
	Route::post('postulante/distritosEdit', function(){
		$prov_id=Input::get('id');
    	return papusclub\Models\Distrito::where('provincia_id','=', $prov_id)->get();
	});
	//Route::get('api/repairdropdown', 'UbicacionController@dropdown');


	//MANTENIMIENTO DE SOCIO
	Route::get('Socio/','SocioAdminController@index');
	Route::get('Socio/all','SocioAdminController@indexAll');
	Route::get('Socio/{id}/','SocioAdminController@show');
	Route::get('Socio/{id}/editar','SocioAdminController@edit');
	Route::get('Socio/{socio}/delete', 'SocioAdminController@destroy');
	Route::get('Socio/{id}/activate','SocioAdminController@activate');

	/*invitado*/
	Route::get('Socio/{id}/invitado/new','SocioAdminController@createInvitado');
	Route::post('Socio/{id}/invitado/save','SocioAdminController@storeInvitado');
	Route::get('Socio/{id}/invitado/delete','SocioAdminController@deleteInvitado');
	Route::get('Socio/invitado/{id}/','SocioAdminController@detailInvitado');
		/*Departamento, provincia, distrito*/
		Route::post('Socio/{id}/invitado/provincias', function(){
			$dep_id=Input::get('id');
	    	return papusclub\Models\Provincia::where('departamento_id','=', $dep_id)->get();
		});
		Route::post('Socio/{id}/invitado/distritos', function(){
			$prov_id=Input::get('id');
	    	return papusclub\Models\Distrito::where('provincia_id','=', $prov_id)->get();
		});
	/**/

	/*editar*/
	Route::patch('Socio/{id}/editBasico','SocioAdminController@updateBasico');
	Route::patch('Socio/{id}/editNacimiento','SocioAdminController@updateNacimiento');
	Route::patch('Socio/{id}/editEstudio','SocioAdminController@updateEstudio');
	Route::patch('Socio/{id}/editTrabajo','SocioAdminController@updateTrabajo');
	Route::patch('Socio/{id}/editContacto','SocioAdminController@updateContacto');
	Route::patch('Socio/{id}/editMembresia','SocioAdminController@updateMembresia');

	/*Departamento, provincia, distrito*/
	Route::post('Socio/{id}/provincias', function(){
		$dep_id=Input::get('id');
    	return papusclub\Models\Provincia::where('departamento_id','=', $dep_id)->get();
	});
	Route::post('Socio/{id}/distritos', function(){
		$prov_id=Input::get('id');
    	return papusclub\Models\Distrito::where('provincia_id','=', $prov_id)->get();
	});

	



	

});
//Administrador de Reserva
Route::group(['middleware' => ['auth', 'adminreserva']], function () {
	Route::resource('admin-reserva','AdminReservaController');


	//RESERVA DE AMBIENTES
	Route::get('reservar-ambiente/reservar-bungalow-adminR', 'ReservarAmbienteController@reservarBungalowAdminR'); // REservar Bungalows
	Route::post('reservar-ambiente/reservar-bungalow-adminR/search-adminR', 'ReservarAmbienteController@reservarBungalowFiltradosAdminR');
	Route::get('reservar-ambiente/{id}/deleteBungalowAdminR','ReservarAmbienteController@eliminarReservaBungalowAdminR');
	Route::get('reservar-ambiente/{id}/deleteOtrosAdminR','ReservarAmbienteController@eliminarReservaOtrosAdminR');


	Route::get('reservar-ambiente/reservar-otros-ambientes-adminR', 'ReservarAmbienteController@reservarOtrosAmbientesAdminR'); // REservar otros ambientes distinto de bungalows
	Route::post('reservar-ambiente/reservar-otros-ambientes/search-adminR','ReservarAmbienteController@reservarOtrosAmbientesFiltradosAdminR');
	
	Route::get('reservar-ambiente/{id}/new-reserva-bungalow-adminR', 'ReservarAmbienteController@createBungalowAdminR');//
	Route::post('reservar-ambiente/{id}/confirmacion-reserva-bungalow-adminR', 'ReservarAmbienteController@storeBungalowAdminR');//confirmacion para la reserva del bungalos
	Route::get('reservar-ambiente/{id}/new-reserva-otro-ambiente-adminR', 'ReservarAmbienteController@createOtroTipoAmbienteAdminR');//
	Route::post('reservar-ambiente/{id}/confirmacion-reserva-otro-ambiente-adminR', 'ReservarAmbienteController@storeOtroTipoAmbienteAdminR');//confirmacion para la reserva de otros ambientes distintos de bungalows
	Route::get('reservar-ambiente/searchSocio-adminR', 'SocioController@searchSocioAdminR');

	//para consultar las reservas y poder cancelarlas
	Route::get('reservar-ambiente/consultar-otros-ambientes-adminR', 'ReservarAmbienteController@consultarReservaOtroAmbienteAdminR'); 
	Route::get('reservar-ambiente/consultar-bungalow-adminR', 'ReservarAmbienteController@consultarReservaBungalowAdminR'); 
});
//Control de ingresos
	Route::group(['middleware' => ['auth', 'controlingresos']], function () {
	Route::resource('control-ingresos','ControlIngresosController');
	Route::get('ingreso-personal','ControlIngresosController@indexpersonal');
	Route::post('/resultado-busqueda-personal','ControlIngresosController@buscarpersonal');
	Route::post('/marcar-ingreso-personal','ControlIngresosController@ingresopersonal');

	route::get('ingreso-terceros','ControlIngresosController@indextercero');
	Route::post('/resultado-busqueda-tercero','ControlIngresosController@buscartercero');
	Route::post('/marcar-ingreso-tercero','ControlIngresosController@ingresotercero');

	route::get('ingreso-socio','ControlIngresosController@indexsocio');
	Route::post('/resultado-busqueda-socio','ControlIngresosController@buscarsocio');
	Route::post('/marcar-ingreso-socio','ControlIngresosController@ingresosocio');
});

//Publico
	Route::group(['middleware' => ['auth', 'publico']], function () {
	Route::resource('public','PublicoController');
});

/*Route::get('sede-a','SedesController@index');
Route::get('newsede-a','SedesController@create');
Route::get('editsede-a','SedesController@edit');
*/


Route::get('futbol', 'FrontController@futbol');
Route::get('historia-papusclub', 'FrontController@historia_papusclub');
Route::get('historia-papusclub-ver-mas', 'FrontController@historia_papusclub_ver_mas');
Route::get('historia-sede-callao', 'FrontController@historia_sede_callao');
Route::get('historia-sede-callao-ver-mas', 'FrontController@historia_sede_callao_ver_mas');
Route::get('reserva-bungalow', 'FrontController@reserva_bungalow');
Route::get('reserva-bungalow-busqueda', 'FrontController@reserva_bungalow_busqueda');
Route::get('registrar-concesionaria-al','FrontController@registrar_concesionaria_al');
Route::get('registrar-precio-pref-bungalows-al','FrontController@registrar_precio_pref_bungalows_al');
Route::get('registrar-nuevo-producto-al','FrontController@registrar_nuevo_producto_al');
Route::get('registrar-precio-especial-membresia-al','FrontController@registrar_precio_especial_membresia_al');
Route::get('registrar-precio-pref-bungalows-1-al','FrontController@registrar_precio_pref_bungalows_1_al');
Route::get('registrar-precio-especial-membresia-1-al','FrontController@registrar_precio_especial_membresia_1_al');





Route::get('token',function(){
    return csrf_token();
});


Route::auth();
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Password Reset Routes
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

Route::get('/home', 'HomeController@index');

Route::get('/prueba', 'FrontController@prueba');


