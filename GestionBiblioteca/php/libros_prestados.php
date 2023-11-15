<link rel="stylesheet" href="css/styless.css">
<?php 
		include('conexion1.php');
		$consulta = $pdo->prepare("SELECT l.titulo, l.idLibro, l.autor, p.fechaPrestado, p.fechaEntrega, c.nombres FROM libro l INNER JOIN libroprestado p ON l.idlibro = p.idlibro INNER JOIN persona c ON p.ci = c.ci WHERE l.favorito = 1");
	  	$consulta->execute();
	  	$consulta1 = $pdo->prepare("SELECT * FROM libro");
	  	$consulta1->execute();
	  	$cuentaPrestados = $consulta->rowCount();
	  	$cuentaTotal = $consulta1->rowCount();
	  	echo "
	  			<table border=1>
	  				<th>TITULO DEL LIBRO</th>
	  				<th>ID_LIBRO</th>
	  				<th>AUTOR</th>
	  				<th>FECHA DE PRESTAMO</th>
					<th>FECHA DE DEVOLUCION</th>
					<th>NOMBRE CLIENTE</th> "; 
	  		
	  	while (($fila = $consulta->fetch())) {
	  			echo "
		  			<tr>
					  	<td>".$fila['titulo']."</td>
			  			<td>".$fila['idLibro']."</td>
			  			<td>".$fila['autor']."</td>
			  			<td>".$fila['fechaPrestado']."</td>
						  <td>".$fila['fechaEntrega']."</td>
						  <td>".$fila['nombres']."</td>
		  			</tr>";
	  	}
	  	echo "
	  			</table><br>
	  			<span>Total libros: ".$cuentaTotal."<br>
	  			<span>Total libros prestados: ".$cuentaPrestados."
	  		";
	 ?>