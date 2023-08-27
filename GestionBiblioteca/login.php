<?php
include 'conexion.php';
// Comprobar si el formulario ha sido enviado
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Consulta para obtener los valores de admin y password
    $query = "SELECT * FROM integrantes WHERE nombres='$username' AND contrasena='$password'";
    $result = mysqli_query($con, $query);
        // Comprobar si se encontró al usuario admin
    if (mysqli_num_rows($result) >= 1) {
        // Obtener los valores de admin y password
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombres'];
        $apellido = $row['apellidos'];
        $contrasena = $row['contrasena'];
        $nivel=$row['nivel'];
        $cargo=$row['cargo'];
    } else {
        if(mysqli_num_rows($result) > 1){
        // Mostrar mensaje de alerta
        echo "ALERTA Hay mas de un usuario con la misma contrasena, cambie su contrasena";
        sleep(2);
        }
        // Mostrar mensaje de error
        echo "USUARIO O CONTRASENA INCORRECTOS";
        sleep(1);
        header('location: index.html');
    }
        // crear session con el nombre del usuario para su futuro uso
        session_start();
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido']=$apellido;
        $_SESSION['cargo']=$cargo;
    // Comprobar si el nombre de usuario y la contraseña son correctos y redirigir a la pagina adecuada.
    if ($nivel==1){
        header('location: managers/main.php');
        //echo "ERES UN DAMIN JEJE, tu pagina web pronto sera creada!!";
    } else if ($nivel==2){
        //header('location: index.php');
        header('location: employes/main.php');
    }else{
                // Mostrar mensaje de error
                echo "<p class='error'>Usuario o contraseña incorrectos</p>";
    }
}
?>