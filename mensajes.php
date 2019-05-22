
<?php require_once './includes/cabecera.php' ?>

<?php if(isset($_SESSION['usuario'])) : ?>
	
<div class="feed">
	<div class="feed-header">Panel de control de <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></div>

<?php require_once './includes/aside-feed.php' ?>

	<main class="mensaje-main" >


		
<p class="feed-titulo">BANDEJA DE ENTRADA DE <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></p>
<button class="boton botonmensaje"><a  href="nuevo-mensaje.php">NUEVO MENSAJE +</a></button>

<div class="mensajes-list">
	<?php
		$mensajes = conseguirMensajes($db, $_SESSION['usuario']['id']);

		if (!empty($mensajes)) : 
		while ($mensaje = mysqli_fetch_assoc($mensajes)) :
	?>

<article class="bandeja">
	<div 
	<?php if($mensaje['leido']== 1):?>

	class="no-leido">NUEVO</div>
	<?php else: ?>
		
	class="leido">LEIDO</div>

		<?endif;?>

	
	<div>DE:<br> <?= $mensaje['usuario']?> <?= $mensaje['apellido']?> </div>
	<div class="msn"><a href="./php/ver-mensaje.php?id=<?=$mensaje['id']?>" > <?= $mensaje['titulo']?></a></div>
	<div></div>
	<div class="bandeja-borrar"><a href="./php/borrar-mensaje.php?id=<?=$mensaje['id']?>"> BORRAR</a></div>
</article>


	<?php
		endwhile;
		else:
	?>
	<p>tu bandeja de entrada esta vacia.</p>
	<?php
	endif;

	?>
</div>

		
				
	</main>
<?php require_once 'includes/aside-tareas.php' ?>
</div>
<?php require_once 'includes/footer.php' ?>

<?php 
	else : 
		header('Location: ./index.php');
 endif; 

 ?>