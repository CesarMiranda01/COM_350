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
    formLogin.style.display = "none";
  }