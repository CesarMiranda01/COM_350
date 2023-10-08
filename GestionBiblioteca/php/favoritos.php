<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styless.css"> <!-- Esta es la línea que se añade -->
</head>
<body>

</body>
</html>
<?php 
	include('conexion1.php');
	$consulta = $pdo->prepare("SELECT * FROM libro WHERE favorito=1 ");
  	$consulta->execute();
  	echo "
  			<table border=1>
			  <th>Titulo</th>
			  <th>id</th>
			  <th>Editorial</th>
			  <th>Edicion</th>
			  <th>Autor</th>
			  <th>Eliminar</th>
  		";
  	while (($fila = $consulta->fetch())) {
  		echo "
    			<tr>
				<td style='color: green'>".$fila['titulo']."</td>
				<td style='color: green'>".$fila['idLibro']."</td>
				<td style='color: green'>".$fila['editorial']."</td>
	  			<td style='color: green'>".$fila['edicion']."</td>
	  			<td style='color: green'>".$fila['autor']."</td>
				<td><form method='post' action='php/eliminarfavoritos.php'>
					<input type='hidden' name='idlibro' value='".$fila['idLibro']."'>
					<input type='submit' name='eliminarfavoritos' value='Eliminar'>
				</form></td>
    			</tr>";
  	}
  	echo "
  			</table>
  		";
 ?>
