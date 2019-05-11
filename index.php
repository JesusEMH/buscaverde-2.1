<?php require_once './includes/cabecera.php' ?>
<div class="body">

	<div class="banner">
		<h1 class="titulo-banner">SISTEMA DE INVENTARIO DE AREAS VERDES DE LA CIUDAD!</h1>
		<div><img class="arbol" src="assets/img/arbol.png"></div>

		<div class="articulo-banner">
			<article class="articulo-link">
				<p>ULTIMAS <br> ZONAS VERDES <br> AGREGADAS</p>
			</article>
	
	<?php 
	$entradas = conseguirUltimasEntradas($db, true);
	if(!empty($entradas)):
		while($entrada = mysqli_fetch_assoc($entradas)):
	?>
	<article>
		<a class="articulo" href="articulo.php?id=<?=$entrada['id']?>">
			<h2 class="articulo-titulo radius"><?= $entrada['nombre']?></h2>
			<p class="articulo-parrafo radius"><?=substr($entrada['descripcion'], 0, 100).' ...'?></p>
			<p class="articulo-tipo radius"><?=$entrada['tipo']?></p>
			<p class="articulo-fecha radius"><?=$entrada['fecha']?></p>
		</a>
	</article>
	<?php
			endwhile;
		endif; 
	?>
			<article class="articulo-link" id="articulo-link">
				<a href="vertodo.php">
					<p>EXPLORAR TODAS LAS ZONAS<br> VERDES!</p>
				</a>
			</article>
</div>
</div>

	<aside class="asideuno"></aside>

	<main class="main" >
		<h2 class="titulo-banner">QUE AREA VERDE BUSCO?</h2>

		<div class="selecciona">

			<article class="tipos">
				<div class="circulo">
					<img class="imgredonda buzon" src="assets/img/arboleda.png">
					<p class="selecciona-titulo">filtro por tipo de zona</p>	
				</div>
				
				<p class="padding selecciona-parrafo">Hay terrenos, Parques publicos, reservas ambientales, todo tipo de zonas y las que quedan por haber.</p>
				<center><button id="boton-selecciona" class="boton"><a href="tipos.php">BUSCAR</a></button></center>
			</article>

			<article class="tipos">
				<div class="circulo">
					<img class="imgredonda buzon" src="assets/img/letrero.png">
					<p class="selecciona-titulo">filtro por tipo de colonia</p></div>

					<P class="padding selecciona-parrafo" >Tenemos fraccionamientos, colonias, ejidos, para localizar el lugar preciso del area verde.</P>

				<center><button id="boton-selecciona" class="boton"><a href="colonias.php">BUSCAR</a></button></center>
			</article>

			<article class="tipos">
				<div class="circulo">
					<img class="imgredonda buzon" src="assets/img/buzon.png">
					<p class="selecciona-titulo">filtro por codigo postal</p></div>
					<p class="padding selecciona-parrafo">el codigo postal es tan importante como saber nuestro uso horario, a veces salva vidas, como ahora.</p>
				<center><button id="boton-selecciona" class="boton"><a href="codigopostal.php">BUSCAR</a></button></center>
			</article>

		</div>
	</main>
	<aside class="asidedos"></aside>
</div>

<?php require_once 'includes/footer.php' ?>