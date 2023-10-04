/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package pregunta5;

/**
 *
 * @author msi Katana GF76
 */
import java.io.Serializable;
import java.util.Date;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

@Entity
@Table(name = "ciudadano")
public class ciudadano implements Serializable {

    private static final long serialVersionUID = 1L;

    @Id
    private int ci;
    private String nombres;
    private String apellidos;
    
    @Temporal(TemporalType.DATE)
    private Date fecha;

    // Constructores, getters y setters
}
