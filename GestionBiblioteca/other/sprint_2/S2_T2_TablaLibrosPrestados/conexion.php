<?php
// Datos de la conexión a la base de datos
$host = "localhost"; // Nombre del servidor
$usuario = "root"; // Nombre de usuario
$contrasena = ""; // Contraseña
$base_datos = "bd_com350_s2t2_tablafavoritos"; // Nombre de la base de datos

// Crear la conexión a la base de datos usando MySQLi
$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    // Mostrar un mensaje de error si la conexión falló
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>
