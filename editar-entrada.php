<?php require_once 'includes/cabecera.php'; ?>

<div class="bodycuatro">
	<aside class="asideuno"></aside>

	<?php
	$entrada_actual = conseguirEntrada($db, $_GET['id']);

	if(!isset($entrada_actual['id'])){
		header("Location: index.php");
	}
	?>

	<main class="main-articulo">

	<article class="zonaverde">
		<div class="basura-editar">MODIFICA EL AREA VERDE</div>
		<?php require_once 'includes/editar-entrada.php'; ?>
		
	</article>
	</main>
	<aside class="asidedos"></aside>
</div>

<?php require_once 'includes/footer.php'; ?>