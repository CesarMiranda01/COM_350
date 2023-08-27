<?php
// Incluimos el archivo de conexión a la base de datos
include("connection.php");

// Iniciamos una sesión
session_start();

// Definimos unas variables para almacenar los posibles errores
/* $error_id = "";
$error_pass = "";
$error_login = "";
$error_nombre = "";
$error_apellido = "";
$error_registrar = ""; */

// Verificamos si se ha enviado el formulario de login
if(isset($_POST["login"])){
  // Obtenemos los datos ingresados por el usuario
  $idclient = $_POST["idclient"];
  $passclient = $_POST["passclient"];

 /*  // Validamos los datos
  if(empty($id)){
    // Si el id está vacío, mostramos un mensaje de error
    $error_id = "Por favor, ingrese su id";
  }
  if(empty($pass)){
    // Si la contraseña está vacía, mostramos un mensaje de error
    $error_pass = "Por favor, ingrese su contraseña";
  } */
  if(!empty($idclient) && !empty($passclient)){
    // Si ambos datos están llenos, verificamos si coinciden con algún registro de la base de datos
    $sql = "SELECT * FROM clientes WHERE idcliente = '$idclient' AND contrasena = '$passclient'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row > 0){
      $nameclient = $row["nombres"];
      $lastnameclient = $row["apellidos"];
      // Si hay una coincidencia, guardamos el id del usuario en una variable de sesión
      $_SESSION["nameclient"] = $nameclient;
      $_SESSION["lastnameclient"] = $lastnameclient;  
      $_SESSION["idclient"] = $idclient; 
      // Y lo redirigimos al archivo menu.php
      header("Location: menu.php");
    }else{
      // Si no hay una coincidencia, mostramos un mensaje de error
      $error_login = "Id o contraseña incorrectos";
      header("Location: index.php");
    }
  }
}

// Verificamos si se ha enviado el formulario de registrar
if(isset($_POST["registrar"])){
  // Obtenemos los datos ingresados por el usuario
  $nameclient = $_POST["nameclient"];
  $lastnameclient = $_POST["lastnameclient"];
  $idclient = $_POST["idclient"];
  $addressclient = $_POST["addressclient"];
  $cellclient = $_POST["cellclient"];
  $passclient = $_POST["passclient"];

  /* // Validamos los datos
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
  } */
  if(!empty($nameclient) && !empty($lastnameclient) && !empty($idclient) && !empty($passclient)){
    // Si todos los datos están llenos, verificamos si el id ya existe en la base de datos
    $sql = "SELECT * FROM clientes WHERE idcliente = '$idclient'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      // Si el id ya existe, mostramos un mensaje de error
      echo "El ID YA EXISTE"; // Llamamos a la función de JavaScript
/*       echo '<script>
      function id_error(){
        var id_error = document.getElementById("id_error");
        id_error.innerHTML = "El id ya está en uso";
      }
      </script>';  */
      //header("Location: index.php"); 
    }else{
      // Si el id no existe, insertamos el nuevo usuario en la base de datos
      $sql = "INSERT INTO clientes (nombres, apellidos, idcliente, direccion, celular, contrasena) VALUES ('$nameclient', '$lastnameclient', '$idclient', '$addressclient', '$cellclient', '$passclient')";
      $row = mysqli_query($conn, $sql);
      if($row){
        // Si la inserción fue exitosa, guardamos el id del usuario en una variable de sesión
        echo "SE HA REGISTRADO CORRECTAMENTE";
        sleep(1);
        $_SESSION["nameclient"] = $nameclient;
        $_SESSION["lastnameclient"] = $lastnameclient;  
        $_SESSION["idclient"] = $idclient; 
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



