<?php require_once 'includes/cabecera.php'; ?>	
	<?php if(isset($_SESSION['usuario'])) : ?>

		<div class="feed">
		<div class="feed-header">Panel de control de <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></div>

	<?php require_once './includes/aside-feed.php' ?>

		<main class="feed-agregar-articulo" >
			<?php
			if(isset($_SESSION['usuario'])) :?>

			
			
			<?php require_once './includes/nuevo-usuario.php' ?>


			<?php else:?>
				<h2 class="feed-letras">Inicia sesion para que puedas comentar!</h2>

			<?php endif;?>
			

					
		</main>
	<?php require_once 'includes/aside-tareas.php' ?>

	</div>
	<?php require_once 'includes/footer.php' ?>

<?php 
	else : 
		header('Location: ./index.php');
 endif; 

 ?>