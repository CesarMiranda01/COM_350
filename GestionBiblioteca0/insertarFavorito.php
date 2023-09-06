<?php 
	include 'conexion.php';
	$idlibro = $_GET['idlibro'];
	$consulta2 = $pdo->prepare("UPDATE libros SET favorito = 1 WHERE idlibro = '$idlibro'");
	$consulta2->execute();
	echo "Insertado a favoritos exitosamente.";
	header("Location: index.php");
?>