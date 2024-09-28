<?php

$servername = "localhost"; 
$username = "PipeMontoya"; 
$password = "70330600"; 
$dbname = "tienda_bd"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
