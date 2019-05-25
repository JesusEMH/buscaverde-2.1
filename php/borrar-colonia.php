<?php
require_once '../includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
	$id_colonia = $_GET['id'];
	
	$sql = "DELETE FROM direccion WHERE id = $id_colonia";
	$borrar = mysqli_query($db, $sql);
}

header("Location: ../colonias.php#agregados");
?>