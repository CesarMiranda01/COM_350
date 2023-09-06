<?php
	session_start();
	include ('conexion.php');
	$ci = $_POST['ci'];
	$password = $_POST['password'];
	$consulta = $pdo->prepare("SELECT * FROM persona WHERE ci='$ci'");
	$consulta->execute();
	if ($consulta->rowCount() >= 1) {
		while (($fila = $consulta->fetch())) {

			if (password_verify($password, $fila['password'])) {
					$_SESSION['ci'] = $fila['ci'];
					$_SESSION['nombres'] = $fila['nombres'];
				}
				else{
					echo "Verifique su contraseña.";
				}
			}
	}
	else{
		echo "Verifique su carnet.";
	}
?>