<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/script.js"></script>
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
		<div>
			<img src="imagenes/logo.png">
		</div>
		<ul id="menuCabecera">
		<!-- sprint4 -->
      <li><a href="#" onclick="clientes();" id="botonFavoritos">Clientes</a></li>
      <li><a href="#" onclick="mostrarLibros();" id="botonFavoritos">Libros</a></li>
      <li><a href="#" onclick="librosPrestados();" id="botonFavoritos">Prestados</a></li>
      <li><a href="#" onclick="mostrarFavoritos();" id="botonFavoritos">Contar Libros</a></li>

      <li><a href="#" onclick="mostrarLibros();" id="botonFavoritos">Prestamos</a></li>
	  <!-- sprint4 -->
	  <li><a href="#" onclick="pendientes();" id="botonFavoritos">Pendientes</a></li>
      <li><a href="#" onclick="librosPrestados();" id="botonFavoritos">Cerrar Sesion</a></li>
      <li><a href="#" onclick="mostrarFavoritos();" id="botonFavoritos">&nbsp</a></li>
		</ul>
	</header><br>
	<?php 
	session_start();
	if (!(isset($_SESSION['ci']))) {
		echo '<div id="formularioAutenticarse" >
		<form method="POST">
			<h1>BIBLIOTECA</h1>
			<h4>Autenticacion</h4>
			<label>C.I: del usuario &nbsp&nbsp&nbsp:</label>
			<input type="text" name="ci" id="ci" required><br><br>
			<label>Contraseña:</label><br>
			<input type="password" id="password" name="password" required><br><br>
			<input type="hidden" name="">
			<input id="botonIngresar" type="button" name="ingresar" value="Ingresar" onclick="ingreso();">
		</form>
	</div>';
	} else {
		?>
		<div class="marco">

			<div id="contenedor">
				<div id="contenedor1"></div>
				<div id="contenedor2">
				<div class="headTop">
				<input class="barraBusqueda" type="text" id="buscador" placeholder="buscar....">
				<button class="boton" onclick="enviarbusqueda()">Buscar</button>
				<button class="boton" onclick="generarListaBusqueda()">Generar Lista de Busquedas</button>
			</div>
				</div>
			</div>
		</div>
		<?php
	}
?>  
<div id="foot">
	<!-- <img style="width: 1330px;" src="imagenes/biblioteca.jpg"> -->
</div>
</body>
</html>
