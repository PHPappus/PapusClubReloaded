<header class="header">

  <div class="content clearfix">
    <!--Input de buscador de la parte superior derecha-->

    <nav class="search">

      <div class="search_box">

        <form action="#" id="search-box" method="get">
          <!-- <label class="hidden" for="inputbusqueda">Buscar</label> -->
            <input type="text" placeholder="Ingresa tu búsqueda" id="inputbusqueda" name="conte" style="max-width:155px;">
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
        <a href="{!!URL::to('/admin-reserva')!!}" class="navbar-brand"><img alt="Brand" class="img-responsive" src="{!!URL::to('/images/logo.png')!!}" ></a>
      </div>
      

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Actividades <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{!!URL::to('/actividad-admin-reserva/inscripcion')!!}" title="Inscribir Socio" target="_self">Inscribir Socio</a></li>
              <li><a href="{!!URL::to('/actividad-admin-reserva/inscripciones')!!}" title="Inscribir Socio" target="_self">Inscripciones</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Talleres <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{!!URL::to('/taller-admin-reserva/index')!!}" title="Inscribir Socio" target="_self">Inscribir Socio</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Bungalows <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- <li><a href="#" title="Consultar Bungalows con solicitud de reserva" target="_self">Consultar</a></li> -->
              <li><a href="{!!URL::to('/reservar-ambiente/reservar-bungalow-adminR')!!}" title="Reservar Bungalow" target="_self">Reservar</a></li>
              <li><a href="{!!URL::to('/reservar-ambiente/consultar-bungalow-adminR')!!}" title="Reservas de ambientes realizados" target="_self">Consultar</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Ambientes <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- <li><a href="#" title="Consultar ambientes" target="_self">Consultar</a></li> -->
                <li><a href="{!!URL::to('/reservar-ambiente/reservar-otros-ambientes-adminR')!!}" title="Reservas de ambientes realizados" target="_self">Reservar</a></li>
                <li><a href="{!!URL::to('/reservar-ambiente/consultar-otros-ambientes-adminR')!!}" title="Reservas de ambientes realizados" target="_self">Consultar</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Mantenimiento <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- <li><a href="#" title="Consultar ambientes" target="_self">Consultar</a></li> -->
              <li><a href="{!!URL::to('/mantBungalowPrev/indexHabilitar')!!}" title="Reservas de ambientes realizados" target="_self">Habilitar Bungalows</a></li>
                <li><a href="{!!URL::to('/mantBungalowPrev/index')!!}" title="Reservas de ambientes realizados" target="_self">Deshabilitar Bungalows</a></li>                
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Ingreso a Reserva<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- <li><a href="#" title="Consultar ambientes" target="_self">Consultar</a></li> -->
              <li><a href="{!!URL::to('/ingresoReserva/index')!!}" title="Reservas de ambientes realizados" target="_self">Registrar Ingreso</a></li>            
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Sorteos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">    
                <li><a href="{!!URL::to('/sorteo/index')!!}" title="Mantenimiento Sorteo" target="_self"> Consultar</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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