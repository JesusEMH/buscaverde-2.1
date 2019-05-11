<?php require_once './includes/cabecera.php' ?>

<div class="feed">

<?php require_once './includes/aside-feed.php' ?>

	<main class="mensaje-main" >


		
	<p class="feed-titulo">BANDEJA DE ENTRADA DE <?= $_SESSION['usuario']['nombre']?> <?=$_SESSION['usuario']['apellido'] ?></p>

	<div >
		<form method="POST" action="./php/enviar-mensaje.php" class="form-mensaje">
			<label>PARA</label>

			<select class="mensaje-input" name="usuario">
				<?php 
					$usuarios = conseguirUsuario($db); 
					if(!empty($usuarios)):
					while($usuario = mysqli_fetch_assoc($usuarios)): 
				?>
					<option value="<?=$usuario['id']?>">
						<?=$usuario['nombre']?>
					</option>
				<?php
					endwhile;
					endif;
				?>
			</select>


			<label>ASUNTO</label>
			<input class="mensaje-input" type="text" name="asunto">
			<label>MENSAJE</label>		
			<textarea class="mensaje-input" name="mensaje"></textarea>
			<input  class="boton" type="submit" name="enviar" value="ENVIAR MENSAJE" >
		</form>
	</div>
			
					
		</main>
<?php require_once 'includes/aside-tareas.php' ?>
</div>
<?php require_once 'includes/footer.php' ?>