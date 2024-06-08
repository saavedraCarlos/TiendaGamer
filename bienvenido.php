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
        <h1>Bienvenido a la tienda gamer</h1>

        <?php
        include 'header.php';

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<h2>Bienvenido, $username!</h2>";
            
        } else {
            echo "<h2 class='error-message'>Primero debes iniciar sesión.</h2>";
        }
        ?>

        <div class="buttons">
            <a href="juegos.php" class="btn">Juegos</a>
            <a href="imprimirventas.php" class="btn">Ventas</a>
            <a href="clientes.php" class="btn">Clientes</a>
        </div>

        <?php if (isset($_SESSION['username'])): ?>
            <form action="CerrarSesion.php" method="post" style="margin-top: 20px;">
                <button type="submit" class="btn">Cerrar sesión</button>
            </form>
        <?php endif; ?>

    </div>
</body>
</html>
