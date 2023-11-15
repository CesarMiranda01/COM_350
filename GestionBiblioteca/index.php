<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styleslogin.css">
	<link rel="stylesheet" href="css/fontawesome-free-6.4.2-web/css/all.min.css">
	<title></title>
</head>
<body >
	<!-- Agrega el nuevo menú estático -->
	<nav id="menuSuperior">
		<ul>
			<li><a href="#">Contactanos</a></li>
			<li><a href="#">Ayuda</a></li>
			<li><a href="#">Asistencia</a></li>
			<li><a href="#">gmail</a></li>
		</ul>
	</nav>
	<header>
		<div id="titulo-container">
			<img src="imagenes/logo.jpeg">
			<span id="titulo">LIbros usfx</span>
		</div>
		<ul id="menu">
			<li><a href="#" onclick="clientes();" >Home</a></li>
			<li><a href="#" onclick="clientes();" >Registrarse</a></li>
			<li><a href="#" onclick="cerrarsesion();" >IniciarSesion</a></li>
			<li><a href="#" onclick="librosPrestados();">Ayuda</a></li>
		</ul>
	</header>
	<nav id="container">

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


	</nav>
	<nav id="foot">
		<ul>
			<li><i class="fa-brands fa-facebook"></i></li>
			<li><i class="fa-brands fa-twitter"></i></li>
			<li><i class="fa-brands fa-youtube"></i></li>
			<li><i class="fa-solid fa-envelope-open"></i></li>
		</ul>
	</nav>
	<script src="script/script.js"></script>
</body>
</html>
