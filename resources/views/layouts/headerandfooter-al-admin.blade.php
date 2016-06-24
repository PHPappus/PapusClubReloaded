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
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Perfiles <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">    
                <li><a href="{!!URL::to('/multa')!!}" title="Consultar perfiles" target="_self">Consultar</a></li>
                <li><a href="{!!URL::to('/multa/new')!!}" title="Registrar perfiles" target="_self">Registrar</a></li>
            </ul>
          </li>
        </ul>

        <!-- Productos -->
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Productos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">    
                <li><a href="{!!URL::to('/producto/index')!!}">Productos</a></li>
				<li><a href="{!!URL::to('/ingreso-producto/index')!!}">Ingreso de productos</a></li>
				<li><a href="{!!URL::to('/venta-producto/index')!!}">
				Ventas de productos</a></li>
            </ul>
          </li>
        </ul>

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






	
	