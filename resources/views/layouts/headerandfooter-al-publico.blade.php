<header class="header">

  <div class="content clearfix">
    <!--Input de buscador de la parte superior derecha-->

    <nav class="search">

      <div class="search_box">

        <form action="#" id="search-box" method="get">
          <!-- <label class="hidden" for="inputbusqueda">Buscar</label> -->
                    <input type="text" placeholder="Ingresa tu búsqueda" id="inputbusqueda" name="conte" style="max-width:150px;">
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
        <a href="{!!URL::to('/public')!!}" class="navbar-brand"><img alt="Brand" class="img-responsive" src="{!!URL::to('/images/logo.png')!!}" ></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Pappus Club <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="historia-papusclub" title="A cerca del club" target="_self">Acerca del Club</a></li>
                <li><a href="#" title="Mesa directiva" target="_self">Mesa Directiva</a></li>
                <li><a href="#" title="Reglas del club" target="_self">Reglamento del Club</a></li>
            </ul>
          </li>

        </ul>
        <ul class="nav navbar-nav">
          <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
          <li class="dropdown">
            <a href="#" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" role="button" >
              Sedes <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="historia-sede-callao" title="Callao" target="_self">Callao <span class="caret"></a>
                  <ul>
                    <li><a href="#" title="Concesiones" target="_self">Concesiones</a></li>
                    <li><a href="#" title="Servicios" target="_self">Servicios</a></li>
                    <li><a href="reserva-bungalow" title="Bungalows" target="_self">Bungalows</a></li>
                  </ul>
                </li>
                <li><a href="#" title="Surquillo" target="_self">Surquillo <span class="caret"></a>
                  <ul>
                    <li><a href="#" title="Concesiones" target="_self">Concesiones</a></li>
                    <li><a href="#" title="Servicios" target="_self">Servicios</a></li>
                    <li><a href="#" title="Bungalows" target="_self">Bungalows</a></li>
                  </ul>           
                </li>
                <li><a href="#" title="Barranco" target="_self">Barranco <span class="caret"></a>
                  <ul>
                    <li><a href="#" title="Concesiones" target="_self">Concesiones</a></li>
                    <li><a href="#" title="Servicios" target="_self">Servicios</a></li>
                    <li><a href="#" title="Bungalows" target="_self">Bungalows</a></li>
                  </ul>           
                </li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Actividades <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#" title="Ir a talleres" target="_self">Talleres <span class="caret"></a>
                  <ul>
                    <li><a href="futbol" title="ir a futbol" target="_self">Futbol</a></li>
                    <li><a href="#" title="Actividad 1.2" target="_self">Actividad 1.2</a></li>
                    <li><a href="#" title="Actividad 1.3" target="_self">Actividad 1.3</a></li>
                  </ul>
                </li>
                <li><a href="#" title="Actividad 2" target="_self">Actividad 2 <span class="caret"></a>
                  <ul>
                    <li><a href="#" title="Actividad 2.1" target="_self">Actividad 2.1</a></li>
                    <li><a href="#" title="Actividad 2.2" target="_self">Actividad 2.2</a></li>
                    <li><a href="#" title="Actividad 2.3" target="_self">Actividad 2.3</a></li>
                  </ul>           
                </li>
                <li><a href="#" title="Actividad 3" target="_self">Actividad 3 <span class="caret"></a>
                  <ul>
                    <li><a href="#" title="Actividad 3.1" target="_self">Actividad 3.1</a></li>
                    <li><a href="#" title="Actividad 3.2" target="_self">Actividad 3.2</a></li>
                    <li><a href="#" title="Actividad 3.3" target="_self">Actividad 3.3</a></li>
                  </ul>           
                </li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle btn-lg" data-toggle="dropdown" role="button">
              Eventos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#" title="Evento 1" target="_self">Evento 1 <span class="caret"></a>
                  <ul>
                    <li><a href="#" title="Evento 1-1" target="_self">Evento 1.1</a></li>
                    <li><a href="#" title="Evento 1-2" target="_self">Evento 1.2</a></li>
                    <li><a href="#" title="Evento 1-3" target="_self">Evento 1.3</a></li>
                  </ul>
                </li>
                <li><a href="#" title="Evento 2" target="_self">Evento 2 <span class="caret"></a>
                  <ul>
                    <li><a href="#" title="Evento 2-1" target="_self">Evento 2.1</a></li>
                    <li><a href="#" title="Evento 2-2" target="_self">Evento 2.2</a></li>
                    <li><a href="#" title="Evento 2-3" target="_self">Evento 2.3</a></li>
                  </ul>           
                </li>
                <li><a href="#" title="Evento 3" target="_self">Evento 3 <span class="caret"></a>
                  <ul>
                    <li><a href="#" title="Evento 3-1" target="_self">Evento 3.1</a></li>
                    <li><a href="#" title="Evento 3-2" target="_self">Evento 3.1</a></li>
                    <li><a href="#" title="Evento 3-3" target="_self">Evento 3.1</a></li>
                  </ul>           
                </li>
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