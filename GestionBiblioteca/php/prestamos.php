<link rel="stylesheet" href="css/styless.css">
<?php 
        include("conexion1.php");
        $consulta = $pdo->prepare("SELECT p.nombres, p.apellidos, p.ci, p.edad, p.email, e.idLibro, l.titulo FROM persona p INNER JOIN libroprestado e ON p.ci = e.ci INNER JOIN libro l ON e.idLibro=l.idLibro");
        $consulta->execute();
	  	echo "
	  			<table>
	  				<th>Nombres</th>
	  				<th>Apellidos</th>
	  				<th>Carnet</th>
	  				<th>Edad</th>
					<th>Email</th> 
					<th>Libro</th> 
					<th>id Libro</th> 
					"				
					;
	  	while (($fila = $consulta->fetch())) {
	  			echo "
		  			<tr>
					  	<td>".$fila['nombres']."</td>
			  			<td>".$fila['apellidos']."</td>
			  			<td>".$fila['ci']."</td>
			  			<td>".$fila['edad']."</td>
						  <td>".$fila['email']."</td>
						  <td>".$fila['titulo']."</td>
						  <td>".$fila['idLibro']."</td>
		  			</tr>";
	  	}
	  	echo "
	  			</table><br>
	  		";
	 ?>