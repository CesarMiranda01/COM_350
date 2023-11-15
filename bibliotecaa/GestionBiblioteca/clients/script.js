// Definimos una función para mostrar el formulario de login y ocultar el de registrar
function mostrarLogin(){
    // Obtenemos los elementos del DOM
    var formLogin = document.getElementById("form-login");
    var formRegistrar = document.getElementById("form-registrar");
    
    // Cambiamos el estilo de display de los elementos
    formLogin.style.display = "block";
    formRegistrar.style.display = "none";
  }
  
  // Definimos una función para mostrar el formulario de registrar y ocultar el de login
  function mostrarRegistrar(){
    // Obtenemos los elementos del DOM
    var formLogin = document.getElementById("form-login");
    var formRegistrar = document.getElementById("form-registrar");
    
    // Cambiamos el estilo de display de los elementos
    formRegistrar.style.display = "block";
    formLogin.style.display = "none";
  }
  function id_error(){
    var id_error = document.getElementById("id_error");
    id_error.innerHTML = "El id ya está en uso";
  }


  //meoooooooo
  function enviarbusqueda(){
    var valBusqueda=document.getElementById('buscador').value;
    //console.log(typeof valBusqueda);
    if (valBusqueda){
        console.log(valBusqueda);
        var ajax=new XMLHttpRequest();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4){
                document.getElementById("contenidoResultado").innerHTML=ajax.responseText;
                console.log("busqueda guardada");
                //alert(ajax.responseText);
            }
        }

        ajax.open("GET","registrarBusqueda.php?busqueda="+valBusqueda, true);
	    ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
        ajax.send();
    }
}
function generarListaBusqueda(){
    var ajax=new XMLHttpRequest();
    ajax.onreadystatechange=function(){
        if(ajax.readyState==4){
            document.getElementById("contenidoBusqueda").innerHTML=ajax.responseText;
        }
    }
    ajax.open("GET","listarBusqueda.php",true);
    ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    ajax.send();
}
