<?php

if(isset($_POST)){
	
	require_once '../includes/conexion.php';
	
	$asunto = isset($_POST['asunto']) ? mysqli_real_escape_string($db, $_POST['asunto']) : false;

	$mensaje = isset($_POST['mensaje']) ? mysqli_real_escape_string($db, $_POST['mensaje']) : false;


	$usuario = isset($_POST['usuario']) ? (int)$_POST['usuario'] : false;

	$usuario_id = $_SESSION['usuario']['id'];

	// Validación
	$errores = array();

	if(empty($asunto)){
		$errores['asunto'] = 'El asunto esta vacio';
	}
	
	if(empty($mensaje)){
		$errores['mensaje'] = 'El mensaje esta vacio';
	}

	if(empty($usuario) && !is_numeric($usuario)){
		$errores['usuario'] = 'el usuario no existe';
	}
	
	if(count($errores) == 0){
			$sql = "INSERT INTO mensajes VALUES(null, '$asunto', '$mensaje', $usuario_id, $usuario,  now(), 1);";
		
		$guardar = mysqli_query($db, $sql);

		
	}

}
	header("Location: ../mensajes.php");
?>