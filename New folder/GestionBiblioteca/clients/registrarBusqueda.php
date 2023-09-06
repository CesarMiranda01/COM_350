<?php 
include("connection.php");
session_start();
$busqueda=$_GET['busqueda'];
$_SESSION['busqueda']=$busqueda;
echo $busqueda;
$sqlresultado="SELECT idlibro,titulo FROM libros";
$consultaResultado=mysqli_query($conn, $sqlresultado);
//$libros=["La Odisea","Don Quijote De la Mancha", "Fisica Basica","Programacion en C++", "Bajo la misma estrella"];
$estado=False;
$idResultado=NULL;
while ($libroRes =mysqli_fetch_array($consultaResultado) ) {
    if($busqueda==$libroRes['titulo']){ 
        $estado=True;
        $idResultado=$libroRes['idlibro'];
    }
}
if($busqueda!=""){
    $sqlNro="SELECT busquedas, numerobusquedas FROM busqueda WHERE busquedas = '$busqueda'";
    $consultaNro=mysqli_query($conn, $sqlNro);
    $elemHistorial=mysqli_fetch_array($consultaNro);
    if($elemHistorial!==null){
        $nroBusquedas=$elemHistorial['numerobusquedas'];
        $sqlUpdate="UPDATE busqueda SET numerobusquedas = $nroBusquedas+1 WHERE busquedas = '$busqueda'";
        mysqli_query($conn, $sqlUpdate);
    }else{
        $sql="INSERT INTO busqueda(busquedas,estado) 
        VALUES('$busqueda','$estado');";
        mysqli_query($conn, $sql);
        if($estado==true){
            $sql="UPDATE busqueda SET idlibro=$idResultado";
            mysqli_query($conn, $sql); 
        }
    }
    echo "busquedase inserto con exito";
}
header("Location: listarResultados.php");
?>






