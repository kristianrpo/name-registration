<?php

// Datos necesarios para conectar a la base de datos
$server = "localhost";
$user = "root";
$password = "";
$database = "name-registration-db";

// Conexión a la base de datos
$connection = new mysqli($server, $user, $password, $database);

// Verificar si la conexión fue exitosa
if ($connection->connect_error) {
    die("Error: " . $connection->connect_error);
}
// Crear tabla si no existe
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL
)";

if ($connection->query($sql) !== TRUE) {
    $notification = "Existió algún problema al crear la tabla";
}


if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = $connection->real_escape_string($_POST['name']);


    // Insertar el nuevo nombre
    $sql = "INSERT INTO users (name) VALUES ('$name')";

    if ($connection->query($sql) !== TRUE) {
        $notification = "Existió algún problema al insertar el registro";
    }
}

// Consultar todos los nombres
$sql = "SELECT name FROM users";
$result = $connection->query($sql);

// Guardar los nombres en un array para usarlos en el HTML
$names = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $names[] = htmlspecialchars($row["name"]);
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100..700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/52165e5e88.js" crossorigin="anonymous"></script>
    <title>Registro</title>
</head>
<body>
    <div class="general-container">
        <div class="notification-container">
            <?php if($notification): ?>
                <p><?= $notification ?></p>
            <?php endif; ?>
        </div>
        <div class="cards-container">
            <!-- Card for Registry Names -->
            <div class="card-registry-names">
                <div class="card-icon">
                    <i class="fa-brands fa-php"></i>
                    <i class="fa-solid fa-database"></i>
                    <i class="fa-brands fa-html5"></i>
                </div>
                <div class="card-title">
                    <h1>Registro de nombres con <span>MySQL</span> + <span>PHP</span></h1>
                </div>
                <div class="card-form">
                    <form action="./" method="post">
                        <div class="input-container">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="button-container">
                            <button type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Card for Viewing Names -->
            <div class="card-view-names">
                <div class="title-container">
                    <h2>Nombres registrados</h2>
                </div>
                <div class="names-container">
                    <?php foreach ($names as $name): ?>
                        <div class="name-element">
                            <p><?= $name; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
