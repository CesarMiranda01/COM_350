<?php
// Comprobar si el formulario ha sido enviado
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Comprobar si el nombre de usuario y la contraseña son correctos
    if ($username == 'admin' && $password == 'password') {
        // Iniciar sesión y redirigir a la página principal
        session_start();
        $_SESSION['username'] = $username;
        header('location: index.php');
    } else {
        // Mostrar mensaje de error
        echo "<p class='error'>Usuario o contraseña incorrectos</p>";
    }
}
?>