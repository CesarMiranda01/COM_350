<link rel="stylesheet" href="css/styless.css"> <!-- Esta es la línea que se añade -->
<?php
// Aquí se incluye el archivo conexion.php
include("conexion.php");
// Se hace una consulta a la tabla clientes
$sql = "SELECT * FROM libro";
// Se ejecuta la consulta y se guarda el resultado
$result = mysqli_query($con, $sql);
// Se comprueba si hay filas en el resultado
if (mysqli_num_rows($result) > 0) {
  // Se crea una tabla para mostrar los datos
  echo "<table>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>Titulo</th>";
  echo "<th>Autor</th>";
  echo "<th>Codigo</th>";
  echo "<th>Edicion</th>";
  echo "<th>Editorial</th>";
  echo "<th>Favorito</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  // Se recorren las filas del resultado y se muestran los datos en la tabla
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["titulo"] . "</td>";
    echo "<td>" . $row["autor"] . "</td>";
    echo "<td>" . $row["codigo"] . "</td>";
    echo "<td>" . $row["edicion"] . "</td>";
    echo "<td>" . $row["editorial"] . "</td>";
    echo "<td>" . $row["favorito"] . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
} else {
  // Si no hay filas en el resultado, se muestra un mensaje
  echo "<p>No hay clientes registrados</p>";
}
// Se cierra la conexión a la base de datos
mysqli_close($con);
?>
