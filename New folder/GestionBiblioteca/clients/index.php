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
          <label for="idclient">Id:</label>
          <input type="text" name="idclient" id="idclient" required>
    <!--       <span class="error"><?php echo $error_id; ?></span> -->
        </div>
        <div class="form-group">
          <label for="passclient">Contraseña:</label>
          <input type="password" name="passclient" id="passclient" required>
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
          <label for="nameclient">Nombres:</label>
          <input type="text" name="nameclient" id="nameclient" required>
   <!--        <span class="error"><?php echo $error_nombre; ?></span> -->
        </div>
        <div class="form-group">
          <label for="lastnameclient">Apellidos:</label>
          <input type="text" name="lastnameclient" id="lastnameclient" required>
<!--           <span class="error"><?php echo $error_apellido; ?></span> -->
        </div>
        <div class="form-group">
          <label for="idclient">Id:</label>
          <input type="text" name="idclient" id="idclient" required>
<!--           <span class="error"><?php echo $error_id; ?></span> -->
          <div id="id_error"></div>
        </div>

        <div class="form-group">
          <label for="passclient">Contraseña:</label>
          <input type="password" name="passclient" id="passclient" required>
<!--           <span class="error"><?php echo $error_pass; ?></span> -->
        </div>

        <div class="form-group">
          <label for="address">Direccion:</label>
          <input type="text" name="addressclient" id="addressclient" required>
<!--           <span class="error"><?php echo $error_pass; ?></span> -->
        </div>
        <div class="form-group">
          <label for="cellclient">Celular:</label>
          <input type="number" name="cellclient" id="cellclient" required>
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