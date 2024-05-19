<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        include 'header.php';

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<h2>Bienvenido, $username!</h2>";
            echo "<a href='CerrarSesion.php'>Cerrar sesión</a>";
        } else {
            echo "<h2 class='error-message'>Primero debes iniciar sesión.</h2>";
        }
        ?>
    </div>
</body>
</html>
