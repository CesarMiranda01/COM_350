<?php session_start();
if (!isset($_SESSION['login'])) {
    header("location:nosesion.html");
    die("Tiempo de la sesion agotado, vuelve a iniciar sesion");     
}
?>