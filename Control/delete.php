<?php
require_once('database.php');

// Verifica si se ha recibido el código

    $codigo = $_GET['codigo'];

    // Aquí iría la consulta para eliminar el registro de la base de datos
    $sql = "DELETE FROM persona WHERE codigo = '$codigo'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }


// Cerrar conexión
$conn->close();
?>
