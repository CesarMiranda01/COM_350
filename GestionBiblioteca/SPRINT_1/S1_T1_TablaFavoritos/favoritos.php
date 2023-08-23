<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabla de favoritos</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Tabla de favoritos</h1>
    <!-- Creación de la tabla -->
    <table id="tabla-favoritos">
        <!-- Encabezado de la tabla -->
        <thead>
            <tr>
                <th>Título del libro</th>
                <th>ID del libro</th>
                <th>Autor del libro</th>
                <th>Edición del libro</th>
                <th>Estado del libro</th>
                <th>Acción</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            <!-- Aquí se insertarán las filas con los datos de los libros desde PHP -->
            <?php
                // Incluir el archivo PHP que contiene el código para insertar los datos de los libros
                include 'tabla.php';
            ?>
        </tbody>
    </table>
    <!-- Crear un botón de salir que redirige a otra página -->
    <button id="boton-salir">Salir</button>
    <!-- Enlace a los archivos JavaScript -->
    <script src="eliminar.js"></script>
    <script src="salir.js"></script>
</body>
</html>
