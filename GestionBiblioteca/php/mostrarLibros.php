<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/styless.css"> <!-- Esta es la línea que se añade -->
</head>
<body>
	<?php 
		include('conexion1.php');
		$consulta = $pdo->prepare("SELECT * FROM libro");
	  	$consulta->execute();
	  	echo "
	  			<table border=1>
	  				<th>id</th>
	  				<th>Titulo</th>
	  				<th>Autor</th>
	  		";
	  	while (($fila = $consulta->fetch())) {
	  		if ($fila['favorito'] == 1) {
	  			echo "
	  			<tr>
	  			<td style='color: red'>".$fila['idLibro']."</td>
	  			<td style='color: red'>".$fila['titulo']."</td>
	  			<td style='color: red'>".$fila['autor']."</td>
	  			<td><a href=''><img src='imagenes/favorito.png' hidden='true'></a></td>
	  			
	  			</tr>";
	  		}
	  		else{
	  			echo "
	  			<tr>
	  			<td>".$fila['idLibro']."</td>
	  			<td>".$fila['titulo']."</td>
	  			<td>".$fila['autor']."</td>
	  			<td><a href='php/insertarFavorito.php?idLibro=".$fila['idLibro']."'><img src='imagenes/favorito.png'></a></td>
	  			
	  			</tr>";
	  		}
	  		
	  	}
	  	echo "
	  			</table>
	  		";

	 ?>
</body>
</html>