
function ingreso() {
    var ci = document.getElementById('ci').value;
    var password = document.getElementById('password').value;
    var ciAlert = document.getElementById('cialert'); // Elemento h5 para mostrar alertas de CI
    var passwordAlert = document.getElementById('passwordalert'); // Elemento h5 para mostrar alertas de contraseña

    // Restablece los mensajes de alerta
    ciAlert.textContent = "";
    passwordAlert.textContent = "";

    if (ci === "") {
        ciAlert.textContent = "Ingrese un número de carnet.";
        return false;
    }
    if (ci.length > 20 || ci.length < 2 || isNaN(ci)) {
        ciAlert.textContent = "Escriba un número de carnet válido.";
        return false;
    }
    if (password === "") {
        passwordAlert.textContent = "Ingrese una contraseña.";
        return false;
    }
    if (password.length > 20) {
        passwordAlert.textContent = "Contraseña demasiado larga.";
        return false;
    } else {
	// Crear un objeto XMLHttpRequest para enviar una petición al servidor
	var xhr = new XMLHttpRequest();
  
	// Definir la función que se ejecutará cuando la petición cambie de estado
	xhr.onreadystatechange = function() {
	  // Si la petición se completó con éxito y el código de respuesta es 200
	  if (xhr.readyState == 4 && xhr.status == 200) {
		console.log(xhr.responseText); // Agrega esta línea para verificar la respuesta
		// Obtener la respuesta del servidor en formato JSON
		var respuesta = JSON.parse(xhr.responseText);
  
		// Si la respuesta tiene un atributo error, significa que hubo un problema con el login
		if (respuesta.error) {
		  alert(respuesta.error);
		} else {
		  // Si la respuesta tiene un atributo nombre, significa que el login fue exitoso
		  if (respuesta.privilegio==1) {
			document.getElementById("menu").innerHTML = "";
			document.getElementById("menu").innerHTML = 
			  '<li><a href="#" onclick="1personas();">Personas</a></li>' +
			  '<li><a href="#" onclick="libros1();">Libros</a></li>' +
			  '<li><a href="#" onclick="prestados1();">Libros prestados</a></li>' +
			  '<li><a href="#" onclick="cerrarsesion();">Cerrar Sesion</a></li>';
		  }else if(respuesta.privilegio==2){
			document.getElementById("menu").innerHTML = "";
			document.getElementById("menu").innerHTML = 
			  '<li><a href="#" onclick="clientes2();">Clientes</a></li>' +
			  '<li><a href="#" onclick="libros2();">Libros</a></li>' +
			  '<li><a href="#" onclick="2busquedas();">Busquedas</a></li>' +
			  '<li><a href="#" onclick="pendientes2();">Deudas</a></li>' +
			  '<li><a href="#" onclick="2registrar();">Registrar</a></li>' +
			  '<li><a href="#" onclick="cerrarsesion();">Cerrar Sesion</a></li>';
		  }else if(respuesta.privilegio==3){
			document.getElementById("menu").innerHTML = "";
			document.getElementById("menu").innerHTML = 
			'<li><a href="#" onclick="libros3();">Libros</a></li>' +
			'<li><a href="#" onclick="favoritos3();">Favoritos</a></li>' +
			'<li><a href="#" onclick="cerrarsesion();">Cerrar Sesion</a></li>';
		  }
			//inhabilitar el formulario:
			// var formulario = document.getElementById("formularioAutenticarse");
			// // formulario.style.display = "none";
			// formulario.style.visibility = "hidden";
			document.getElementById("container").innerHTML = "";

		}
	  }
	};
  
	// Abrir la petición con el método POST y la url del archivo php que hace el read a mysql
	xhr.open("POST", "php/autenticar.php");
  
	// Enviar la petición con los datos del login en formato FormData
	var datos = new FormData();
	datos.append("ci", ci);
	datos.append("password", password);
	xhr.send(datos);
    }


}

function favoritos3() {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", 'php/favoritos.php', true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			document.getElementById('container').innerHTML = ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();
}
function prestados1() {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", 'php/libros_prestados.php', true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			document.getElementById('container').innerHTML = ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();
}
function libros2() {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", 'php/libros.php', true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			document.getElementById('container').innerHTML = ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();
}
function libros3() {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", 'php/mostrarLibros.php', true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			document.getElementById('container').innerHTML = ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();
}

function librosPrestados() {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", 'php/mostrarLibrosPrestados.php', true);
	var footElement = document.getElementById('foot');

	// Eliminar la imagen dentro del elemento 'foot' si existe
	var imageElement = footElement.querySelector('img');
	if (imageElement) {
		footElement.removeChild(imageElement);
	}

	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			document.getElementById('contenedorLista').innerHTML = ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();
}

function enviarbusqueda() {
	var valBusqueda = document.getElementById('buscador').value;
	console.log(valBusqueda);
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			document.getElementById("contenedorLista").innerHTML = ajax.responseText;
			console.log("busqueda guardada");
		}
	}

	ajax.open("GET", 'php/registrarBusqueda.php?busqueda=' + valBusqueda, true);
	ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
	ajax.send();
}
function generarListaBusqueda() {
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			document.getElementById("contenedorLista").innerHTML = ajax.responseText;
		}
	}
	ajax.open("GET", 'php/listarBusqueda.php', true);
	ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
	ajax.send();
}
function prueba(){
    window.location.href = "prueba.html";
}
function clientes2(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("container").innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "php/clientes.php", true);
    xhr.send();
}
function pendientes2() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("container").innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "php/prestamos.php", true);
    xhr.send();
}
function cerrarsesion() {
	// Habilitar el formulario cambiando display a "block"
	// var formulario = document.getElementById("formularioAutenticarse");
	
	// Limpiar el contenido del elemento con id "menu"
	document.getElementById("container").innerHTML = "";
	// document.getElementById("container").innerHTML = formulario;
	// Agregar el formulario de vuelta al elemento con id "menu"
	// document.getElementById("container").appendChild(formulario);
	// formulario.style.visibility = "visible";

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/log.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("container").innerHTML = xhr.responseText;
        }
    };
    xhr.send();

  }




  
  
