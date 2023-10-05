<link rel="stylesheet" href="css/styles.css">
<?php 
        include("conexion.php");
        $consulta = $pdo->prepare("SELECT * FROM ciudadano");
        $consulta->execute();
	  	echo "
        <h1>PREGUNTA 4</h1>
	  			<table>
	  				<th>CI</th>
	  				<th>Nombres</th>
	  				<th>Apellidos</th>
	  				<th>Fecha</th>
					"				
					;
	  	while (($fila = $consulta->fetch())) {
	  			echo "
		  			<tr>
					  	<td>".$fila['ci']."</td>
			  			<td>".$fila['nombres']."</td>
			  			<td>".$fila['apellidos']."</td>
			  			<td>".$fila['fecha']."</td>
		  			</tr>";
	  	}
	  	echo "
	  			</table><br>
	  		";
	 ?>