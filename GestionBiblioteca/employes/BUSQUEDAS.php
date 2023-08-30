<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<table class="tablaBusqueda">
    <?php include("../conexion.php");
    ?>
    <th>busquedas</th>
    <th>NroBusquedas</th>
    <th>Disponibilidad</th>
    <th>Resultado</th>
    <?php
    
    $sqlbusq = "SELECT busquedas,numerobusquedas,estado from busqueda";
    $sqlres = "SELECT busqueda.busquedas,libros.titulo from busqueda INNER JOIN libros ON busqueda.idlibro=libros.idlibro";

    $conb = mysqli_query($con, $sqlbusq);
    
    while ($fila = mysqli_fetch_array($conb)) {
        if($fila["estado"]==0){$disponibilidad="No";}
        else{$disponibilidad="Si";}
    ?>
        <tr>
            <td><?php echo $fila["busquedas"] ?></td>
            <td><?php echo $fila["numerobusquedas"] ?></td>
            <td><?php echo $disponibilidad?></td>
            <td><?php 
            $conr=mysqli_query($con, $sqlres);
            while($match=mysqli_fetch_array($conr)){
                if($fila["busquedas"]==$match["titulo"]){echo $match["titulo"];}else{echo "";}
             } ?>
            </td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>