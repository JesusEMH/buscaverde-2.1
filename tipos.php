<?php require_once './includes/cabecera.php' ?>
<div class="bodydos">
	<div class="banner">
		<h1 class="titulo-banner">FILTRO DE AREAS VERDES POR TIPO</h1>
		<div><img class="letrero" src="assets/img/arboleda.png">
		</div>
		<div class="articulo-banner-dos">

		

			<?php if(isset($_GET['id']) && isset($_GET['tipo'])): ?>
				<article class="articulo-link">
				<p>ZONAS VERDES <br> DEL TIPO <br class="mayuscula"><?php echo $_GET['tipo']; ?></p>
				</article>
	<?php 
		$entradastip = conseguirEntradasTipo($db, $_GET['id']);

		if (!empty($entradastip)) : 
		while ($entradatip = mysqli_fetch_assoc($entradastip)) :

	?> 

			<article>
				<a class="articulo" href="articulo.php?id=<?=$_GET['id']?>">
				<h2 class="articulo-titulo radius"><?= $entradatip['nombre']?></h2>
				<p class="articulo-parrafo radius"><?=substr($entradatip['descripcion'], 0, 100).' ...'?></p>
				<p class="articulo-tipo radius"><?=$entradatip['tipo']?></p>
				<p class="articulo-fecha radius"><?=$entradatip['fecha']?></p>
				</a>
			</article>


	<?php
			endwhile;
		else: ?>
	<?php endif; ?> 

			<?php else:?>

				<p class="centrado">AQUI SE MOSTRARAN LAS ZONAS VERDES CON EL TIPO SELECIONADO!</p>
<?php endif; ?>

		
	</div>
</div>

	<aside class="asideuno"></aside>
	<main class="main">
		<form class="buscar-colonia" method="POST">
			<input class="input-colonia" type="text" name="buscar">
			<input class="boton-lupa" type="image" src="assets/img/lupa.png">
		</form>

		<?php if (isset($_SESSION['usuario'])): ?>
		<button id="boton-mostrar" class="boton">AGREGAR NUEVOS TIPOS +</button>		
		<?php else: ?>
	<?php endif; ?>

	<div id="form-agregar" class="form-agregar-caja">
		
		<div class="form-agregar">
					<form class="form-agregar" method="POST" action="./php/guardar-tipo.php">
						<label>NUEVO TIPO: </label>
						<input type="text" name="tipo" class="input-mostrarlo" placeholder="agregar nuevo tipo">
					
						<input class="boton" type="submit" name="enviar" value="AGREGAR" >
					</form>
				</div>	 
		

			</div>

		<div class="colonias-todo">
			<?php 
			if(isset($_POST['buscar'])):?>
				<?php 
					$entradas = conseguirBusquedaTipo($db, $_POST['buscar']);
					if(!empty($entradas)):
						while($entrada = mysqli_fetch_assoc($entradas)):
				?>
				<div class="colonia-contenedor">
					<a class="colonia-titulo" href="tipos.php?id=<?=$entrada['id']?>&tipo=<?=$entrada['tipo']?>"><?=$entrada['tipo']?></a>
					<p class="colonia-sobra">
						<?php if(isset($_SESSION['usuario'])):?>
						<a class="borrarlo" href="./php/borrar-tipo.php?id=<?=$entrada['id']?>"> BORRAR COLONIA</a>
						<?php else: ?>
							<a class="borrarlo" href="#">inicia sesion para borrar</a>
						<?php endif; ?>
					</p>
				</div>
			<?php endwhile; ?>
		<?php endif;?>

		<?php else: ?>
			
	<?php 

		$tipos = conseguirtipo($db);
		if (!empty($tipos)) : 
			
		while ($tipo = mysqli_fetch_assoc($tipos)) :
	?>
				<div class="colonia-contenedor">
					<a class="colonia-titulo" href="tipos.php?id=<?=$tipo['id']?>&tipo=<?=$tipo['tipo']?>"><?=$tipo['tipo']?></a>
					<p class="colonia-sobra">
						<?php if(isset($_SESSION['usuario'])):?>
						<a class="borrarlo" href="./php/borrar-tipo.php?id=<?=$tipo['id']?>"> BORRAR TIPO</a>
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