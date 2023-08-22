<?php
// Incluir el archivo PHP que se conecta a la base de datos
include 'conexion.php';
// Obtener el id del libro que se envía por el método POST
$id = $_POST['id'];
// Crear una sentencia SQL para borrar el libro de la tabla libros usando el id
$sql = "DELETE FROM libros WHERE id = $id";
// Ejecutar la sentencia SQL y obtener el resultado
$resultado = mysqli_query($conexion, $sql);
// Verificar si la operación fue exitosa
if ($resultado) {
    // Devolver un mensaje de éxito
    echo "Exito";
} else {
    // Devolver un mensaje de error con la causa
    echo "Error al eliminar el libro: " . mysqli_error($conexion);
}
?>
