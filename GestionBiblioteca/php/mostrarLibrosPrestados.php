<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php 
		include('conexion.php');
		$consulta = $pdo->prepare("SELECT * FROM libro r INNER JOIN libroprestado l WHERE r.idlibro = l.idlibro AND prestado = 1");
	  	$consulta->execute();
	  	$consulta1 = $pdo->prepare("SELECT * FROM libro");
	  	$consulta1->execute();
	  	$cuentaPrestados = $consulta->rowCount();
	  	$cuentaTotal = $consulta1->rowCount();
	  	echo "
	  			<table border=1>
	  				<th>id</th>
	  				<th>Titulo</th>
	  				<th>Autor</th>
	  				<th>Fecha Prestamo</th>
	  		";
	  	while (($fila = $consulta->fetch())) {
	  			echo "
		  			<tr>
			  			<td>".$fila['idLibro']."</td>
			  			<td>".$fila['titulo']."</td>
			  			<td>".$fila['autor']."</td>
			  			<td>".$fila['fecha_prestado']."</td>
		  			</tr>";
	  		
	  	}
	  	echo "
	  			</table><br>
	  			<span>Total libros: ".$cuentaTotal."<br>
	  			<span>Total libros prestados: ".$cuentaPrestados."
	  		";

	 ?>