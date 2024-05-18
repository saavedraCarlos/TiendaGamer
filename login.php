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
        <form action="login.php" method="POST">
            <div class="input-container">
                <label for="nombre">Username:</label>
                <input type="text" id="nombre" name="nombre">
            </div>
            <div class="input-container">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena">
            </div>
            <button type="submit" name="enviar">Enviar</button>
        </form>
        <?php
        session_start();

        if(isset($_POST['enviar'])) {
            
            if(empty($_POST['nombre']) || empty($_POST['contrasena'])) {
                echo "<p class='error-message'>Por favor ingrese un nombre y una contraseña válidos.</p>";
            } else {
                $nombre = $_POST['nombre'];
                $contrasena = $_POST['contrasena'];

                $_SESSION['nombre'] = $nombre;
                header('Location: bienvenido.php');
                exit;
            }
        }
        ?>
    </div>
</body>
</html>
