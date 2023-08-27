<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>

</body>
</html>
<?php 
	include('conexion.php');
	$consulta = $pdo->prepare("SELECT * FROM libros WHERE favorito=1 ");
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
				<td style='color: green'>".$fila['idlibro']."</td>
				<td style='color: green'>".$fila['editorial']."</td>
	  			<td style='color: green'>".$fila['edicion']."</td>
	  			<td style='color: green'>".$fila['autor']."</td>
				<td><form method='post' action='eliminarfavoritos.php'>
					<input type='hidden' name='idlibro' value='".$fila['idlibro']."'>
					<input type='submit' name='eliminarfavoritos' value='Eliminar'>
				</form></td>
    			</tr>";
  	}
  	echo "
  			</table>
  		";
 ?>
