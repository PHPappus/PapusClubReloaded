<!--Cabecera- Se separará espacio para el input de busqueda antes de la cabecera de menu-->

  	<script>
		function inputLimiter(e,allow) {
		    var AllowableCharacters = '';

		    if (allow == 'Letters'){AllowableCharacters=' ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz';}
		    if (allow == 'Numbers'){AllowableCharacters='1234567890';}
		    if (allow == 'NameCharacters'){AllowableCharacters=' ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz-.\'_@';}
		    if (allow == 'NameCharactersAndNumbers'){AllowableCharacters='1234567890 ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz-\'_@';}
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
		<!--menu de opciones superior-->
		<nav class="main-menu">
			<div class="content-fluid" style="margin-left: 10%">
				<div class="logo">
					<div class="edit-logo">
						<a href="{!!URL::to('/admin-general')!!}" title="Logo oficial de Papus Club">
							<img src="../images/logo.png" alt="Logo Papus Club" href="/">
						</a>
					</div>
				</div>
				<!--Opciones de menu-->
				<nav class="menu" id="menu">
					<ul>
						<li><a href="#">{!!Auth::user()->name!!}  <span class="glyphicon glyphicon-user"></span></a>
								<ul>
									<li><a href="{!!URL::to('/cuenta-a')!!}" title="ir a ver curso 1" target="_self">CUENTA</a></li>
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
								<li><a href="{!!URL::to('/sorteo/new')!!}" title="Mantenimiento Sorteo" target="_self">SORTEO</a></li>
							</ul> 
						</li>
						<li><a href="{!!URL::to('/ambiente/index')!!}">AMBIENTE<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="{!!URL::to('/reservar-ambiente/reservar-bungalow')!!}" title="ir a reserva de Bungalow" target="_self">RESERVAR BUNGALOW</a></li>
								<li><a href="{!!URL::to('/reservar-ambiente/reservar-otros-ambientes')!!}" title="ir a reserva de Otros Ambientes" target="_self">RESERVAR OTRO AMBIENTES</a></li>
							</ul>
						</li>
						
						<li><a href="{!!URL::to('/actividad/index')!!}">ACTIVIDAD<span class="despliegue">▼</span></a>
						<!-- <ul>
								<li><a href="{!!URL::to('/actividad/new')!!}" title="ir a agregar sede" target="_self">AGREGAR</a></li>
							</ul> -->
						</li>
						<!-- Opción Actividades -->
						<li><a href="#">TALLER<span class="despliegue">▼</span></a>
							<ul>
							</ul>					
						</li>
						<!-- Opción Eventos -->
						<li><a href="#">SERVICIO</a></li>
						<!-- Opción TRAMITES -->						
						<li><a href="{!!URL::to('/producto/index')!!}">PRODUCTO<span class="despliegue">▼</span></a>
							<ul>
								<li><a href="{!!URL::to('/producto/index')!!}">PRODUCTOS</a></li>
								<li><a href="#">TIPOS DE PRODUCTOS</a></li>
								<li><a href="#">VENTAS DE PRODUCTOS</a></li>
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
				<img alt="Papus Club" src="../images/logo-min.png" title="Papus Club">				
			</div>
			<div class="contacto">
				<ul class="info">
						<li><a href="#" title="telefono">(51) 1 523 4910</a></li>
						<li><span><img class="PointImg" src="../images/punto.png" width="3px" height="3px"></img></span></li>
						<li><a href="#" title="e-mail">papus@clubpapus.org.pe</a></li>
				</ul>
				<ul class="terminos-condiciones">
						<li><a href="#" title="Terminos y Condiciones">TÉRMINOS Y CONDICIONES</a></li>
						<li><span><img class="PointImg" src="../images/punto.png" width="3px" height="3px"></img></span></li>
						<li><a href="#" title="Privacidad">PRIVACIDAD</a></li>
						<li><span><img class="PointImg" src="../images/punto.png" width="3px" height="3px"></img></span></li>
				</ul>
					
			</div>
		</div>
	</div>
</footer>
