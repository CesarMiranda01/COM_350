<?php 
	include 'conexion1.php';
	$idlibro = $_GET['idLibro'];
	$consulta2 = $pdo->prepare("UPDATE libro SET favorito = 1 WHERE idLibro = '$idlibro'");
	$consulta2->execute();
	// echo "Insertado a favoritos exitosamente.";
	// header("Location: buscar_libros.php");
?>



