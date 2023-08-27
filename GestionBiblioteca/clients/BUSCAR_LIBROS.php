	<?php 
		include('conexion.php');
		$consulta = $pdo->prepare("SELECT * FROM libros");
	  	$consulta->execute();
	  	echo "
	  			<table border=1>
				  <th>Titulo</th>
	  				<th>id</th>
	  				<th>Editorial</th>
					  <th>Edicion</th>
	  				<th>Autor</th>
					  <th>Favorito</th>
	  		";
	  	while (($fila = $consulta->fetch())) {
	  		if ($fila['favorito'] == 1) {
	  			echo "
	  			<tr>
				<td style='color: green'>".$fila['titulo']."</td>
				<td style='color: green'>".$fila['idlibro']."</td>
				<td style='color: green'>".$fila['editorial']."</td>
	  			<td style='color: green'>".$fila['edicion']."</td>
	  			<td style='color: green'>".$fila['autor']."</td>
	  			<td>&nbsp</td>
	  			
	  			</tr>";
	  		}
	  		else{
	  			echo "
	  			<tr>
				<td>".$fila['titulo']."</td>
				<td>".$fila['idlibro']."</td>
				<td>".$fila['editorial']."</td>
				<td>".$fila['edicion']."</td>
				<td>".$fila['autor']."</td>
	  			<td><a href='insertarFavorito.php?idlibro=".$fila['idlibro']."'><img src='imagenes/favorito.png'></a></td>
	  			
	  			</tr>";
	  		}
	  	}
	  	echo "
	  			</table>
	  		";
	 ?>