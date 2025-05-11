package modelo;

public class Proveedor {
    private int idProveedor;
    private String nombre;
    private String cif;
    private String telefono;

    public Proveedor(int idProveedor, String nombre, String cif, String telefono) {
        this.idProveedor = idProveedor;
        this.nombre = nombre;
        this.cif = cif;
        this.telefono = telefono;
    }

    public int getIdProveedor() { 
    	return idProveedor; 
    	}
    public void setIdProveedor(int idProveedor) { 
    	this.idProveedor = idProveedor; 
    	}
    public String getNombre() { 
    	return nombre; 
    	}
    public void setNombre(String nombre) { 
    	this.nombre = nombre; 
    	}
    public String getCif() { 
    	return cif; 
    	}
    public void setCif(String cif) { 
    	this.cif = cif; 
    	}
    public String getTelefono() { 
    	return telefono; 
    	}
    public void setTelefono(String telefono) { 
    	this.telefono = telefono; 
    	}
}