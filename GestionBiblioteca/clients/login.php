<?php
// Incluimos el archivo de conexión a la base de datos
include("conexion.php");

// Iniciamos una sesión
session_start();

// Verificamos si el usuario ya está logueado
if(isset($_SESSION["id"])){
  // Si ya está logueado, lo redirigimos al archivo menu.php
  header("Location: menu.php");
}

// Definimos unas variables para almacenar los posibles errores
$error_id = "";
$error_pass = "";
$error_login = "";

// Verificamos si se ha enviado el formulario de login
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Obtenemos los datos ingresados por el usuario
  $id = $_POST["id"];
  $pass = $_POST["pass"];

  // Validamos los datos
  if(empty($id)){
    // Si el id está vacío, mostramos un mensaje de error
    $error_id = "Por favor, ingrese su id";
  }
  if(empty($pass)){
    // Si la contraseña está vacía, mostramos un mensaje de error
    $error_pass = "Por favor, ingrese su contraseña";
  }
  if(!empty($id) && !empty($pass)){
    // Si ambos datos están llenos, verificamos si coinciden con algún registro de la base de datos
    $sql = "SELECT * FROM usuarios WHERE id = '$id' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      // Si hay una coincidencia, guardamos el id del usuario en una variable de sesión
      $_SESSION["id"] = $id;
      // Y lo redirigimos al archivo menu.php
      header("Location: menu.php");
    }else{
      // Si no hay una coincidencia, mostramos un mensaje de error
      $error_login = "Id o contraseña incorrectos";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <!-- Incluimos el archivo de estilos css -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group">
        <label for="id">Id:</label>
        <input type="text" name="id" id="id" value="<?php echo $id; ?>">
        <span class="error"><?php echo $error_id; ?></span>
      </div>
      <div class="form-group">
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass">
        <span class="error"><?php echo $error_pass; ?></span>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Ingresar">
        <span class="error"><?php echo $error_login; ?></span>
      </div>
    </form>
  </div>
</body>
</html>
