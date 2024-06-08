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


$sql = "SELECT v.id, u.username AS usuario, j.nombre AS juego, v.fecha 
        FROM ventas v
        INNER JOIN users u ON v.id_usuario = u.id
        INNER JOIN juegos j ON v.id_juego = j.id";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas Realizadas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Ventas Realizadas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Juego</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["usuario"] . "</td>";
                        echo "<td>" . $row["juego"] . "</td>";
                        echo "<td>" . $row["fecha"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron ventas.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="bienvenido.php" class="btn">Volver</a>
    </div>
</body>
</html>

<?php

$db->close();
?>
