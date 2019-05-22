	<form  method="POST" action="php/registro-usuario.php" class="feed-form-areasverdes">

			<label class="label-registro" for="name">NOMBRE: </label>
			<input class="feed-input" type="text" name="name">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'name') : '' ; ?>

			<label class="label-registro" for="lastname">APELLIDOS: </label>
			<input class="feed-input" type="text" name="lastname">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'lastname') : '' ; ?>

			<label class="label-registro" for="correo">EMAIL: </label>
			<input class="feed-input" type="email" name="correo">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'correo') : '' ; ?>

			<label class="label-registro" for="passw" >CONTRASENA: </label>
			<input class="feed-input" type="password" name="passw">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'passw') : '' ; ?>
			<input class="boton" type="submit" name="registrado" value="REGISTRARSE">
		</form>