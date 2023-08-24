<?php
// Conexión a la base de datos local
$db = mysqli_connect('localhost', 'username', 'password', 'database_name');

// Consulta para obtener los valores de admin y password
$query = "SELECT * FROM users WHERE username='admin'";
$result = mysqli_query($db, $query);

// Comprobar si se encontró al usuario admin
if (mysqli_num_rows($result) == 1) {
    // Obtener los valores de admin y password
    $row = mysqli_fetch_assoc($result);
    $admin_username = $row['username'];
    $admin_password = $row['password'];

    // Mostrar los valores de admin y password
    echo "Admin username: $admin_username<br>";
    echo "Admin password: $admin_password<br>";
} else {
    // Mostrar mensaje de error
    echo "No se encontró al usuario admin";
}
