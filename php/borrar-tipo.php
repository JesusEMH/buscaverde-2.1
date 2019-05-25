<?php
require_once '../includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
	$id_tipo = $_GET['id'];
	
	$sql = "DELETE FROM tipo WHERE id = $id_tipo";
	$borrar = mysqli_query($db, $sql);
}

header("Location: ../tipos.php#agregados");
?>