package proxy;

import java.util.logging.Logger;



public class ProxyLibro implements ILibro {

	private ILibro libroReal;
	private final static Logger LOGGER = Logger.getLogger(ProxyLibro.class.getName());

	public ProxyLibro(ILibro libroReal) {
		this.libroReal = libroReal;
	}


	@Override
	public void Leer(Libro libro) {
		LOGGER.info("----Verificando permisos----");
			libroReal.Leer(libro);
		
	}

}
