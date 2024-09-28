<?php
require_once 'database.php';



// Manejar el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    // Consulta SQL para actualizar

     $sql = "UPDATE persona SET email='$email', nombre='$nombre', telefono='$telefono' WHERE codigo='$codigo'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente. <a href='leer.php'>Ver lista</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener el código del cliente
$codigo = $_GET['codigo'];
$sql = "SELECT * FROM Persona WHERE codigo='$codigo'";
$result = $conn->query($sql);
$persona = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Persona</title>
</head>
<body>
    <h2>Actualizar Persona</h2>
    <form method="post" action="">
        <input type="hidden" name="codigo" value="<?php echo $persona['codigo']; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $persona['email']; ?>" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $persona['nombre']; ?>" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo $persona['telefono']; ?>" required><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
