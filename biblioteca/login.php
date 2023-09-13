<?php
// Verifica las credenciales del usuario (sustituye esto por tu lógica de autenticación)
$username = $_POST['username'];
$password = $_POST['password'];

// Simulación de autenticación (cambia esto según tus necesidades)
if ($username === 'admin' && $password === 'admin') {
    $userType = 'admin';
} elseif ($username === 'encargado' && $password === 'encargado') {
    $userType = 'encargado';
} elseif ($username === 'usuario' && $password === 'usuario') {
    $userType = 'usuario';
} else {
    $userType = 'guest';
}

session_start();
$_SESSION['userType'] = $userType;
header("Location: index.php");
?>
