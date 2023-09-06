<?php
// Conexión a la base de datos local
$con = mysqli_connect("localhost:3906", "root", "", "gestionbiblioteca");
if ($con->connect_error){
    die ("No se pudo conectar con el servidor".$con->connect_error);
}
?>
