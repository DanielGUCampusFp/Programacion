package modelo;

public class Venta {
    private int idVenta;
    private int idCliente;
    private int idArticulo;
    private int cantidad;
    private java.sql.Date fechaVenta;

    public Venta(int idVenta, int idCliente, int idArticulo, int cantidad, java.sql.Date fechaVenta) {
        this.idVenta = idVenta;
        this.idCliente = idCliente;
        this.idArticulo = idArticulo;
        this.cantidad = cantidad;
        this.fechaVenta = fechaVenta;
    }

    public int getIdVenta() { 
    	return idVenta; 
    	}
    public void setIdVenta(int idVenta) { 
    	this.idVenta = idVenta; 
    	}
    public int getIdCliente() { 
    	return idCliente; 
    	}
    public void setIdCliente(int idCliente) { 
    	this.idCliente = idCliente; 
    	}
    public int getIdArticulo() { 
    	return idArticulo; 
    	}
    public void setIdArticulo(int idArticulo) { 
    	this.idArticulo = idArticulo; 
    	}
    public int getCantidad() { 
    	return cantidad; 
    	}
    public void setCantidad(int cantidad) { 
    	this.cantidad = cantidad; 
    	}
    public java.sql.Date getFechaVenta() { 
    	return fechaVenta; 
    	}
    public void setFechaVenta(java.sql.Date fechaVenta) { 
    	this.fechaVenta = fechaVenta; 
    	}
}