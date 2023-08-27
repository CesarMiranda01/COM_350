
//ESTE EL EL LOGIN PARA CLIENTES QUE FUE DEPURADO
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
$error_nombre = "";
$error_apellido = "";
$error_registrar = "";

// Verificamos si se ha enviado el formulario de login
if(isset($_POST["login"])){
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

// Verificamos si se ha enviado el formulario de registrar
if(isset($_POST["registrar"])){
  // Obtenemos los datos ingresados por el usuario
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $id = $_POST["id"];
  $pass = $_POST["pass"];

  // Validamos los datos
  if(empty($nombre)){
    // Si el nombre está vacío, mostramos un mensaje de error
    $error_nombre = "Por favor, ingrese su nombre";
  }
  if(empty($apellido)){
    // Si el apellido está vacío, mostramos un mensaje de error
    $error_apellido = "Por favor, ingrese su apellido";
  }
  if(empty($id)){
    // Si el id está vacío, mostramos un mensaje de error
    $error_id = "Por favor, ingrese su id";
  }
  if(empty($pass)){
    // Si la contraseña está vacía, mostramos un mensaje de error
    $error_pass = "Por favor, ingrese su contraseña";
  }
  if(!empty($nombre) && !empty($apellido) && !empty($id) && !empty($pass)){
    // Si todos los datos están llenos, verificamos si el id ya existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      // Si el id ya existe, mostramos un mensaje de error
      $error_registrar = "El id ya está en uso";
    }else{
      // Si el id no existe, insertamos el nuevo usuario en la base de datos
      $sql = "INSERT INTO usuarios (nombre, apellido, id, pass) VALUES ('$nombre', '$apellido', '$id', '$pass')";
      if(mysqli_query($conn, $sql)){
        // Si la inserción fue exitosa, guardamos el id del usuario en una variable de sesión
        $_SESSION["id"] = $id;
        // Y lo redirigimos al archivo menu.php
        header("Location: menu.php");
      }else{
        // Si la inserción falló, mostramos un mensaje de error
        $error_registrar = "Error al registrar el usuario";
      }
    }
  }
}
?>



