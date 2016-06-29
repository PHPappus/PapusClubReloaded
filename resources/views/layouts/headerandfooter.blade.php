<link href='https://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
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
		<!--menu de opciones superior-->
		<nav class="main-menu">
			<div class="content">
				<div class="logo">
					<div class="edit-logo">
						<a href="/" title="Logo oficial de Papus Club">
							<img src="images/logo.png" alt="Logo Papus Club" href="/">
						</a>
					</div>
				</div>
				<!--Opciones de menu-->
				<nav class="menu" id="menu">
					<ul>
						<li><a href="#">PAPUS CLUB<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="historia-papusclub" title="A cerca del club" target="_self">ACERCA DEL CLUB</a></li>
								<li><a href="mesa-directiva" title="Mesa directiva" target="_self">MESA DIRECTIVA</a></li>
								<li><a href="reglamento-club" title="Reglas del club" target="_self">REGLAMENTO</a></li>
							</ul>
						</li>
						<!-- Sedes -->
						<li><a href="#">SEDES<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="historia-sede-callao" title="Callao" target="_self">CALLAO<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="concesiones" title="Concesiones" target="_self">CONCESIONES</a></li>
										<li><a href="servicios" title="Servicios" target="_self">SERVICIOS</a></li>
										<li><a href="reserva-bungalow" title="Bungalows" target="_self">BUNGALOWS</a></li>
									</ul>
								</li>
								<li><a href="historia-sede-surquillo" title="Surquillo" target="_self">SURQUILLO<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="concesiones" title="Concesiones" target="_self">CONCESIONES</a></li>
										<li><a href="servicios" title="Servicios" target="_self">SERVICIOS</a></li>
										<li><a href="reserva-bungalow" title="Bungalows" target="_self">BUNGALOWS</a></li>
									</ul>						
								</li>
								<li><a href="historia-sede-barranco" title="Barranco" target="_self">BARRANCO<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="concesiones" title="Concesiones" target="_self">CONCESIONES</a></li>
										<li><a href="servicios" title="Servicios" target="_self">SERVICIOS</a></li>
										<li><a href="reserva-bungalow" title="Bungalows" target="_self">BUNGALOWS</a></li>
									</ul>						
								</li>
							</ul>
						</li>
						<!-- Opción Actividades -->
						<li><a href="#">ACTIVIDADES<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="#" title="ir a cursos" target="_self">TALLERES<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="futbol" title="ir a futbol" target="_self">Futbol</a></li>
										<li><a href="natacion" title="ir a natacion" target="_self">Natación</a></li>
										<li><a href="karate" title="ir a karate" target="_self">Karate</a></li>
									</ul>
								</li>
								<li><a href="#" title="Actividad 2" target="_self">RELAJACION<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="yoga" title="YOGA" target="_self">YOGA</a></li>
										
									</ul>						
								</li>
								
							</ul>					
						</li>
						<!-- Opción Eventos -->
						<li><a href="#">EVENTOS<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="#" title="Evento 2" target="_self">DIA DEL PADRE<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="padre" title="Evento 2-1" target="_self">VIERNES DE PADRES</a></li>
									</ul>						
								</li>
								<li><a href="#" title="Evento 3" target="_self">DIA DEL AMIGO<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="amigos" title="Evento 3-1" target="_self">AMIGOS</a></li>
									</ul>						
								</li>
							</ul>
						</li>
						<!-- Opción Login -->
						<li><a href="login">LOGIN <span class="glyphicon glyphicon-user"></span> </a></li>
					</ul>
				</nav>
			</div>
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
				<img alt="Papus Club" src="images/logo-min.png" title="Papus Club">				
			</div>
			<div class="contacto">
				<ul class="info">
						<li><a href="#" title="telefono">(51) 1 523 4910</a></li>
						<li><span><img class="PointImg" src="images/punto.png" width="3px" height="3px"></img></span></li>
						<li><a href="#" title="e-mail">papus@clubpapus.org.pe</a></li>
				</ul>
				<ul class="terminos-condiciones">
						<li><a href="#" title="Terminos y Condiciones">TÉRMINOS Y CONDICIONES</a></li>
						<li><span><img class="PointImg" src="images/punto.png" width="3px" height="3px"></img></span></li>
						<li><a href="#" title="Privacidad">PRIVACIDAD</a></li>
						<li><span><img class="PointImg" src="images/punto.png" width="3px" height="3px"></img></span></li>
						<li><a href="#" title="MAPA DE SITIO">MAPA DE SITIO</a></li>
				</ul>
					
			</div>
		</div>
	</div>
</footer>
