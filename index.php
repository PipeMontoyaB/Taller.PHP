<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 50px;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .button {
            display: inline-block;
            margin: 20px 10px;
            padding: 15px 30px;
            font-size: 18px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Gestión de Facturas</h1>
        <p>Selecciona una opción:</p>

    

        <!-- Botón para editar una factura existente -->
        <a href="Control/create.php" class="button">Crear Usuario</a>
        <a href="Control/read.php" class="button">Consultar Usuario</a>
    
    </div>

</body>
</html>