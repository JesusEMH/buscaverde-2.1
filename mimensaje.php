<?php require_once './includes/cabecera.php' ?>

<div class="feed">

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
