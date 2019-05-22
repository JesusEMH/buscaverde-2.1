
<?php require_once './includes/cabecera.php' ?>
<?php if(isset($_SESSION['usuario'])) : ?>
	
<div class="feed">
<div class="feed-header">Panel de control de <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></div>
<?php require_once './includes/aside-feed.php' ?>

	<main id="map" >

				
	</main>

</div>
<?php require_once 'includes/footerdos.php' ?>

<?php 
	else : 
		header('Location: ./index.php');
 endif; 

 ?>