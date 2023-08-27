<?php include("conexionBD.php");
$busqueda=$_GET['busqueda'];
echo $busqueda;
$sqlresultado="SELECT libro FROM libros";
$consultaResultado=mysqli_query($con, $sqlresultado);
//$libros=["La Odisea","Don Quijote De la Mancha", "Fisica Basica","Programacion en C++", "Bajo la misma estrella"];
$estado=False;
while ($libroRes =mysqli_fetch_array($consultaResultado) ) {
    if($busqueda==$libroRes){ $estado=True;}
}
$sqlNro="SELECT busqueda, nroBusquedas FROM busquedas WHERE busqueda = '$busqueda'";
$consultaNro=mysqli_query($con, $sqlNro);
$elemHistorial=mysqli_fetch_array($consultaNro);
if($elemHistorial!==null){
    $nroBusquedas=$elemHistorial['nroBusquedas'];
    $sqlUpdate="UPDATE busquedas SET nroBusquedas = $nroBusquedas+1 WHERE busqueda = '$busqueda'";
    mysqli_query($con, $sqlUpdate);
}else{
    $sql="INSERT INTO busquedas(busqueda,estado) 
    VALUES('$busqueda','$estado')";
    mysqli_query($con, $sql);
}

?>

<p>se inserto con exito</p>




