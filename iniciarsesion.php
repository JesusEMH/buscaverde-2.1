<?php require_once 'includes/cabeceratres.php'; ?>

<aside class="asideuno"></aside>

<main class="main" >
	<div class="form-container">


	<?php if(isset($_SESSION['usuario'])) : ?>
	<p>ya has iniciado sesion</p>
	<?php else: ?>
		
			<form method="POST" action="php/login.php" class="form-login">

				<?php if (isset($_SESSION['error_login'])) : ?>
					<div class="alerta alerta-error">
					<?= $_SESSION['error_login']; ?>
					</div>
				<?php endif; ?>
				<h2 class="subtitulo">LOGUEATE Y EDITA LO QUE QUIERAS</h2>
					<label class="label-login" for="email">CORREO ELECTRONICO: </label><input class="input-form" type="text" name="email">
					<label class="label-login" for="password">CONTRASENA: </label><input class="input-form" type="password" name="password">
					<input id="form-submit" class="boton" type="submit" name="logueate" value="INGRESAR">
					<p class="registrate-login" href="formulario.php">No tienes una cuenta?, consultalo con el usuario administrador.</p>
			</form><?php borrarErrores();?>
	<?php endif; ?>
</div>
</main>
<aside class="asidedos"></aside>	

<?php require_once 'includes/footer.php'; ?>
