<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="tablaBusqueda">
    <?php include("conexion.php");

    
    ?>
    <th>busquedas</th>
    <th>NroBusquedas</th>
    <th>Disponibilidad</th>
    <th>Resultado</th>
    <?php
    



    $sqlbusq = "SELECT busquedas,numeroBusquedas,estado from busqueda";
    $sqlres = "SELECT busqueda.busquedas,libro.titulo from busqueda INNER JOIN libro ON busqueda.idLibro=libro.idLibro";

    $conb = $pdo->prepare( $sqlbusq);
    $conb->execute();
    
    while ($fila = $conb->fetch()) {
        if($fila["estado"]==0){$disponibilidad="No";}
        else{$disponibilidad="Si";}
    ?>
        <tr>
            <td><?php echo $fila["busquedas"] ?></td>
            <td><?php echo $fila["numeroBusquedas"] ?></td>
            <td><?php echo $disponibilidad?></td>
            <td><?php 
            $conr=$pdo->prepare($sqlres);
            $conr->execute();
            while($match=$conr->fetch()){
                if($fila["busquedas"]==$match["titulo"]){echo $match["titulo"];}else{echo "";}
             } ?>
            </td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>