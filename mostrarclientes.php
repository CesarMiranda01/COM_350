<?php
// Aquí se incluye el archivo conexion.php
include("conexion.php");
// Se hace una consulta a la tabla clientes
$sql = "SELECT * FROM clientes";
// Se ejecuta la consulta y se guarda el resultado
$result = mysqli_query($conn, $sql);
// Se comprueba si hay filas en el resultado
if (mysqli_num_rows($result) > 0) {
  // Se crea una tabla para mostrar los datos
  echo "<table>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>Nombre</th>";
  echo "<th>Correo</th>";
  echo "<th>Teléfono</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  // Se recorren las filas del resultado y se muestran los datos en la tabla
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["nombre"] . "</td>";
    echo "<td>" . $row["correo"] . "</td>";
    echo "<td>" . $row["telefono"] . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
} else {
  // Si no hay filas en el resultado, se muestra un mensaje
  echo "<p>No hay clientes registrados</p>";
}
// Se cierra la conexión a la base de datos
mysqli_close($conn);
?>
