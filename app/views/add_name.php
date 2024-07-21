<?php

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
