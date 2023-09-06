<?php 
include("conexion.php");
session_start();
$busqueda=$_GET['busqueda'];
$_SESSION['busqueda']=$busqueda;
echo $busqueda;
$sqlresultado="SELECT idLibro,titulo FROM libro";
$consultaResultado=$pdo->prepare($sqlresultado);
$consultaResultado->execute();
//$libros=["La Odisea","Don Quijote De la Mancha", "Fisica Basica","Programacion en C++", "Bajo la misma estrella"];
$estado=False;
$idResultado=NULL;
while ($libroRes =$consultaResultado->fetch() ) {
    if($busqueda==$libroRes['titulo']){ 
        $estado=True;
        $idResultado=$libroRes['idLibro'];
    }
}
if($busqueda!=""){
    $sqlNro="SELECT busquedas, numeroBusquedas FROM busqueda WHERE busquedas = '$busqueda'";
    $consultaNro=$pdo->prepare($sqlNro);
    $consultaNro->execute();
    $elemHistorial=$consultaNro->fetch();
    if($elemHistorial!=null){
        $nroBusquedas=$elemHistorial['numeroBusquedas'];
        $sqlUpdate="UPDATE busqueda SET numeroBusquedas = $nroBusquedas+1 WHERE busquedas = '$busqueda'";
        $sqlu=$pdo->prepare($sqlUpdate);
        $sqlu->execute();
    }else{
        $sql="INSERT INTO busqueda(busquedas,estado) 
        VALUES('$busqueda','$estado');";
        $sq=$pdo->prepare($sql);
        $sq->execute();
        if($estado==true){
            $sql="UPDATE busqueda SET idLibro=$idResultado WHERE busquedas = '$busqueda'";
            $sqf=$pdo->prepare($sql); 
            $sqf->execute();
        }
    }
    echo "busquedase inserto con exito";
}
header("Location: listarResultados.php");
?>






