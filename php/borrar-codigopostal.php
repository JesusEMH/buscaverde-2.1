<?php
require_once '../includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
	$id_cpostal = $_GET['id'];
	
	$sql = "DELETE FROM codigopostal WHERE id = $id_cpostal";
	$borrar = mysqli_query($db, $sql);
}

header("Location: ../codigopostal.php");
?>