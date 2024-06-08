<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}


$db = new mysqli('localhost', 'root', '', 'tiendagamer');
if ($db->connect_error) {
    die('Error de conexión con la base de datos: ' . $db->connect_error);
}

$sql = "SELECT id, username FROM users";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Tienda Gamer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <h1>Registro de Clientes</h1>

        
        <div class="clientes-list">
            <?php
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<div class='cliente'>";
                    echo "<p>ID: " . $row["id"] . "</p>";
                    echo "<p>Username: " . $row["username"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No se encontraron usuarios registrados.</p>";
            }
            ?>

            <form action="bienvenido.php" method="post">
            <button type="submit">Volver</button>
        </form>

        </div>
    </div>
</body>
</html>

<?php

$db->close();
?>
