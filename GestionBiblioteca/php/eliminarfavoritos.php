<?php 
	include('conexion1.php');
	if (isset($_POST['eliminarfavoritos'])) {
		$idlibro = $_POST['idlibro'];
		$consulta = $pdo->prepare("UPDATE libro SET favorito=0 WHERE idlibro=:idlibro");
		$consulta->bindParam(':idlibro', $idlibro);
		$consulta->execute();
		// header('Location: LIBROS_FAVORITOS.php');
	}
 ?>
