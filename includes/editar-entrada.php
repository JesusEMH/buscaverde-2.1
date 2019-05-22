<form method="POST" action="php/actualizar-entrada.php?id=<?=$entrada_actual['id']?>" class="feed-form-areasverdes">

			<label class="label-registro" for="nombre">NOMBRE: </label>
			<input class="feed-input" type="text" name="nombre" value="<?=$entrada_actual['nombre']?>">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ; ?>



			<label class="label-registro" for="descripcion">DESCRIPCION: </label>
			<input class="feed-input" type="text" name="descripcion" value="<?=$entrada_actual['descripcion']?>" >
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'descripcion') : '' ; ?>



			<label class="label-registro" for="calle">CALLE: </label>
			<input class="feed-input" type="text" name="calle" value="<?=$entrada_actual['calle']?>">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'calle') : '' ; ?>

			<label class="label-registro" for="colonia">COLONIA:</label>
			<select class="feed-input" name="colonia" value="<?=$colonia['id']?>">
			<?php 
				$colonias = conseguirColonias($db); 
				if(!empty($colonias)):
				while($colonia = mysqli_fetch_assoc($colonias)): 
			?>
				<option value="<?=$colonia['id']?>" <?=($colonia['id'] == $entrada_actual['direccion_id']) ? 'selected="selected"' : '' ?>>
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
				<option value="<?=$postal['id']?>" <?=($postal['id'] == $entrada_actual['cpostal_id']) ? 'selected="selected"' : '' ?>>
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
				<option value="<?=$tipo['id']?>" <?=($tipo['id'] == $entrada_actual['tipo_id']) ? 'selected="selected"' : '' ?>>
					<?=$tipo['tipo']?>
				</option>
			<?php
				endwhile;
				endif;
			?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'tipo') : ''; ?>


			<label class="label-registro" for="arboles">ARBOLES: </label>
			<input class="feed-input" type="text" name="arboles" value="<?=$entrada_actual['arboles']?>" >
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'arboles') : '' ; ?>


			<label class="label-registro" for="contacto">CONTACTO: </label>
			<input class="feed-input" type="email" name="contacto" value="<?=$entrada_actual['contacto']?>" >
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'contacto') : '' ; ?>


			<input class="boton editar-submit" type="submit" name="registrado" value="ACTUALIZAR AREA VERDE">
		</form>