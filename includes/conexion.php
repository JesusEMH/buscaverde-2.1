<?php
// Conexión
$servidor = 'localhost';
$usuario = 'root';
$password = 'wilsonmaniaco';
$basededatos = 'buscaverde';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
session_start();