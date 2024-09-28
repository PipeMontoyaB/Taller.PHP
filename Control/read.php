<?php

require_once 'database.php';

$sql = "SELECT * FROM Persona";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Personas</title>
</head>
<body>
    <h2>Lista de Personas</h2>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['codigo'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['nombre'] . "</td>
                        <td>" . $row['telefono'] . "</td>
                        <td>
                            <a href='update.php?codigo=" . $row['codigo'] . "'>Actualizar</a>
                            <a href='delete.php?codigo=" . $row['codigo'] . "' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\");'>Eliminar</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay registros.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="crear.php">Agregar Nueva Persona</a>
</body>
</html>

<?php
$conn->close();
?>

