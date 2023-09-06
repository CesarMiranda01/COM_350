function enviarbusqueda(){
    var valBusqueda=document.getElementById('buscador').value
    if (valBusqueda){
        console.log(valBusqueda);
        var ajax=new XMLHttpRequest();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4){
                //document.getElementById("contenido").innerHTML=ajax.responseText;
                console.log("busqueda guardada");
                alert(ajax.responseText);
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
