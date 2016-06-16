<header class="header">

  <div class="content clearfix">
    <!--Input de buscador de la parte superior derecha-->

    <nav class="search">
      <div class="search_box">
        <form action="#" id="search-box" method="get">
                <!-- <label class="hidden" for="inputbusqueda">Buscar</label> -->
                <input type="text" placeholder="Ingresa tu búsqueda" id="inputbusqueda" name="conte" style="max-width:145px;">
                <!-- <span class="glyphicon glyphicon-search" href="#"></span> -->
                <button style="background-color:transparent;border:none;"><span class="glyphicon glyphicon-search" href="#"></span></button>
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

        <a href="{!!URL::to('/admin-persona')!!}" class="navbar-brand"><img alt="Brand" class="img-responsive" src="{!!URL::to('/images/logo.png')!!}" ></a>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <li><a href="{!!URL::to('/trabajador/index')!!}" class="dropdown-toggle btn-lg" title="consultar Bungalows" target="_self">Trabajadores</a></li>
          </li>
        </ul>
         <ul class="nav navbar-nav">
          <li class="dropdown">
            <li><a href="{!!URL::to('/postulante/index')!!}" class="dropdown-toggle btn-lg" title="consultar Bungalows" target="_self">Postulante</a></li>
          </li>
        </ul>
         <ul class="nav navbar-nav">
          <li class="dropdown">
            <li><a href="{!!URL::to('/Socio/')!!}" class="dropdown-toggle btn-lg" title="consultar Bungalows" target="_self">Socio</a></li>
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Socio <span class="caret"></span>
            </a>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Proveedor <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#" title="Consultar Proveedores" target="_self">Consultar</a></li>
                <li><a href="#" title="Registrar nuevo proveedor" target="_self">Registrar</a></li>
                <li><a href="#" title="Anular proveedor" target="_self">Anular</a></li>
            </ul>t
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Talleres <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{!!URL::to('/talleres/index')!!}" title="consultar talleres" target="_self">Consultar</a></li>
                <li><a href="{!!URL::to('/talleres/mis-inscripciones')!!}" title="inscripciones de talleres" target="_self">Mis Inscripciones</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <li><a href="{!!URL::to('/multas-s')!!}" class="dropdown-toggle btn-lg" title="registrar multas" target="_self">Multas</a></li>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <li><a href="#" class="dropdown-toggle btn-lg" title="Consultar Cuotas" target="_self">Cuotas</a></li> <!-- no sé qué es prros -->
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" title="Realizar tramites" data-toggle="dropdown" role="button">
              Trámites</span>
            </a>
            <!-- <ul class="dropdown-menu">
              <li><a href="#">Item #1</a></li>
              <li><a href="#">Item #2</a></li>
              <li class="divider"></li>
              <li><a href="#">Item #4</a></li>
            </ul> -->
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
        <img alt="Papus Club" src="{!!URL::to('/images/logo-min.png')!!}" title="Papus Club">       
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
