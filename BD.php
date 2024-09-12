<?php
// Archivo: BD.php (o db_connect.php)

$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$basededatos = "rol"; // Cambia por el nombre de tu base de datos

// Crear conexión
$enlace = mysqli_connect($servidor, $usuario, $contraseña, $basededatos);

// Verificar conexión
if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
?>
