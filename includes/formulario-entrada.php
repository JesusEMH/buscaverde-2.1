
<?php if(isset($_SESSION['completado'])): ?>
		<div class="alerta alerta-exito">
		<?=$_SESSION['completado']?>
		</div>
		<?php elseif(isset($_SESSION['errores']['general'])): ?>
		<div class="alerta alerta-error">
			<?=$_SESSION['errores']['general']?>
		</div>
		<?php endif; ?>



			<form method="POST" action="php/guardar-entrada.php" class="feed-form-areasverdes">

			<label class="label-registro" for="nombre">NOMBRE: </label>
			<input class="feed-input" type="text" name="nombre">
			<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ; ?>


			<label class="label-registro" for="descripcion">DESCRIPCION: </label>
			<input class="feed-input" type="text" name="descripcion">
			<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ; ?>



			<label class="label-registro" for="calle">CALLE: </label>
			<input class="feed-input" type="text" name="calle" >
			<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'calle') : '' ; ?>

			<label class="label-registro" for="colonia">COLONIA:</label>
			<select class="feed-input" name="colonia">
			<?php 
				$colonias = conseguirColonias($db); 
				if(!empty($colonias)):
				while($colonia = mysqli_fetch_assoc($colonias)): 
			?>
				<option value="<?=$colonia['id']?>">
					<?=$colonia['colonia']?>
				</option>
			<?php
				endwhile;
				endif;
			?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'colonia') : ''; ?>


			<label class="label-registro" for="codigopostal">CODIGO POSTAL:</label>
			<select class="feed-input" name="codigopostal">
			<?php 
				$cpostal = conseguirCpostal($db); 
				if(!empty($cpostal)):
				while($postal = mysqli_fetch_assoc($cpostal)): 
			?>
				<option value="<?=$postal['id']?>">
					<?=$postal['codigopostal']?>
				</option>
			<?php
				endwhile;
				endif;
			?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'cpostal') : ''; ?>


			<label class="label-registro" for="tipo">TIPO DE ZONA:</label>
			<select class="feed-input" name="tipo">
			<?php 
				$tipos = conseguirTipo($db); 
				if(!empty($tipos)):
				while($tipo = mysqli_fetch_assoc($tipos)): 
			?>
				<option value="<?=$tipo['id']?>">
					<?=$tipo['tipo']?>
				</option>
			<?php
				endwhile;
				endif;
			?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'tipo') : ''; ?>


			<label class="label-registro" for="arboles">ARBOLES: </label>
			<input class="feed-input" type="text" name="arboles" >
			<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'arboles') : '' ; ?>


			<label class="label-registro" for="contacto">CONTACTO: </label>
			<input class="feed-input" type="email" name="contacto" >
			<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'contacto') : '' ; ?>


			<input class="boton" type="submit" name="registrado" value="INSERTAR AREA VERDE">
		</form>


		<?php borrarErrores(); ?>
