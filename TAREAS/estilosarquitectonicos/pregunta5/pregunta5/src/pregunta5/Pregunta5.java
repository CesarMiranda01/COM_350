/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package pregunta5;

/**
 *
 * @author msi Katana GF76
 */
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class pregunta5 {

    public static void main(String[] args) throws ParseException {
        CiudadanoRepositorio repositorio = // Inicializar el repositorio (puede ser mediante inyección de dependencias)
        CiudadanoServicio servicio = new CiudadanoServicio(repositorio);

        // Datos de ejemplo
        int ci = 1234567;
        String nombres = "Juan";
        String apellidos = "Perez";
        String fechaString = "1990-01-01"; // Formato yyyy-MM-dd
        Date fecha = new SimpleDateFormat("yyyy-MM-dd").parse(fechaString);

        // Insertar ciudadano
        servicio.insertarCiudadano(ci, nombres, apellidos, fecha);

        System.out.println("Ciudadano insertado correctamente.");
    }
}
