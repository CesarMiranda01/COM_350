<?php include("../conexion.php");
$busqueda=$_GET['busqueda'];
// echo $busqueda;
$sqlresultado="SELECT idlibro,titulo FROM libros";
$consultaResultado=mysqli_query($con, $sqlresultado);
//$libros=["La Odisea","Don Quijote De la Mancha", "Fisica Basica","Programacion en C++", "Bajo la misma estrella"];
$estado=0;
$idResultado=NULL;
while ($libroRes =mysqli_fetch_array($consultaResultado) ) {
    if($busqueda==$libroRes['titulo']){ 
        $estado=1;
        $idResultado=$libroRes['idlibro'];
    }
}
$sqlNro="SELECT busquedas, numerobusquedas FROM busqueda WHERE busquedas = '$busqueda'";
$consultaNro=mysqli_query($con, $sqlNro);
//$elemHistorial=mysqli_fetch_array($consultaNro);
while($elemHistorial=mysqli_fetch_array($consultaNro)){
    if($elemHistorial!==null){
        $nroBusquedas=$elemHistorial['numerobusquedas'];
        $nroBusquedas=$nroBusquedas+1;
        $sqlUpdate="UPDATE busqueda SET numerobusquedas = $nroBusquedas WHERE busquedas = '$busqueda'";
        mysqli_query($con, $sqlUpdate);
    }else{

        if($estado==1){
            $sql="INSERT INTO busqueda(idbusqueda, busquedas, numerobusquedas, estado) 
            VALUES('$idResultado','$busqueda', 1, '$estado');";
            mysqli_query($con, $sql);

            // $sql="UPDATE busqueda SET idlibro=$idResultado";
            // mysqli_query($con, $sql); 
        }else{
            $sql="INSERT INTO busqueda(busquedas, numerobusquedas, estado) 
            VALUES('$busqueda', 1, '$estado');";
            mysqli_query($con, $sql);
        }
    }
}

?>




