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
  				<th>Codigo</th>
  				<th>Titulo</th>
  				<th>Autor</th>
  		";
  	while (($fila = $consulta->fetch())) {
  		echo "
    			<tr>
      			<td>".$fila['codigo']."</td>
      			<td>".$fila['titulo']."</td>
      			<td>".$fila['autor']."</td>
    			</tr>";
  	}
  	echo "
  			</table>
  		";

 ?>