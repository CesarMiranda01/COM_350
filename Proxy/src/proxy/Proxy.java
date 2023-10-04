/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package proxy;

/**
 *
 * @author CESAR ALVARO MIRANDA GUTIERREZ
 * PRIMER PARCIAL DE ARQUITECTURA DE SOFTWARE
 */
public class Proxy {

    public static void main(String[] args) {
        Libro l= new Libro("Pulgarsito", "Cesar Alvaro Miranda Gutierrez",2023);
        ILibro b1=new LibroReal();
        b1.Leer(l);
        ILibro proxy=new ProxyLibro(new LibroReal());
        proxy.Leer(l);
    }
}
