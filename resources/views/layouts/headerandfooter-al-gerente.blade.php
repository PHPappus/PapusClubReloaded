<!--Cabecera- Se separará espacio para el input de busqueda antes de la cabecera de menu-->
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
<<<<<<< HEAD
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
        <a href="{!!URL::to('/gerente')!!}" class="navbar-brand"><img alt="Brand" class="img-responsive" src="{!!URL::to('/images/logo.png')!!}" ></a>
      </div>

      <div class="collapse navbar-collapse" id="navbar1">
        <!-- Reportes -->
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Reportes <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
				<li><a href="{!!URL::to('/reporte/invitado-por-sede')!!}" title="" target="_self">Invitados por Sede</a></li>
				<li><a href="{!!URL::to('/reporte/morosos')!!}" title="" target="_self">Morosos</a></li>
				<li><a href="{!!URL::to('/reporte/reserva-de-bungalow')!!}" title="" target="_self">Reserva de Bungalow</a></li>
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
=======
		<!--menu de opciones superior-->
		<nav class="main-menu">
			<div class="content-fluid" style="margin-left: 10%">
				<div class="logo">
					<div class="edit-logo">
						<a href="{!!URL::to('/gerente')!!}" title="Logo oficial de Papus Club">
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
						<!-- Opción SOCIO -->
						<li><a href="#">SOCIO</a></li>
						<!-- Opción TRABAJADOR -->
						<li><a href="#">TRABAJADOR</a></li>
						<!-- Opción SEDE -->
						<li><a href="#">SEDE</a></li>		
						<!-- Opción REPORTES -->
						<li><a href="#">REPORTES</a>
							<ul>
								<li><a href="{!!URL::to('/reporte/invitado-por-sede')!!}" title="" target="_self">Invitador por Sede</a></li>
								<li><a href="{!!URL::to('/reporte/morosos')!!}" title="" target="_self">Morosos</a></li>
								<li><a href="{!!URL::to('/reporte/reserva-de-bungalow')!!}" title="" target="_self">Reserva de Bungalow</a></li>
							</ul>
						</li>
						<!-- Opción TRÁMITES -->
						<li><a href="#">TRÁMITES</a></li>
					</ul>
				</nav>
			</div>
    	</nav>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
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
				<img alt="Papus Club" src="{!!URL::to('images/logo-min.png')!!}" title="Papus Club">				
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
