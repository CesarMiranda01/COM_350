<?php
// Definimos los datos de conexión a la base de datos
$servername = "localhost:3906";
$username = "root";
$password = "";
$dbname = "proybiblioteca";

// Creamos una conexión usando la función mysqli_connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificamos si la conexión fue exitosa
if(!$conn){
  // Si no fue exitosa, mostramos un mensaje de error y terminamos el script
  die("Conexión fallida: " . mysqli_connect_error());
}
?>