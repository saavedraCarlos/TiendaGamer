<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Conexión a la base de datos
$db = new mysqli('localhost', 'root', '', 'tiendagamer');
if ($db->connect_error) {
    die('Error de conexión con la base de datos: ' . $db->connect_error);
}

// Verificar si se ha enviado el formulario de compra
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comprar'])) {
    // Obtener el ID del usuario de la sesión
    $username = $_SESSION['username'];
    // Obtener el ID del juego de los datos del formulario
    $id_juego = $_POST['id_juego'];

    // Consulta SQL para insertar la venta en la base de datos
    $sql = "INSERT INTO ventas (id_usuario, id_juego) VALUES (
        (SELECT id FROM users WHERE username = '$username'),
        '$id_juego'
    )";


    if ($db->query($sql) === TRUE) {
    
        echo "¡Venta realizada con éxito!";
    } else {
      
        echo "Error al realizar la venta: " . $db->error;
    }
}


$db->close();

?>
