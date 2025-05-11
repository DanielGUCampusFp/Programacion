package modelo;

public class FacturaRecibida {
    private int idFactura;
    private int idProveedor;
    private java.sql.Date fecha;
    private double total;

    public FacturaRecibida(int idFactura, int idProveedor, java.sql.Date fecha, double total) {
        this.idFactura = idFactura;
        this.idProveedor = idProveedor;
        this.fecha = fecha;
        this.total = total;
    }

    public int getIdFactura() { 
    	return idFactura; 
    	}
    public void setIdFactura(int idFactura) { 
    	this.idFactura = idFactura; 
    	}
    public int getIdProveedor() { 
    	return idProveedor; 
    	}
    public void setIdProveedor(int idProveedor) { 
    	this.idProveedor = idProveedor; 
    	}
    public java.sql.Date getFecha() { 
    	return fecha; 
    	}
    public void setFecha(java.sql.Date fecha) { 
    	this.fecha = fecha; 
    	}
    public double getTotal() { 
    	return total; 
    	}
    public void setTotal(double total) { 
    	this.total = total; 
    	}
}