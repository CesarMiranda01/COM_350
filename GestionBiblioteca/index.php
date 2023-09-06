
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <script src="jquery/jquery-3.1.1.min.js"></script>
	<title></title>
</head>
<body onload="blu();">
  <header>
    <div>
      <img src="imagenes/logo.png">
    </div>
    <ul id="menuCabecera"  >
      <li><button  name="" onclick="mostrarFavoritos();" id="botonFavoritos">Favoritos</button></li>
      <li><button  name="" onclick="mostrarLibros();">Libros</button></li>
      <li><button  name="" onclick="librosPrestados();">Libros Prestados</button></li>
      <li>SPRINT4</li>
      <li>SPRINT5</li>
      <li>SPRINT6</li>
      <li>SPRINT7</li>
      <a href="php/cerrarSesion.php"><li>SALIR</li></a>
    </ul>
    
  </header><br>
  <?php 
  session_start();
    if (!(isset($_SESSION['ci']))) {
        echo '<div id="formularioAutenticarse" >
    <form method="POST">
      <h1>BIBLIOTECA</h1>
      <h4>Autenticacion</h4>
      <label>Nombre de usuario:</label>
      <input type="text" name="ci" id="ci" required><br><br>
      <label>Contraseña:</label><br>
      <input type="password" id="password" name="password" required><br><br>
      <input type="hidden" name="">
      <input id="botonIngresar" type="button" name="ingresar" value="Ingresar" onclick="ingreso();">
    </form>
  </div>';
    }else{
      ?>
      <div class="marco">
        <div class="headTop">
            <input class="barraBusqueda" type="text" id="buscador" placeholder="buscar....">
            <button class="boton" onclick="enviarbusqueda()">Buscar</button>
            <button class="boton" onclick="generarListaBusqueda()">Generar Lista de Busquedas</button>
        </div>
        <div id="contenedorLista">
    
        </div>
	    </div>
      <?php
    }
?>  
  
  
  <div>
    <img style="width: 1330px;" src="imagenes/biblioteca.jpg">
  </div>
  
  
	
	<script type="text/javascript">
    
    function ingreso(){
      var ci = document.getElementById('ci').value;
      var password = document.getElementById('password').value;
      if (ci === "") {
        alert("Ingrese un número de carnet.");
        return false;
      }
      if ((ci.length > 10)) {
        alert("Escriba un carnet válido");
        return false;
      }
      if ((ci.length < 6)) {
        alert("Ingrese un número de carnet válido.");
        return false;
      }
      if (isNaN(ci)) {
        alert("Escriba un número de carnet válido");
        return false;
      }
      if (password === "") {
        alert("Ingrese una contraseña.");
        return false;
      }
      if ((password.length > 30)) {
        alert("Contraseña demasiado larga.");
        return false;
      }
      else{
        var ajax = new XMLHttpRequest();
        var parametros = "ci="+encodeURI(document.getElementById('ci').value)+"&password="+encodeURI(document.getElementById('password').value)+"&noCache="+Math.random();
        ajax.open("POST", 'php/autenticar.php', true);
        ajax.onreadystatechange = function(){
          if (ajax.readyState == 4) {
            if (ajax.responseText) {
              alert(ajax.responseText);
              
            }
            else{
              $("#formularioAutenticarse").css('transition', '2s');
              $("#formularioAutenticarse").css('top', '200%');
              
            }
          }
        }
      ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      ajax.send(parametros);
      }
    }     


    function mostrarFavoritos(){
        var ajax = new XMLHttpRequest();
        
        ajax.open("POST", 'php/mostrarFavoritos.php', true);
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
        
        ajax.open("POST", 'php/mostrarLibros.php', true);
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
        
        ajax.open("POST", 'php/mostrarLibrosPrestados.php', true);
        ajax.onreadystatechange = function(){
          if (ajax.readyState == 4) {
            document.getElementById('contenedorLista').innerHTML = ajax.responseText;
            
          }
        }
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send();
      }

      function enviarbusqueda(){
      var valBusqueda=document.getElementById('buscador').value;
      //console.log(typeof valBusqueda);
      //if (valBusqueda){
          console.log(valBusqueda);
          var ajax=new XMLHttpRequest();
          ajax.onreadystatechange=function(){
              if(ajax.readyState==4){
                  document.getElementById("contenedorLista").innerHTML=ajax.responseText;
                  console.log("busqueda guardada");
                  //alert(ajax.responseText);
              }
          }

          ajax.open("GET",'php/registrarBusqueda.php?busqueda='+valBusqueda, true);
        ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
          ajax.send();
      //}
      }
      function generarListaBusqueda(){
        var ajax=new XMLHttpRequest();
        ajax.onreadystatechange=function(){
          if(ajax.readyState==4){
              document.getElementById("contenedorLista").innerHTML=ajax.responseText;
          }
        }
        ajax.open("GET",'php/listarBusqueda.php',true);
        ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
        ajax.send();
      }



	</script>

</body>
</html>