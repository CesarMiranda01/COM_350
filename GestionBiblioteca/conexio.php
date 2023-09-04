<?php
// Se definen los datos de la conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmyadmin";

// Se crea la conexión usando la clase mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Se comprueba si hay algún error en la conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
