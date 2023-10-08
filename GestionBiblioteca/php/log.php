<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styleslogin.css">
	<link rel="stylesheet" href="css/fontawesome-free-6.4.2-web/css/all.min.css">
	<title></title>
</head>
<body >
	<div id="formularioAutenticarse" style="display: true;">
		<form method="POST">
			<h1>Autenticación</h1>
			<label for="ci">C.I del usuario:</label>
			<input type="text" name="ci" id="ci" required><br><br>
			<h5 id="cialert"></h5>
			<label for="password">Contraseña:</label>
			<input type="password" id="password" name="password" required><br><br>
			<h5 id="passwordalert"></h5>
			<input id="botonIngresar" type="button" name="ingresar" value="Ingresar" onclick="ingreso();">
		</form>
	</div>
	<script src="script/script.js"></script>
</body>
</html>
