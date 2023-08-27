<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
  <button  name="botonMostrarLibros" onclick="mostrarLibros();">Mostrar Libros</button>
	<button  name="botonVerFavoritos" onclick="mostrarFavoritos();">Mostrar Favoritos</button>
	<button  name="librosPrestados" onclick="librosPrestados();">Libros Prestados</button><br><br>
	<div id="contenedorLista">
		
	</div>
	<script type="text/javascript">
		function mostrarFavoritos(){
        var ajax = new XMLHttpRequest();
        
        ajax.open("POST", 'mostrarFavoritos.php', true);
        ajax.onreadystatechange = function(){
          if (ajax.readyState == 4) {
            document.getElementById('contenedorLista').innerHTML = ajax.responseText;
            
          }
        }
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send();
      }
      function mostrarLibros(){
        var ajax = new XMLHttpRequest();
        
        ajax.open("POST", 'mostrarLibros.php', true);
        ajax.onreadystatechange = function(){
          if (ajax.readyState == 4) {
            document.getElementById('contenedorLista').innerHTML = ajax.responseText;
            
          }
        }
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send();
      }
      function librosPrestados(){
        var ajax = new XMLHttpRequest();
        
        ajax.open("POST", 'mostrarLibrosPrestados.php', true);
        ajax.onreadystatechange = function(){
          if (ajax.readyState == 4) {
            document.getElementById('contenedorLista').innerHTML = ajax.responseText;
            
          }
        }
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send();
      }
	</script>

</body>
</html>