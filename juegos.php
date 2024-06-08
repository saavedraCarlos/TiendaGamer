<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include 'conexion.php';

// Consulta SQL para seleccionar todos los juegos
$sql = "SELECT * FROM juegos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos - Tienda Gamer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <h1>Juegos Disponibles</h1>

        <div class="juegos">
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='juego'>";
                    echo "<h2>" . $row["nombre"] . "</h2>";
                    echo "<p>" . $row["descripcion"] . "</p>";
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row["imagen"]) . "' />";
                    echo "<p>Precio: $" . $row["precio"] . "</p>";
                    echo "<form action='ventas.php' method='post'>";
                    echo "<input type='hidden' name='id_juego' value='" . $row["id"] . "'>";
                    echo "<button type='submit' name='comprar'>Comprar</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "No se encontraron juegos.";
            }
            ?>
            <form action="bienvenido.php" method="post">
            <button type="submit">Salir</button>
        </form>

        </div>
    </div>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
