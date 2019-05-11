<?php require_once './includes/cabecera.php' ?>

<div class="feed">

<?php require_once './includes/aside-feed.php' ?>

	<main class="feed-agregar-articulo" >
		<?php
		if(isset($_SESSION['usuario'])) :?>

		
		<p class="feed-titulo">PANEL DE CONTROL DE <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></p>
		
		<?php require_once './includes/formulario-entrada.php' ?>


		<?php else:?>
			<h2 class="feed-letras">Inicia sesion para que puedas comentar!</h2>

		<?php endif;?>
		

				
	</main>
<?php require_once 'includes/aside-tareas.php' ?>
</div>
<?php require_once 'includes/footer.php' ?>