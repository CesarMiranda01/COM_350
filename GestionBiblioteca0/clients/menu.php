<?php
// Incluimos el archivo de conexión a la base de datos
include("conexion.php");

// Iniciamos una sesión
session_start();

/* // Verificamos si el usuario está logueado
if(!isset($_SESSION["id"])){
  // Si no está logueado, lo redirigimos al archivo login.php
  header("Location: login.php");
} */
// Obtenemos el id del usuario de la variable de sesión

/* $pass = $_SESSION["pass"]; */
$nameclient = $_SESSION["nameclient"];
$lastnameclient = $_SESSION["lastnameclient"];
$idclinet = $_SESSION["idclient"];
// Obtenemos el nombre del usuario de la base de datos
/* $sql = "SELECT nombre FROM clientes WHERE idcliente = '$id' AND contrasena='$pass";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
  // Si hay un resultado, lo guardamos en una variable
  $row = mysqli_fetch_assoc($result);
  $nombre = $row["nombre"];
  $_SESSION[$nombre];

}else{
  // Si no hay un resultado, mostramos un mensaje de error
  echo "No se encontró el nombre del usuario";
} */

// This is the PHP file for a manager user
// It displays a horizontal menu with the options: home, managers, empleados, libros, links and about

// Include the CSS file for styling
echo "<link rel='stylesheet' href='styles.css'>";

// Include the JavaScript file for interactivity
echo "<script src='script.js'></script>";
echo "    <h1>BIBLIOTECA VIRTUAL</h1>";
echo $nameclient . " " . $lastnameclient;
// Define an array of menu items
$menu_items = array("BUSCAR_LIBROS", "LIBROS_FAVORITOS", "BUSQUEDAS", "CONTACTANOS", "ACRECA DE NOSOTROS");
//$menu_files = array("hogar.php","admin.php", "employes.php", "books.php", "links.php", "about.php");

// Create a div element for the menu container
echo "<div id='menu'>";

// Loop through the menu items and create a list element for each one
foreach ($menu_items as $item) {
  // Create a list item element with a link to the corresponding page
  echo "<li><a href='$item.php'>$item</a></li>";
}

// Close the div element for the menu container
echo "</div>";
?>
