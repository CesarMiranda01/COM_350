<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form method="post" action="login.php">
        <h1>LIBROS S.R.L.</h1>
        <h4>autenticacion</h4>
        <label>Nombre de usuario (solo nombre):</label>
        <input type="text" name="username" required><br>
        <label>Contraseña (ci):</label>
        <input type="password" name="password" required><br>
        <button type="submit">Ingresar</button>
    </form>
    <script src="scripts.js"></script>
</body>
</html>