<?php
// Obtener los datos del login enviados por el método POST
$ci = $_POST["ci"];
$pass = $_POST["password"];

// Conectar a la base de datos mysql
$conexion = mysqli_connect("localhost", "root", "", "gestionbiblioteca");

// Verificar si la conexión fue exitosa
if ($conexion) {
  // Preparar la consulta sql para buscar el usuario con el ci y la contraseña ingresados
  $sql = "SELECT nombres, privilegio FROM persona WHERE ci = '$ci' AND contrasena='$pass'";

  // Crear un objeto statement para ejecutar la consulta
  $stmt = mysqli_prepare($conexion, $sql);

  // Ejecutar la consulta
  mysqli_stmt_execute($stmt);

  // Obtener el resultado de la consulta
  $resultado = mysqli_stmt_get_result($stmt);

  // Verificar si se encontró algún registro que coincida con el login
  if (mysqli_num_rows($resultado) > 0) {
    // Obtener el nombre del usuario como un arreglo asociativo
    $fila = mysqli_fetch_assoc($resultado);

    // Devolver el nombre del usuario en formato JSON
    // echo json_encode(array("nombre" => $fila["nombres"]));
        // Devolver el nombre del usuario en formato JSON
    echo json_encode(array("privilegio" => $fila["privilegio"]));
  } else {
    // Devolver un mensaje de error en formato JSON
    echo json_encode(array("error" => "El ci o la contraseña son incorrectos"));
  }

  // Cerrar el statement y la conexión
  mysqli_stmt_close($stmt);
  mysqli_close($conexion);
} else {
  // Devolver un mensaje de error en formato JSON
  echo json_encode(array("error" => "No se pudo conectar a la base de datos"));
}
?>
