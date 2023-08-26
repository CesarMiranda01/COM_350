<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <!-- Incluimos el archivo de estilos css -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group">
        <label for="id">Id:</label>
        <input type="text" name="id" id="id" value="<?php echo $id; ?>">
        <span class="error"><?php echo $error_id; ?></span>
      </div>
      <div class="form-group">
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass">
        <span class="error"><?php echo $error_pass; ?></span>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Ingresar">
        <span class="error"><?php echo $error_login; ?></span>
      </div>
    </form>
  </div>
</body>
</html>