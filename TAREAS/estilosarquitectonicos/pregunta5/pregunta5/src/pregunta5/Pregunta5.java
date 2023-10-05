/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package pregunta5;

/**
 *
 * @author msi Katana GF76
 */
import java.util.Date;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import modelo.Ciudadano;
import persistencia.CiudadanoRepositorio;


public class Pregunta5 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        EntityManagerFactory emf = Persistence.createEntityManagerFactory("MiUnidadDePersistencia");
        EntityManager em = emf.createEntityManager();

        CiudadanoRepositorio repositorio = new CiudadanoRepositorio();
        repositorio.setEntityManager(em);

        // Crear un nuevo ciudadano
        Ciudadano nuevoCiudadano = new Ciudadano();
        nuevoCiudadano.setCi(123456);
        nuevoCiudadano.setNombres("John");
        nuevoCiudadano.setApellidos("Doe");
        nuevoCiudadano.setFecha(new Date());

        // Insertar en la base de datos
        repositorio.insertarCiudadano(nuevoCiudadano);

        em.close();
        emf.close();
    }
    
}
