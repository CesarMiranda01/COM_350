<link rel="stylesheet" href="styles1.css">
<?php 
        include("conexion.php");
        $consulta = $pdo->prepare("SELECT c.nombres, c.apellidos, c.idcliente, c.direccion, c.celular, l.idcliente FROM clientes c INNER JOIN libros_prestados l ON c.idcliente = l.idcliente");
        $consulta->execute();
	  	echo "
	  			<table>
	  				<th>Nombres</th>
	  				<th>Apellidos</th>
	  				<th>Carnet</th>
	  				<th>Direccion</th>
					<th>Celular</th> ";
	  	while (($fila = $consulta->fetch())) {
	  			echo "
		  			<tr>
					  	<td>".$fila['nombres']."</td>
			  			<td>".$fila['apellidos']."</td>
			  			<td>".$fila['idcliente']."</td>
			  			<td>".$fila['direccion']."</td>
						  <td>".$fila['celular']."</td>
		  			</tr>";
	  	}
	  	echo "
	  			</table><br>
	  		";
	 ?>