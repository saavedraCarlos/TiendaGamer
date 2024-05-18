<?php

session_start();


$db = new mysqli('localhost', 'root', '', 'tiendagamer');
if ($db->connect_error) {
    die('Error de conexión con la base de datos: ' . $db->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  
    $_SESSION['username'] = $username;
    header('Location: bienvenido.php');
} else {

    $_SESSION['error_message'] = 'Usuario o contraseña incorrectos.';
    header('Location: login.php');
}

$db->close();
?>
