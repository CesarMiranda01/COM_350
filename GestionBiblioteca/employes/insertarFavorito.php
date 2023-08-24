<?php 
	include 'conexion.php';
	$idLibro = $_GET['idLibro'];
	$consulta2 = $pdo->prepare("UPDATE registrarlibro SET favorito = 1 WHERE idLibro = '$idLibro'");
	$consulta2->execute();
	echo "Insertado a favoritos exitosamente.";
	header("Location: index.php");
?>