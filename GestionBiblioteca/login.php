<?php
include 'conexion.php';

// Comprobar si el formulario ha sido enviado
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para obtener los valores de admin y password
    $query = "SELECT * FROM trabajadores WHERE nombres='$username' AND contrasena='$password'";
    $result = mysqli_query($con, $query);
        // Comprobar si se encontró al usuario admin
    if (mysqli_num_rows($result) == 1) {
        // Obtener los valores de admin y password
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombres'];
        $contrasena = $row['contrasena'];
        $nivel=$row['nivel'];
        
    } else {
        if(mysqli_num_rows($result) > 1){
        // Obtener los valores de admin y password
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombres'];
        $contrasena = $row['contrasena'];
        $nivel=$row['nivel'];
        // Mostrar mensaje de alerta
        echo "ALERTA Hay mas de un usuario, cambie su contrasena";
        }
        // Mostrar mensaje de error
        echo "el registro no esta completo";
    }
        // crear session con el nombre del usuario para su futuro uso
        session_start();
        $_SESSION['username'] = $username;

    // Comprobar si el nombre de usuario y la contraseña son correctos y redirigir a la pagina adecuada.
    if ($username == $nombre && $password == $contrasena && $nivel==1) {
        //header('location: index.php');
        echo "ERES UN DAMIN JEJE, tu pagina web pronto sera creada!!";
    } else if ($username == $nombre && $password == $contrasena && $nivel==2){
        //header('location: index.php');
        echo "ERES MIENDRO DE LA EMPRESA JEJE, tu pagina web pronto sera creada!!";
    }else{
                // Mostrar mensaje de error
                echo "<p class='error'>Usuario o contraseña incorrectos</p>";
    }
}
?>