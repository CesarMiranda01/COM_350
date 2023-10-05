/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package pregunta5;

/**
 *
 * @author msi Katana GF76
 */
// CiudadanoRepositorio.java
//package persistencia;

import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.transaction.Transactional;
import modelo.Ciudadano;

//Transactional
public class CiudadanoRepositorio {

    @PersistenceContext
    private EntityManager entityManager;

    public void insertarCiudadano(Ciudadano ciudadano) {
        entityManager.persist(ciudadano);
    }
}
