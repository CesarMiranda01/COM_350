<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login y Registrar</title>
  <!-- Incluimos el archivo de estilos css -->
  <link rel="stylesheet" href="styles.css">
  <!-- Incluimos el archivo de scripts js -->
  <script src="script.js"></script>
</head>

<body>

  <div class="container">
    <h1>Login y Registrar</h1>
    <!-- Creamos dos botones para mostrar los formularios de login y registrar -->
    <div class="botones">
      <button id="btn-login" onclick="mostrarLogin()">Login</button>
      <button id="btn-registrar" onclick="mostrarRegistrar()">Registrar</button>
    </div>

    <!-- Creamos el formulario de login, que está oculto por defecto -->
    <div id="form-login" style="display: none;">
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="id">Id:</label>
          <input type="text" name="id" id="id" required>
    <!--       <span class="error"><?php echo $error_id; ?></span> -->
        </div>
        <div class="form-group">
          <label for="pass">Contraseña:</label>
          <input type="password" name="pass" id="pass" required>
  <!--         <span class="error"><?php echo $error_pass; ?></span> -->
        </div>
        <div class="form-group">
          <input type="submit" name="login" value="Entrar">
<!--           <span class="error"><?php echo $error_login; ?></span> -->
        </div>
      </form>
    </div>

    <!-- Creamos el formulario de registrar, que está oculto por defecto -->
    <div id="form-registrar" style="display: none;">
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" id="nombre" required>
   <!--        <span class="error"><?php echo $error_nombre; ?></span> -->
        </div>
        <div class="form-group">
          <label for="apellido">Apellido:</label>
          <input type="text" name="apellido" id="apellido" required>
<!--           <span class="error"><?php echo $error_apellido; ?></span> -->
        </div>
        <div class="form-group">
          <label for="id">Id:</label>
          <input type="text" name="id" id="id" required>
<!--           <span class="error"><?php echo $error_id; ?></span> -->
        </div>
        <div class="form-group">
          <label for="pass">Contraseña:</label>
          <input type="password" name="pass" id="pass" required>
<!--           <span class="error"><?php echo $error_pass; ?></span> -->
        </div>
        <div class="form-group">
          <input type="submit" name="registrar" value="Registrar">
<!--           <span class="error"><?php echo $error_registrar; ?></span> -->
        </div>
      </form>
    </div>

  </div>

</body>
</html>