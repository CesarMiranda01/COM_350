// Obtener todos los botones de eliminar de la tabla
var botones = document.getElementsByClassName("boton-eliminar");

// Recorrer cada botón y agregarle un evento de clic
for (var i = 0; i < botones.length; i++) {
    botones[i].addEventListener("click", function() {
        // Obtener el id del libro desde el atributo data-id del botón
        var id = this.getAttribute("data-id");
        // Crear una petición AJAX para enviar el id al archivo PHP que elimina el libro
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "eliminar.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        // Esperar a que la petición se complete
        xhr.onload = function() {
            // Verificar si la petición fue exitosa y devolvió un mensaje de éxito
            if (xhr.status == 200 && xhr.responseText == "Exito") {
                // Eliminar la fila de la tabla que contiene el botón
                var fila = this.parentNode.parentNode;
                fila.parentNode.removeChild(fila);
            } else {
                // Mostrar un mensaje de error si la petición falló o devolvió un mensaje de error
                alert("Error al eliminar el libro: " + xhr.responseText);
            }
        }.bind(this); // Usar bind para mantener el contexto del botón dentro de la función
    });
}
