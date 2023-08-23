<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php #include('verificarLogin.php');
    #include("conexionBD.php");
    $id=$_GET['id'];
    $sql = "DELETE  FROM favoritos WHERE id=$id"; #tabla favoritos
    $resultado = $con->query($sql);
    if ($con->query($sql) === TRUE) {?>
        <div> <?php echo "Se elimino el producto";?> </div> <?php #div class para estilos
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();
    #mostrar.php es leer
    ?>
    <meta http-equiv="refresh" content="3; url=mostrar.php" />  
</body>
</html>

