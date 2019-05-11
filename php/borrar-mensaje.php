<?php
require_once '../includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
	$id_mensaje = $_GET['id'];
	
	$sql = "DELETE FROM mensajes WHERE id = $id_mensaje";
	$borrar = mysqli_query($db, $sql);
}

header("Location: ../mensajes.php");
?>