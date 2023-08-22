<?php
// Incluir el archivo PHP que se conecta a la base de datos
include 'conexion.php';
// Consultar los datos de los libros desde la tabla libros
$sql = "SELECT * FROM libros";
// Ejecutar la consulta y obtener el resultado
$resultado = mysqli_query($conexion, $sql);
// Verificar si hay filas en el resultado
if (mysqli_num_rows($resultado) > 0) {
    // Recorrer cada fila del resultado
    while ($fila = mysqli_fetch_assoc($resultado)) {
        // Crear una fila de la tabla con los datos de cada libro
        echo "<tr>";
        echo "<td>" . $fila['titulo'] . "</td>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['autor'] . "</td>";
        echo "<td>" . $fila['edicion'] . "</td>";
        echo "<td>" . $fila['estado'] . "</td>";
        // Crear un botón de eliminar con el id del libro como atributo
        echo "<td><button class='boton-eliminar' data-id='" . $fila['id'] . "'>Eliminar</button></td>";
        echo "</tr>";
    }
} else {
    // Mostrar un mensaje si no hay libros en la tabla
    echo "<tr><td colspan='6'>No hay libros en la tabla</td></tr>";
}
?>
