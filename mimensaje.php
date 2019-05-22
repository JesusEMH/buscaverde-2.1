<?php require_once './includes/cabecera.php' ?>

<?php if(isset($_SESSION['usuario'])) : ?>

	<div class="feed">

	<div class="feed-header">Panel de control de <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></div>

	<?php require_once './includes/aside-feed.php' ?>

		<main class="mensaje-recibido" >


			
	<p class="feed-titulo">BANDEJA DE ENTRADA DE <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></p>

	<?php
			$mensajes = mostrarMensaje($db, $_GET['id']);
			if (!empty($mensajes)) : 
			while ($mensaje = mysqli_fetch_assoc($mensajes)) :
		?>

	<div class="mensaje-contenido">
		<p> <?= $mensaje['titulo'] ?></p>
		<p> <?= $mensaje['fecha'] ?> </p>
		<p><?= $mensaje['mensaje'] ?></p>
	</div>
	<?php
	endwhile;
	endif;
	?>

		</main>
	<?php require_once 'includes/aside-tareas.php' ?>
	</div>
	<?php require_once 'includes/footer.php' ?>

<?php 
	else : 
		header('Location: ./index.php');
 endif; 

 ?>