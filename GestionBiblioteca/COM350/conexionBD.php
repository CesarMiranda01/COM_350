<?php 
$con =new mysqli("localhost:3906", "root", "","bd_gestionbiblioteca");
if ($con->connect_error)
 die ("No se pudo conectar con el servidor".$con->connect_error);


 ?>
