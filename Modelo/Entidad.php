<?php

// Interfaz que define métodos que deben ser implementados
interface InformacionPersona {
    public function obtenerDetalles();  // Este método debe ser implementado por cada clase derivada
    public function getTipoPersona();   // Otro método común a implementar
}

// Clase abstracta Persona
abstract class Persona implements InformacionPersona {

    private $codigo;
    private $email;
    private $nombre;
    private $telefono;

    public function __construct($codigo, $email, $nombre, $telefono) {
        $this->codigo = $codigo;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }


// Método abstracto: Cada clase derivada lo implementará de forma diferente
abstract public function obtenerDetalles();


// Implementación del método en la interfaz: las clases derivadas también lo heredan
public function getTipoPersona() {
    return "Persona";
}
}

class Cliente extends Persona {
    private $credito;

    public function __construct($codigo, $email, $nombre, $telefono, $credito) {
        parent::__construct($codigo, $email, $nombre, $telefono);
        $this->credito = $credito;
        $this->nombre = $nombre;
    }

        // Implementación del método abstracto
        public function obtenerDetalles() {
            return "Cliente: " . $this->nombre . " (Crédito: " . $this->credito . ")";
        }
    

    public function getCredito() {
        return $this->credito;
    }

    public function setCredito($credito) {
        $this->credito = $credito;
    }

        // Sobrescribir el tipo de persona específico
        public function getTipoPersona() {
            return "Cliente";
        }
    
}

class Vendedor extends Persona {
    private $carnet;
    private $direccion;

    public function __construct($codigo, $email, $nombre, $telefono, $carnet, $direccion) {
        parent::__construct($codigo, $email, $nombre, $telefono);
        $this->carne = $carnet;
        $this->direccion = $direccion;
        $this->nombre = $nombre;
    }

    // Implementación del método abstracto
    public function obtenerDetalles() {
        return "Vendedor: " . $this->nombre . " (Carnet: " . $this->carnet . ", Dirección: " . $this->direccion . ")";
    }


    public function getCarne() {
        return $this->carne;
    }

    public function setCarne($carnet) {
        $this->carne = $carnet;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    // Sobrescribir el tipo de persona específico
    public function getTipoPersona() {
        return "Vendedor";
    }
}

class Empresa {
    private $codigo;
    private $nombre;

    public function __construct($codigo, $nombre) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}

class Producto {
    private $codigo;
    private $nombre;
    private $stock;
    private $valorUnitario;

    public function __construct($codigo, $nombre, $stock, $valorUnitario) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->valorUnitario = $valorUnitario;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getValorUnitario() {
        return $this->valorUnitario;
    }

    public function setValorUnitario($valorUnitario) {
        $this->valorUnitario = $valorUnitario;
    }
}

class ProductosPorFactura {
    private $cantidad;
    private $subtotal;
    private $producto; // Relación con Producto

    public function __construct($cantidad, $subtotal, Producto $producto) {
        $this->cantidad = $cantidad;
        $this->subtotal = $subtotal;
        $this->producto = $producto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getSubtotal() {
        return $this->subtotal;
    }

    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function getProducto() {
        return $this->producto;
    }

    public function setProducto(Producto $producto) {
        $this->producto = $producto;
    }
}

class Factura {
    private $fecha;
    private $numero;
    private $total;
    private $cliente; // Relación con Cliente
    private $productosPorFactura = []; // Lista de ProductosPorFactura

    public function __construct($fecha, $numero, $total, Cliente $cliente) {
        $this->fecha = $fecha;
        $this->numero = $numero;
        $this->total = $total;
        $this->cliente = $cliente;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function agregarProducto(ProductosPorFactura $producto) {
        $this->productosPorFactura[] = $producto;
    }

    public function getProductosPorFactura() {
        return $this->productosPorFactura;
    }
}
    // Ejemplo de polimorfismo con la interfaz
function mostrarDetallesPersona(InformacionPersona $persona) {
    echo $persona->obtenerDetalles() . "\n";
    echo "Tipo de Persona: " . $persona->getTipoPersona() . "\n";
}


// Instanciar objetos de las clases derivadas
$vendedor = new Vendedor("V001", "vendedor@example.com", "Juan Pérez", "123456789", "C001", "Av. Siempre Viva 742");
$cliente = new Cliente("C002", "cliente@example.com", "Ana Gómez", "987654321", 5000.00);

// Llamada polimórfica utilizando la interfaz
mostrarDetallesPersona($vendedor);  // Detalles del vendedor
mostrarDetallesPersona($cliente);   // Detalles del cliente


// punto 3

class Comprador {
    
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }
}

class Pedido {
    private $cliente;

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function mostrarPedido() {
        echo "Pedido hecho por: " . $this->cliente->getNombre();
    }
}

class Fabrica {
    private $nombre;
    private $departamento;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        $this->departamento = new Departamento();
    }

    public function mostrarFabrica() {
        echo "Fabrica: " . $this->nombre . ", Departamento: " . $this->departamento->getNombre();
    }
}

class Departamento {
    private $nombre;

    public function __construct() {
        $this->nombre = "Finanzas";
    }

    public function getNombre() {
        return $this->nombre;
    }
}





?>