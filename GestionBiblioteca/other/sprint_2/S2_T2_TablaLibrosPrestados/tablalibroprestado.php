<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de libros</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Tabla de libros</h1>
    <!-- Creación de la tabla -->
    <table id="tabla-libros">
        <!-- Encabezado de la tabla -->
        <thead>
            <tr>
                <th>Nombre del libro</th>
                <th>Autor del libro</th>
                <th>Edición del libro</th>
                <th>Fecha de prestado</th>
                <th>Fecha de entrega</th>
                <th>Nombre del acreedor</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            <!-- Aquí se insertarán las filas con los datos de los libros desde PHP -->
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
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['autor'] . "</td>";
                        echo "<td>" . $fila['edicion'] . "</td>";
                        echo "<td>" . $fila['prestado'] . "</td>";
                        echo "<td>" . $fila['entrega'] . "</td>";
                        echo "<td>" . $fila['acreedor'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Mostrar un mensaje si no hay libros en la tabla
                    echo "<tr><td colspan='6'>No hay libros en la tabla</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <!-- Crear un botón estático de salir que redirige a otra página -->
    <button id="boton-salir">Salir</button>
    <!-- Enlace al archivo JavaScript -->
    <script src="salir.js"></script>
</body>
</html>
