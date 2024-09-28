-- Crear base de datos (`si no existe`)
CREATE DATABASE IF NOT EXISTS tienda_db;
USE tienda_db;

-- Tabla Persona (tabla base para Cliente y Vendedor)
CREATE TABLE Persona (
    codigo VARCHAR(10) PRIMARY KEY,
    email VARCHAR(100),
    nombre VARCHAR(100),
    telefono VARCHAR(20)
);

-- Tabla Cliente (extiende de Persona)
CREATE TABLE Cliente (
    codigo VARCHAR(10),
    credito DOUBLE,
    FOREIGN KEY (codigo) REFERENCES Persona(codigo)
);

-- Tabla Vendedor (extiende de Persona)
CREATE TABLE Vendedor (
    codigo VARCHAR(10),
    carne VARCHAR(20),
    direccion VARCHAR(255),
    FOREIGN KEY (codigo) REFERENCES Persona(codigo)
);

-- Tabla Empresa (relacionada con Factura)
CREATE TABLE Empresa (
    codigo VARCHAR(10) PRIMARY KEY,
    nombre VARCHAR(100)
);

-- Tabla Factura (relacionada con Cliente, Vendedor y Empresa)
CREATE TABLE Factura (
    numero BIGINT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE,
    total DOUBLE,
    codigo_cliente VARCHAR(10),
    codigo_vendedor VARCHAR(10),
    codigo_empresa VARCHAR(10),
    FOREIGN KEY (codigo_cliente) REFERENCES Cliente(codigo),
    FOREIGN KEY (codigo_vendedor) REFERENCES Vendedor(codigo),
    FOREIGN KEY (codigo_empresa) REFERENCES Empresa(codigo)
);

-- Tabla Producto
CREATE TABLE Producto (
    codigo VARCHAR(10) PRIMARY KEY,
    nombre VARCHAR(100),
    stock INT,
    valor_unitario DOUBLE
);

-- Tabla ProductosPorFactura (relación entre Factura y Producto)
CREATE TABLE ProductosPorFactura (
    numero_factura BIGINT,
    codigo_producto VARCHAR(10),
    cantidad INT,
    subtotal DOUBLE,
    PRIMARY KEY (numero_factura, codigo_producto),
    FOREIGN KEY (numero_factura) REFERENCES Factura(numero),
    FOREIGN KEY (codigo_producto) REFERENCES Producto(codigo)
);
