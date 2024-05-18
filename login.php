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
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
            <button type="submit" name="enviar">Enviar</button>
        </form>
        <?php
        session_start();

        if(isset($_POST['enviar'])) {
            
            if(empty($_POST['nombre'])) {
                echo "<p class='error-message'> Por favor ingrese un nombre valido.</p>";
            } else {
                $nombre = $_POST['nombre'];
                $_SESSION['nombre'] = $nombre;
                header('Location: bienvenido.php');
                exit;
            }
        }
        ?>
    </div>
</body>
</html>
