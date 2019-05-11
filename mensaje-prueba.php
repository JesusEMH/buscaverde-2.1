<?php require_once './includes/cabecera.php' ?>

<div class="feed">

<?php require_once './includes/aside-feed.php' ?>

	<main class="mensaje-prueba" >

	<p class="feed-titulo">BANDEJA DE ENTRADA DE <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></p>	

<div class="mensajes-list">
<?php
		$mensajes = mostrarMensaje($db, $_GET['id']);
		if (!empty($mensajes)) : 
		while ($mensaje = mysqli_fetch_assoc($mensajes)) :
	?>

<div class="mensaje-view">
	<p>asunto: <?= $mensaje['titulo'] ?></p>
	<p>tu mensaje: <?= $mensaje['mensaje'] ?></p>
</div>
<?php
endwhile;
else:?>
	<article class="mensaje-view">
		<p>Haz click para visualizar el mensaje que quieras leer..</p>
	</article>
<?php	
endif;
?>
</div>

	
<button class="boton"><a  href="nuevo-mensaje.php">NUEVO MENSAJE +</a></button>

<?php
		$mensajes = conseguirMensajes($db, $_SESSION['usuario']['id']);

		if (!empty($mensajes)) : 
		while ($mensaje = mysqli_fetch_assoc($mensajes)) :
	?>

<article class="bandeja">
	<div 
	<?php if($mensaje['leido']== 1):?>

	class="no-leido">NO LEIDO</div>
	<?php else: ?>
		
	class="leido">LEIDO</div>

		<?endif;?>

	
	<div>DE: <?= $mensaje['usuario']?><?= $mensaje['apellido']?> </div>
	<div><a href="./php/ver-mensaje.php?id=<?=$mensaje['id']?>" >ASUNTO: <?= $mensaje['titulo']?></a></div>
	<div>FECHA <?= $mensaje['fecha']?></div>
	<div class="bandeja-borrar">BORRAR</div>
</article>


	<?php
		endwhile;
		else:
	?>
	<p>tu bandeja de entrada esta vacia.</p>
	<?php
	endif;

	?>
		
				
	</main>
<?php require_once 'includes/aside-tareas.php' ?>
</div>
<?php require_once 'includes/footer.php' ?>