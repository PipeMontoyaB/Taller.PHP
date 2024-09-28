<?php
class FacturaController {
    public function crearFactura() {

        require_once 'Modelo/Entidad.php';

        // Crear cliente
        $cliente = new Cliente('C001', 'cliente@ejemplo.com', 'Cliente 1', '123456789', 1000.00);
        
        // Crear productos
        $producto1 = new Producto('P001', 'Producto 1', 50, 20.00);
        $producto2 = new Producto('P002', 'Producto 2', 30, 35.00);

        // Crear ProductosPorFactura
        $prodFactura1 = new ProductosPorFactura(2, 40.00, $producto1);
        $prodFactura2 = new ProductosPorFactura(1, 35.00, $producto2);

        // Crear factura
        $factura = new Factura('2023-09-27', 1001, 75.00, $cliente);

        // Agregar productos a la factura
        $factura->agregarProducto($prodFactura1);
        $factura->agregarProducto($prodFactura2);

        // Devolver la factura o mostrarla
        return $factura;
    }
}


?>