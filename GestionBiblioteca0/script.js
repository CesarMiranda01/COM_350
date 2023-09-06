// Esta función usa AJAX para reemplazar el contenido del div con id contenedor
function cargarContenido(url) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("contenedor").innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  }
  
  // Esta función usa un evento para detectar cuando la página se ha cargado completamente
  window.addEventListener("load", function() {
    // Aquí se llama a la función cargarContenido con el archivo home.html como parámetro
    // para que se muestre el contenido inicial
    cargarContenido("home.html");
  });
  