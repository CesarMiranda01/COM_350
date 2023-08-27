<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="tablaBusqueda">
    <?php include("conexionBD.php");

    
    ?>
    <th>busquedas</th>
    <th>NroBusquedas</th>
    <th>disponibilidad</th>
    <?php
    



    $sql = "SELECT id,busqueda,nroBusquedas,estado from busquedas";

    $consulta = mysqli_query($con, $sql);
    while ($fila = mysqli_fetch_array($consulta)) {
        if($fila["estado"]==0){$disponibilidad="No";}
        else{$disponibilidad="Si";}
    ?>
        <tr>
            <td><?php echo $fila["busqueda"] ?></td>
            <td><?php echo $fila["nroBusquedas"] ?></td>
            <td><?php echo $disponibilidad?></td>

        </tr>
    <?php } ?>
    </table>
</body>
</html>