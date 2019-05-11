<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Busca las areas verdes mas cercanas a tu ciudad</title>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/boceto.css">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos-esqueleto.css">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos-img.css">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos-componentes.css">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos-banner.css">
	<link rel="stylesheet" type="text/css" href="assets/css/feed.css">
	<link rel="stylesheet" type="text/css" href="assets/css/articulo.css">
	<link rel="stylesheet" href="./assets/leaflet/leaflet.css" />
	<script src="./assets/leaflet/leaflet.js"></script>
</head>
<body class="todo">

	<?php if(isset($_SESSION['usuario'])) : ?>
<header class="header">
	<div  class="div-logo"><img class="logo" src="assets/logo/logo.png"></div>
	<nav id="nav">
		<img class="nav" src="assets/img/nav.svg">
			<ul id="menu-oculto" class="menu-oculto">
					<li><a href="index.php">INICIO</a></li>
					<li><a href="info.php">INFO</a></li>					
					<li><a href="mapa.php">MAPA</a></li>
					<li><a href="comentarios.php">COMENTARIOS</a></li>
					<li id="explorar">EXPLORAR
						<ul class="submenu-oculto">
							<li class="liuno"><a href="tipos.php">por tipo de lugar</a></li>
							<li><a href="colonias.php">por colonia</a></li>
							<li><a href="codigopostal.php">por codigo postal</a></li>
							<li><a href="vertodo.php">todas las areas</a></li>
						</ul></li>
				</ul>

		</nav>
	<div>
		<form  method="POST" action="busqueda.php">
			<input  class="input" type="text" name="buscar" placeholder="busca algo..">
			<input class="boton-lupa" type="image" name="buscado" src="assets/img/lupa.png">
		</form>
	</div>
	<div class="headersesion">
		<article onclick="return mostrarOcultar('session-nav')">
			<img class="imgheader" src="assets/svg/user-img.svg">
			<p> <?php echo $_SESSION['usuario']['nombre'];?> <?php echo $_SESSION['usuario']['apellido']; ?></p>
		</article>
		<section id="session-nav">
			<ul class="hover-user">
				<li><a class="boton liuno" href="feed.php">PANEL DE CONTROL</a></li>
				<li><a class="boton liuno" href="php/cerrar.php">CERRAR SESION</a></li>
			</ul>
			</section>
	</div>
</header>

	<?php else: ?>	
<header class="header">
	<div  class="div-logo"><img class="logo" src="assets/logo/logo.png"></div>
	<nav id="nav"><img onclick="return mostrarOcultar('menu-oculto')" class="nav" src="assets/img/nav.svg">
			<ul id="menu-oculto" class="menu-oculto">
					<li><a href="index.php">INICIO</a></li>
					<li><a href="info.php">INFO</a></li>					
					<li><a href="mapa.php">MAPA</a></li>
					<li><a href="comentarios.php">COMENTARIOS</a></li>
					<li id="explorar">EXPLORAR
						<ul class="submenu-oculto">
							<li class="liuno"><a href="tipos.php">por tipo de lugar</a></li>
							<li><a href="colonias.php">por colonia</a></li>
							<li><a href="codigopostal.php">por codigo postal</a></li>
							<li><a href="vertodo.php">todas las areas</a></li>
						</ul></li>
				</ul>
			</nav>
	<div>
		<form  method="POST" action="busqueda.php">
			<input  class="input" type="text" name="buscar" placeholder="busca algo..">
			<input class="boton-lupa" type="image" name="buscado" src="assets/img/lupa.png">
		</form>
	</div>
	<div class="headersesion">
		<a class="boton" href="comentarios.php">COMENTA</a> 
		<button onclick=" return mostrarOcultar('session-form')" class="boton" href="iniciarsesion.php">INICIA SESION</button>
			<div id="session-form">
				<form class="log-in" method="POST"  action="php/login.php">

					<?php if (isset($_SESSION['error_login'])) : ?>
						<div class="alerta alerta-error">
						<?= $_SESSION['error_login']; ?>
						</div>
					<?php endif; ?>

					<label>CORREO</label>
					<input type="text" name="email">
					<label>CONTRASENA</label>
					<input type="password" name="password">
					<input class="boton" type="submit" name="logueate" value="LOGUEATE">
					<p>Si no tienes una cuenta solicitale al usuario administrador.</p>
				</form>
			</div>
		
	</div>
</header>
	<?php endif;?>
