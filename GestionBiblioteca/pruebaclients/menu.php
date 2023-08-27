<?php
// Incluimos el archivo de conexión a la base de datos
include("conexion.php");

// Iniciamos una sesión
session_start();

// Verificamos si el usuario está logueado
if(!isset($_SESSION["id"])){
  // Si no está logueado, lo redirigimos al archivo login.php
  header("Location: login.php");
}

// Obtenemos el id del usuario de la variable de sesión
$id = $_SESSION["id"];

// Obtenemos el nombre del usuario de la base de datos
$sql = "SELECT nombre FROM usuarios WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
  // Si hay un resultado, lo guardamos en una variable
  $row = mysqli_fetch_assoc($result);
  $nombre = $row["nombre"];
}else{
  // Si no hay un resultado, mostramos un mensaje de error
  echo "No se encontró el nombre del usuario";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Menú</title>
  <!-- Incluimos el archivo de estilos css -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Bienvenido, <?php echo $nombre; ?></h1>
    <!-- Creamos un menú horizontal con las opciones solicitadas -->
    <div class="menu">
      <a href="home.php">Home</a>
      <a href="libros.php">Libros</a>
      <a href="favoritos.php">Favoritos</a>
      <a href="about.php">About</a>
      <a href="contactanos.php">Contáctanos</a>
    </div>
  </div>
</body>
</html>
