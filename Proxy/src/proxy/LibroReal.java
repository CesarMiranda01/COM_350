package proxy;


public class LibroReal implements ILibro {



	@Override
	public void Leer(Libro libro) {
		System.out.println("El libro es: " + libro.getTitulo() + "   de: " + libro.getAutor());
	}

}
