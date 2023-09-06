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
  				<th>id</th>
  				<th>Titulo</th>
  				<th>Autor</th>
  		";
  	while (($fila = $consulta->fetch())) {
  		echo "
    			<tr>
      			<td>".$fila['idlibro']."</td>
      			<td>".$fila['titulo']."</td>
      			<td>".$fila['autor']."</td>
    			</tr>";
  	}
  	echo "
  			</table>
  		";

 ?>