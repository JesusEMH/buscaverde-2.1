<?php
if(isset($_POST)){
	// Conexión a la base de datos
	require_once '../includes/conexion.php';
	
	$nombre = isset($_POST['tipo']) ? mysqli_real_escape_string($db, $_POST['tipo']) : false;
	
	// Array de errores
	$errores = array();
	
	// Validar los datos antes de guardarlos en la base de datos
	// Validar campo nombre
	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['tipo'] = "El tipo de zona no es válido";
	}
	
	if(count($errores) == 0){
		$sql = "INSERT INTO tipo VALUES(NULL, '$nombre');";
		$guardar = mysqli_query($db, $sql);
	}
	
}

header("Location: ../tipos.php#agregados");
?>