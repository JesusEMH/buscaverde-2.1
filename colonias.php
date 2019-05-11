<?php require_once './includes/cabecera.php' ?>
<div class="bodydos">
	<div class="banner">
		<h1 class="titulo-banner">FILTRO DE AREAS VERDES POR COLONIA</h1>
		<div><img class="letrero" src="assets/img/letrero.png">
		</div>
		<div class="articulo-banner-dos">

		

			<?php if(isset($_GET['id']) && isset($_GET['colonia'])): ?>
				<article class="articulo-link">
				<p>ZONAS VERDES <br> DE LA COLONIA <br class="mayuscula"><?php echo $_GET['colonia']; ?></p>
			</article>
			<?php 
				$entradascol = conseguirEntradasColonia($db, $_GET['id']);

				if (!empty($entradascol)) : 
				while ($entradacol = mysqli_fetch_assoc($entradascol)) :
			?> 

			<article>
				<a class="articulo" href="articulo.php?id=<?=$_POST['id']?>">
				<h2 class="articulo-titulo radius"><?= $entradacol['nombre']?></h2>
				<p class="articulo-parrafo radius"><?=substr($entradacol['descripcion'], 0, 100).' ...'?></p>
				<p class="articulo-tipo radius"><?=$entradacol['tipo']?></p>
				<p class="articulo-fecha radius"><?=$entradacol['fecha']?></p>
				</a>
			</article>


	<?php
			endwhile;
		else: ?>
	<?php endif; ?> 

			<?php else:?>

				<p class="centrado">AQUI SE MOSTRARAN LAS ZONAS VERDES CON LA COLONIA SELECIONADA!</p>
<?php endif; ?>

		
	</div>
</div>

	<aside class="asideuno"></aside>
	<main class="main">
		<form class="buscar-colonia" method="POST" action="colonias.php">
			<input class="input-colonia" type="text" name="buscar">
			<input class="boton-lupa" type="image" name="buscado" src="assets/img/lupa.png">
		</form>
<?php if (isset($_SESSION['usuario'])): ?>
		<button id="boton-mostrar" class="boton">AGREGAR NUEVAS COLONIAS +</button>	 
		<?php else: ?>
<?php endif; ?>
	<div id="form-agregar" class="form-agregar-caja">
		<div class="form-agregar">
					<form class="form-agregar" method="POST" action="./php/guardar-colonia.php">
						<label>NUEVA COLONIA: </label>
						<input type="text" name="colonia" class="input-mostrarlo" placeholder="agregar colonia nueva">

						<input class="boton" type="submit" name="enviar" value="AGREGAR">
					
					</form>
				</div>
			</div>

		<div class="colonias-todo">
			<?php 
			if(isset($_POST['buscar'])):?>
				<?php 
					$entradas = conseguirBusquedaColonia($db, $_POST['buscar']);
					if(!empty($entradas)):
						while($entrada = mysqli_fetch_assoc($entradas)):
				?>
			
				<div class="colonia-contenedor">
					<a class="colonia-titulo" href="colonias.php?id=<?=$entrada['id']?>&colonia=<?=$entrada['colonia']?>"><?=$entrada['colonia']?></a>
					<p class="colonia-sobra">
						<?php if(isset($_SESSION['usuario'])):?>
						<a class="borrarlo" href="./php/borrar-colonia.php?id=<?=$entrada['id']?>"> BORRAR COLONIA</a>
						<?php else: ?>
							<a class="borrarlo" href="#">inicia sesion para borrar</a>
						<?php endif; ?>
					</p>
				</div>

			<?php endwhile; ?>
		<?php endif;?>

			<?php else: ?>
			<?php
			$colonias = conseguirColonias($db);
			if (!empty($colonias)) : 
				
			while ($colonia = mysqli_fetch_assoc($colonias)) :
		?>
				<div class="colonia-contenedor">
					<a class="colonia-titulo" href="colonias.php?id=<?=$colonia['id']?>&colonia=<?=$colonia['colonia']?>"><?=$colonia['colonia']?></a>
					<p class="colonia-sobra">
						<?php if(isset($_SESSION['usuario'])):?>
						<a class="borrarlo" href="./php/borrar-colonia.php?id=<?=$colonia['id']?>"> BORRAR COLONIA</a>
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