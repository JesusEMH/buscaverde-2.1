	<aside>
		<aside class="menu-aside">
		
			<div>
				<img src="assets/svg/user-img.svg">
				<p><?=$_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido']?></p>
				<p><?=$_SESSION['usuario']['email']?></p>
				<p class="boton"><a href="misdatos.php">EDITAR PERFIL</a></p>
			</div>
			<ul>
				<li><a href="feed.php"> Publicaciones</a></li>
				<li><a href="crear-entrada.php"> Crear entrada</a></li>
				<li><a href="crear-informe.php"> Crear informe</a></li>
				<li><a href="mensajes.php"> Mensajes</a></li>
				<li><a href="mapa.php"> mapa</a></li>
				<li><a href="Calendario.php"> Calendario</a></li>
			</ul>

	</aside>
</aside>