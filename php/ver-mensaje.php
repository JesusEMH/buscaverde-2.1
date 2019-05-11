<?php
require_once '../includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
	$id_mensaje = $_GET['id'];
	
	$sql = "UPDATE mensajes SET leido='0' WHERE id = $id_mensaje";
	$borrar = mysqli_query($db, $sql);
}

header("Location: ../mimensaje.php?id=$id_mensaje");
?>