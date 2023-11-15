<?php 
		include('conexion.php');
		$consulta = $pdo->prepare("SELECT l.titulo, l.idlibro, l.autor, p.fecha_prestamo, p.fecha_entrega, c.nombres FROM libros l INNER JOIN libros_prestados p ON l.idlibro = p.idlibro INNER JOIN clientes c ON p.idcliente = c.idcliente WHERE l.prestado = 1");
	  	$consulta->execute();
	  	$consulta1 = $pdo->prepare("SELECT * FROM libros");
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
			  			<td>".$fila['idlibro']."</td>
			  			<td>".$fila['autor']."</td>
			  			<td>".$fila['fecha_prestamo']."</td>
						  <td>".$fila['fecha_entrega']."</td>
						  <td>".$fila['nombres']."</td>
		  			</tr>";
	  	}
	  	echo "
	  			</table><br>
	  			<span>Total libros: ".$cuentaTotal."<br>
	  			<span>Total libros prestados: ".$cuentaPrestados."
	  		";
	 ?>