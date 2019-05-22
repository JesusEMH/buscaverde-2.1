
	<?php require_once './includes/cabecera.php' ?>
	
<?php if(isset($_SESSION['usuario'])) : ?>
	<div class="feed">
	<div class="feed-header">Panel de control de <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></div>

	<?php require_once './includes/aside-feed.php' ?>

		<main class="feed-main" >
					<?php
			if(isset($_SESSION['usuario'])) :?>
			<div class="textarea-contenedor">
				
				<form method="POST" class="comentario-form" action="php/comentario-accion.php">
				<textarea onkeydown="pulsar(event)" cols="80" rows="5"  name="comentario" ></textarea><br>
				<input class="boton" type="submit" name="comentar" value="publicar">
				</form>

			<?php else:?>
				<h2 class="feed-letras">Inicia sesion para que puedas comentar!</h2>

			<?php endif;?>
			</div>

			



			<p class="feed-letras">PUBLICACIONES MAS RECIENTES</p>
				<?php 
			$comentariosYa = conseguirComentarios($db);

			if (!empty($comentariosYa)) : 
			while ($comentarioYa = mysqli_fetch_assoc($comentariosYa)) :
				$usercoments = usuarioComentarios($db,$comentarioYa['usuario']);
				$usercom = mysqli_fetch_assoc($usercoments); 
				

		?> <div class="publicacion">
				<p class="img-publicacion"><img class="comentario-avatar" src="assets/svg/user-img.svg"></p>
				<p><?=$comentarioYa['usuario']?> <?=$comentarioYa['apellido']?></p>
				<p><?=$comentarioYa['fecha']?></p>
				<p class="cuerpo-publicacion"><?=$comentarioYa['comentario']?></p>
				</p>
			</div>
			

			<?php
					endwhile;
				else: 

			endif; ?>

					
		</main>
	<?php require_once 'includes/aside-tareas.php' ?>
	</div>
	<?php require_once 'includes/footer.php' ?>

<?php 
	else : 
		header('Location: ./index.php');
 endif; 

 ?>