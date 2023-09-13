function ingreso() {
	var ci = document.getElementById('ci').value;
	var password = document.getElementById('password').value;
	if (ci === "") {
		alert("Ingrese un número de carnet.");
		return false;
	}
	if (ci.length > 10 || ci.length < 6) {
		alert("Escriba un carnet válido");
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
	if (password.length > 30) {
		alert("Contraseña demasiado larga.");
		return false;
	} else {
		var ajax = new XMLHttpRequest();
		var parametros = "ci=" + encodeURI(document.getElementById('ci').value) + "&password=" + encodeURI(document.getElementById('password').value) + "&noCache=" + Math.random();
		ajax.open("POST", 'php/autenticar.php', true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				if (ajax.responseText) {
					alert(ajax.responseText);
				} else {
					$("#formularioAutenticarse").css('transition', '2s');
					$("#formularioAutenticarse").css('top', '200%');
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send(parametros);
	}
}

function mostrarFavoritos() {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", 'php/mostrarFavoritos.php', true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			document.getElementById('contenedorLista').innerHTML = ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();
}

function mostrarLibros() {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", 'php/mostrarLibros.php', true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			document.getElementById('contenedorLista').innerHTML = ajax.responseText;
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
