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
		<h1 class="zona-titulo"><?=$entrada_actual['nombre']?></h1>
		<p class="zona-descripcion">DESCRIPCION: <?=$entrada_actual['descripcion']?> </hp>
		<p class="zona-direccion">DIRECCION: <?=$entrada_actual['calle']?>, colonia <?=$entrada_actual['colonia']?></p>
		<p class="zona-direccion">CODIGO POSTAL: <?=$entrada_actual['cpostal']?></p>
		<P class="zona-direccion">TIPO DE ZONA: <?=$entrada_actual['tipo']?></P>
		<P class="zona-direccion">ARBOLES: <?=$entrada_actual['arboles']?></P>
		<p class="zona-direccion">CREADO POR USUARIO: <?=$entrada_actual['usuario']?> (<?=$entrada_actual['contacto']?>)</p>

		<?php if(isset($_SESSION['usuario'])):?>
		<div>Deseas actualizar los datos? <a  class="boton" href="editar-entrada.php?id=<?=$entrada_actual['id']?>">ACTUALIZAR</a></div>
		<div>O borrar el area verde! <a class="boton" href="php/borrar-entrada.php?id=<?=$entrada_actual['id']?>">BORRAR</a></div>
		</div>
		<?php else:?>
			<div>hola</div>
			<div>hola</div>
		<?php endif;?>

	</article>


	</main>
	<aside class="asidedos"></aside>
</div>

<?php require_once 'includes/footer.php'; ?>
