<?php
session_start();
if(!isset($_SESSION['nombre'])) {
   header('Location:login.php');
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
        //session_start();

        include 'header.php';

        if(isset($_SESSION['nombre'])) {
            $nombre = $_SESSION['nombre'];
            echo "<h2>Bienvenido, $nombre!</h2>";

            echo "<a href='CerrarSesion.php'>Cerrar sesion</a>";
        } else {
            echo "<h2 class='error-message'>Primero debes inciciar sesion.</h2>";
        }
        ?>
    </div>
</body>
</html>
