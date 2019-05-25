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
		<div class="zona-caja-actualizar">
				<div class="zona-actualizar"><a  class="boton" href="editar-entrada.php?id=<?=$entrada_actual['id']?>">ACTUALIZAR DATOS</a></div>
				<div class="zona-actualizar"><a class="boton" href="php/borrar-entrada.php?id=<?=$entrada_actual['id']?>">BORRAR TODO</a></div>
				</div>
		</div>
		<?php else:?>
			<div class="zona-alerta">inicia sesion para que puedas actualizar esta informacion.</div>
			<div class="zona-alerta">inicia sesion para borrar esta informacion.</div>
		<?php endif;?>

	</article>


	</main>
	<aside class="asidedos"></aside>
</div>

<footer class="footer">
	<img class="tec" src="assets/img/tec.png">
	<img class="mat" src="assets/img/mat.png">
</footer>
<script type="text/javascript" src="./js/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="./js/mostrar.js"></script>
</body>
</html>
