 <!--Cabecera- Se separará espacio para el input de busqueda antes de la cabecera de menu-->
  	<script>
		function inputLimiter(e,allow) {
		    var AllowableCharacters = '';

		    if (allow == 'Letters'){AllowableCharacters=' ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz';}
		    if (allow == 'Numbers'){AllowableCharacters='1234567890';}
		    if (allow == 'NameCharacters'){AllowableCharacters=' ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz-.\'._@';}
		    if (allow == 'NameCharactersAndNumbers'){AllowableCharacters='1234567890 ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz-\'_.@';}
		    if (allow == 'DoubleFormat'){AllowableCharacters='1234567890,.';}
		    if (allow == 'Nulo'){AllowableCharacters='';} //sirve para colocarle a las fechas deben ser obligatoriamente ingresadas por el picker

		    var k = document.all?parseInt(e.keyCode): parseInt(e.which);
		    if (k!=13 && k!=8 && k!=0){
		        if ((e.ctrlKey==false) && (e.altKey==false)) {
		        return (AllowableCharacters.indexOf(String.fromCharCode(k))!=-1);
		        } else {
		        return true;
		        }
		    } else {
		        return true;
		    }
		}
  	</script>

<header class="header">
		<div class="content clearfix">
<<<<<<< HEAD
		<!--Input de buscador de la parte superior derecha-->
		<nav class="search">
			<div class="search_box">
				<form action="#" id="search-box" method="get">
					<label class="hidden" for="inputbusqueda">Buscar</label>
                    <input type="text" placeholder="Ingresa tu búsqueda" id="inputbusqueda" name="conte">
                    <span class="glyphicon glyphicon-search" href="#"></span>
				</form>
=======
			<!--Input de buscador de la parte superior derecha-->
			<nav class="search">
				<div class="search_box">
					<form action="#" id="search-box" method="get">
						<label class="hidden" for="inputbusqueda">Buscar</label>
	                    <input type="text" placeholder="Ingresa tu búsqueda" id="inputbusqueda" name="conte">
	                    <span class="glyphicon glyphicon-search" href="#"></span>
					</form>
				</div>
			</nav>
		</div>
		<!--menu de opciones superior-->
		<nav class="main-menu">
			<div class="content-fluid" style="margin-left: 10%">
				<div class="logo">
					<div class="edit-logo">
						<a href="{!!URL::to('/admin-general')!!}" title="Logo oficial de Papus Club">
							<img src="{!!URL::to('/images/logo.png')!!}" alt="Logo Papus Club" href="/">
						</a>
					</div>
				</div>
				<!--Opciones de menu-->
				<nav class="menu" id="menu">
					<ul>
						<li><a href="#">{!!Auth::user()->name!!}  <span class="glyphicon glyphicon-user"></span></a>
								<ul>
									<li><a href="{!!URL::to('/cuenta')!!}" title="Ir a cuenta" target="_self">MI CUENTA</a></li>
									<li><a href="{!!URL::to('/password/change')!!}" title="Cambiar contraseña" target="_self">CAMBIAR MI CONTRASEÑA</a></li>
									<li><a href="{!!URL::to('/logout')!!}" title="LOGOUT" target="_self">LOGOUT</a></li>
								</ul>
						</li>
						<!-- Sedes -->
						<li><a href="#">PERSONA<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="{!!URL::to('/Socio')!!}" title="ir a socio" target="_self">SOCIO</a></li>
								<li><a href="{!!URL::to('/trabajador/index')!!}" title="ir a trabajador" target="_self">TRABAJADOR</a></li>
								<li><a href="{!!URL::to('/postulante/index')!!}" title="ir a postulante" target="_self">POSTULANTE</a></li>
							</ul>
						</li>

						<li><a href="{!!URL::to('/multa')!!}">MULTA<span class="despliegue">▼</span></a>
							<!-- <ul>
								<li><a href="{!!URL::to('/sedes/new')!!}" title="ir a agregar sede" target="_self">AGREGAR</a></li>
							</ul> -->
						</li>

						<li><a href="{!!URL::to('/sedes/index')!!}">SEDE<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="{!!URL::to('/sorteo/index')!!}" title="Mantenimiento Sorteo" target="_self"> MANTENIMIENTO SORTEO</a></li>
								<li><a href="{!!URL::to('/sorteo/inscripcion')!!}" title="Inscripcion Sorteo" target="_self">INSCRIPCION SORTEO</a></li>
								<li><a href="{!!URL::to('/select/sede')!!}" title="Agregar Servicios" target="_self">AGREGAR SERVICIOS</a></li>
							</ul>
						</li>
						<!-- <li><a href="{!!URL::to('/ambiente/index')!!}">AMBIENTE<span class="despliegue">▼</span></a>
							
						</li>

						<li><a href="{!!URL::to('/actividad/index')!!}">ACTIVIDAD<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="{!!URL::to('/inscripcion-actividad/inscripcion-actividades')!!}" title="ir a agregar sede" target="_self">INSCRIPCIÓN</a></li>
							</ul>
						</li> -->
						<!-- Opción Actividades -->
						<li><a href="{!!URL::to('/taller/')!!}">TALLER<span class="despliegue">▼</span></a>
							<ul>
							</ul>					
						</li>
						<!-- Opción Eventos -->
						<li><a href="{!!URL::to('/servicios/index')!!}">SERVICIO</a></li>
						<!-- Opción TRAMITES -->						
						<li><a href="{!!URL::to('/producto/index')!!}">PRODUCTO<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="{!!URL::to('/producto/index')!!}">PRODUCTOS</a></li>
								<li><a href="{!!URL::to('/ingreso-producto/index')!!}">INGRESO DE PRODUCTOS</a></li>
								<li><a href="{!!URL::to('/venta-producto/index')!!}">VENTAS DE PRODUCTOS</a></li>
							</ul>
						</li>
						<!-- Opción MANTENIMIENTO -->
						<li><a href="#">PERFIL</a></li>
						<!-- Opción MANTENIMIENTO -->
						<li><a href="{{url('/membresia')}}">MEMBRESIA</a></li>
						<!-- Opción TRÁMITES -->
						<li><a href="#">TRÁMITES</a></li>
						<!-- Opción Eventos -->
						<li><a href="{!!URL::to('/proveedor/index')!!}">PROVEEDOR</a></li>
						<!-- MANTENIMIENTO DE PAGOS -->
						<!-- <li><a href="{{url('/pagos/pago-seleccionar-socio')}}">PAGOS</a></li> -->

					</ul>
				</nav>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
			</div>
		</nav>
	</div>
	<nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="{!!URL::to('/admin-general')!!}" class="navbar-brand"><img alt="Brand" class="img-responsive" src="{!!URL::to('/images/logo.png')!!}" ></a>
      </div>

      <div class="collapse navbar-collapse" id="navbar1">
        <!-- Sedes -->
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Sedes <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{!!URL::to('/sedes/index')!!}" title="Consultar sedes" target="_self">Consultar</a></li>
                <li><a href="{!!URL::to('/sedes/new')!!}" title="Registrar nueva sede" target="_self">Registrar</a></li>
            </ul>
          </li>
        </ul>
        
        <!-- Configuraciones -->
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Configuraciones <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#" title="Consultar configuraciones" target="_self">Consultar</a></li>
              <li><a href="#" title="Registrar configuración" target="_self">Registrar</a></li>
            </ul>
          </li>
        </ul>

        <!-- Membresía -->
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" role="button" >
              Membresía <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{!!URL::to('/membresia')!!}" title="Consultar membresias" target="_self">Consultar</a></li>
                <li><a href="{!!URL::to('/membresia/new')!!}" title="Consultar membresía" target="_self">Registrar</a></li>
            </ul>
          </li>
        </ul>
        
        <!-- Multas -->
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Multas <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">    
                <li><a href="{!!URL::to('/multa')!!}" title="Consultar multas" target="_self">Consultar</a></li>
                <li><a href="{!!URL::to('/multa/new')!!}" title="Registrar multa" target="_self">Registrar</a></li>
            </ul>
          </li>
        </ul>

        <!-- Perfiles -->
        <!-- <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Perfiles <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">    
                <li><a href="{!!URL::to('/multa')!!}" title="Consultar perfiles" target="_self">Consultar</a></li>
                <li><a href="{!!URL::to('/multa/new')!!}" title="Registrar perfiles" target="_self">Registrar</a></li>
            </ul>
          </li>
        </ul> -->
       

        <!-- Productos -->
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Sorteos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">    
                <li><a href="{!!URL::to('/sorteo/index')!!}" title="Mantenimiento Sorteo" target="_self"> Consultar</a></li>
				<li><a href="{!!URL::to('/sorteo/inscripcion')!!}" title="Inscripcion Sorteo" target="_self">Inscripción</a></li>
				<li><a href="{!!URL::to('/select/sede')!!}" title="Agregar Servicios" target="_self">Agregar servicios</a></li>
            </ul>
          </li>
        </ul>   
		

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
            {!!Auth::user()->name!!} <span class="glyphicon glyphicon-user"><span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{!!URL::to('/cuenta')!!}" title="Ir a cuenta" target="_self">Mi Cuenta</a></li>
              <li><a href="{!!URL::to('/password/change')!!}" title="Cambiar contraseña" target="_self">Cambiar mi contraseña</a></li>
              <li><a href="{!!URL::to('/logout')!!}" title="LOGOUT" target="_self">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>
<!---Cuerpo -->

<main class="main">
@yield('content')
</main>
<!--Pie de págna-->

<footer class="footer">
	<div class="content clearfix">
		<div class="footer-1">
			<div class="logofoot">
				<img alt="Papus Club" src="{!!URL::to('images/logo-min.png')!!}" title="Papus Club" style="z-index: -1;">				
			</div>
			<div class="contacto">
				<ul class="info">
						<li><a href="#" title="telefono">(51) 1 523 4910</a></li>
						<li><span><img class="PointImg" src="{!!URL::to('/images/punto.png')!!}" width="3px" height="3px"></img></span></li>
						<li><a href="#" title="e-mail">papus@clubpapus.org.pe</a></li>
				</ul>
				<ul class="terminos-condiciones">
						<li><a href="#" title="Terminos y Condiciones">TÉRMINOS Y CONDICIONES</a></li>
						<li><span><img class="PointImg" src="{!!URL::to('/images/punto.png')!!}" width="3px" height="3px"></img></span></li>
						<li><a href="#" title="Privacidad">PRIVACIDAD</a></li>
						<li><span><img class="PointImg" src="{!!URL::to('/images/punto.png')!!}" width="3px" height="3px"></img></span></li>
				</ul>
					
			</div>
		</div>
	</div>
</footer>






	
	