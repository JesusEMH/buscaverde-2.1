<?php
if(isset($_POST['comentar'])){
	// Conexión a la base de datos
	require_once '../includes/conexion.php';

	if(!isset($_SESSION['usuario'])) {
		echo "no hay sesion";
	}else{
		echo "hay sesion";
	}

	$comentario = isset($_POST['comentar']) ? mysqli_real_escape_string($db, $_POST['comentario']) : false;

	// Array de errores
	$errores = array();
	
	// Validar los datos antes de guardarlos en la base de datos
	// Validar campo nombre
	if(!empty($comentario)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['comentario'] = "aun no has comentado nada!";
	}
	
	$iduser = $_SESSION['usuario']['id'];


		$sql = "INSERT INTO comentario VALUES(NULL, $iduser, '$comentario', 0, NOW());";
		$guardar = mysqli_query($db, $sql);

		header("Location: ../feed.php");
}

?>