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
		<nav class="main-menu" style="height: 122px;">
			<div class="content">
				<div class="logo">
					<div class="edit-logo">
						<a href="{!!URL::to('/admin-registros')!!}" title="Logo oficial de Papus Club">
							<img src="{!!URL::to('images/logo.png')!!}" alt="Logo Papus Club" href="/">
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
						<!-- Sedes -->
						<li><a href="#">PAGO<!-- <span class="despliegue">▼</span> --></a>
							<!-- <ul>
								<li><a href="#" title="ir a curso 1" target="_self">CURSO 2<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="#" title="ir a ver curso 1" target="_self">VER CURSO</a></li>
										<li><a href="#" title="ir a inscribirse 1" target="_self">INSCRIBIRSE</a></li>
									</ul>
								</li>
								<li><a href="#" title="ir a curso 2" target="_self">CURSO 1<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="#" title="ir a ver curso 2" target="_self">VER CURSO</a></li>
										<li><a href="#" title="ir a inscribirse 2" target="_self">INSCRIBIRSE</a></li>
									</ul>						
								</li>
							</ul> -->
						</li>
						<!-- Opción Actividades -->
						<li><a href="#">TALLER<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="#" title="ir a ambientes" target="_self">AMBIENTES<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="#" title="ir a ver curso" target="_self">VER</a></li>
										<li><a href="#" title="ir a reservar ambiente" target="_self">RESERVAR</a></li>
										<li><a href="anular-reserva-ambiente-al" title="ir a anular ambiente" target="_self">ANULAR</a></li>
									</ul>						
								</li>
								<li><a href="#" title="ir a cursos" target="_self">CURSOS<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="#" title="ir a ver curso" target="_self">VER</a></li>
										<li><a href="#" title="ir a inscribirse en curso" target="_self">INSCRIBIRSE</a></li>
									</ul>						
								</li>
								<li><a href="#" title="ir a talleres" target="_self">TALLERES<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="#" title="ir a ver taller" target="_self">VER</a></li>
										<li><a href="#" title="ir a inscribirse en taller" target="_self">INSCRIBIRSE</a></li>
									</ul>
								</li>
								<li><a href="#" title="ir a eventos" target="_self">EVENTOS<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="#" title="ir a ver evento" target="_self">VER</a></li>
										<li><a href="#" title="ir a inscribirse en evento" target="_self">INSCRIBIRSE</a></li>
									</ul>						
								</li>
								<li><a href="#" title="ir a actividades" target="_self">ACTIVIDADES<span class="despliegue">▼</span></a>
									<ul>
										<li><a href="#" title="ir a ver actividad" target="_self">VER</a></li>
										<li><a href="#" title="ir a inscribirse en actividad" target="_self">INSCRIBIRSE</a></li>
									</ul>						
								</li>
							</ul>					
						</li>
						<!-- Opción TRAMITES -->
						<li><a href="{!!URL::to('/ambiente/index')!!}">AMBIENTE<span class="despliegue"></span></a>
							
						</li>

						<!-- Opción MANTENIMIENTO -->
						<li><a href="#">BUNGALOW<!-- <span class="despliegue">▼</span> --></a>
							<ul>
								
								
							</ul>
						</li>
												<!-- Opción Eventos -->
						<li><a href="{!!URL::to('/actividad/index')!!}">ACTIVIDAD<span class="despliegue"></span></a>
							
						</li>
					</ul>
				</nav>
				<nav class="menu" id="menu2">
					<ul>
						<li><a href="#">TRAMITES</a></li>
						<li><a href="{!!URL::to('/usuario')!!}">Usuarios</a></li>
						<li><a href="#">PRODUCTO</a></li>
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
