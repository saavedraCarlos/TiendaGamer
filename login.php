<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar sesión</h2>
        <form action="accion.php" method="POST">
            <div class="input-container">
                <label for="nombre">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="input-container">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="password">
            </div>
            <button type="submit" name="enviar">Enviar</button>
        </form>
        <?php
        session_start();

        if(isset($_SESSION['error_message'])) {
            echo "<p class='error-message'>{$_SESSION['error_message']}</p>";
            unset($_SESSION['error_message']);
        }
        ?>
    </div>
</body>
</html>
