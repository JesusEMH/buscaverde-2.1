<?php require_once './includes/cabecera.php' ?>
<div class="bodydos">
	<div class="banner">
		<h1 class="titulo-banner">FILTRO DE AREAS VERDES POR CODIGO POSTAL</h1>
		<div><img class="letrero" src="assets/img/buzon.png">
		</div>
		<div class="articulo-banner-dos">

		

			<?php if(isset($_GET['id']) && isset($_GET['postal'])): ?>
				<article class="articulo-link">
				<p>ZONAS VERDES <br> DEl CODIGO POSTAL <br class="mayuscula"><?php echo $_GET['postal']; ?></p>
			</article>
		<?php 
			$entradascp = conseguirEntradasCpostal($db, $_GET['id']);

			if (!empty($entradascp)) : 
			while ($entradacp = mysqli_fetch_assoc($entradascp)) :
		?> 

			<article>
				<a class="articulo" href="articulo.php?id=<?=$entradacp['id']?>">
				<h2 class="articulo-titulo radius"><?= $entradacp['nombre']?></h2>
				<p class="articulo-parrafo radius"><?=substr($entradacp['descripcion'], 0, 100).' ...'?></p>
				<p class="articulo-tipo radius"><?=$entradacp['tipo']?></p>
				<p class="articulo-fecha radius"><?=$entradacp['fecha']?></p>
				</a>
			</article>


	<?php
			endwhile;
		else: ?>
	<?php endif; ?> 

			<?php else:?>

				<p class="centrado">AQUI SE MOSTRARAN LAS ZONAS VERDES CON EL CODIGO POSTAL SELECIONADO!</p>
<?php endif; ?>

		
	</div>
</div>

	<aside class="asideuno"></aside>
	<main id="agregados" class="main">
		<form class="buscar-colonia" method="POST" action="codigopostal.php#agregados">
			<input class="input-colonia" type="text" name="buscar">
			<input class="boton-lupa" type="image" src="assets/img/lupa.png">
		</form>
		<?php if (isset($_SESSION['usuario'])): ?>
		<button id="boton-mostrar" class="boton">AGREGAR NUEVOS CODIGOS +</button>					 
			<?php else: ?>
		<?php endif; ?>
	<div id="form-agregar" class="form-agregar-caja">
		<div class="form-agregar">
					<form class="form-agregar" method="POST" action="./php/guardar-codigopostal.php">
						<label>NUEVO CODIGO POSTAL: </label>
						<input type="text" name="codigop" class="input-mostrarlo" placeholder="agregar nuevo codigo">

						<input class="boton" type="submit" name="enviar" value="AGREGAR">
					</form>
				</div>
			</div>

		<div class="colonias-todo">

			<?php 
			if(isset($_POST['buscar'])):?>
				<?php 
					$entradas = conseguirBusquedaCpostal($db, $_POST['buscar']);
					if(!empty($entradas)):
						while($entrada = mysqli_fetch_assoc($entradas)):
				?>
				<div class="colonia-contenedor">
					<a class="colonia-titulo" href="codigopostal.php?id=<?=$entrada['id']?>&postal=<?=$entrada['codigopostal']?>"><?=$entrada['codigopostal']?></a>
					<p class="colonia-sobra">
						<?php if(isset($_SESSION['usuario'])):?>
						<a class="borrarlo" href="./php/borrar-codigopostal.php?id=<?=$entrada['id']?>"> BORRAR CODIGO POSTAL</a>
						<?php else: ?>
							<a class="borrarlo" href="#">inicia sesion para borrar</a>
						<?php endif; ?>
					</p>
				</div>
				<?php endwhile; ?>
			<?php endif;?>
		<?php else: ?>

		<?php 

			$cpostales = conseguirCpostal($db);

			if (!empty($cpostales)) : 
			while ($cpostal = mysqli_fetch_assoc($cpostales)) :
		?> 
				<div class="colonia-contenedor">
					<a class="colonia-titulo" href="codigopostal.php?id=<?=$cpostal['id']?>&postal=<?=$cpostal['codigopostal']?>"><?=$cpostal['codigopostal']?></a>
					<p class="colonia-sobra">
						<?php if(isset($_SESSION['usuario'])):?>
						<a class="borrarlo" href="./php/borrar-codigopostal.php?id=<?=$cpostal['id']?>"> BORRAR CODIGO POSTAL</a>
						<?php else: ?>
							<a class="borrarlo" href="#">inicia sesion para borrar</a>
						<?php endif; ?>
					</p>
				</div>
			<?php
					endwhile;
				endif; 
			endif; 
			?>
		</div>
	</main>
	<aside class="asidedos"></aside>
	</div>
<?php require_once './includes/footer.php' ?>